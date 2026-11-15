<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\migrations;

/**
 * @ignore
 */
use phpbb\db\migration\migration;

/**
 * Migration stage : Install Schema
 */
class install_schema extends migration
{
	static public function depends_on()
	{
		return ['\phpbb\db\migration\data\v31x\v313'];
	}

	/**
	* Add the primepostrev table to the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return [
			'add_columns' => [
				FORUMS_TABLE => [
					'primepostrev_enable'		=> ['BOOL', 1],
					'primepostrev_autoprune'	=> ['UINT:8', 0],
				],
				// POSTS_TABLE columns are added in update_data() by add_post_columns()
			],
			'add_tables' => [
				$this->table_prefix . 'primepostrev' => [
					'COLUMNS' => [
						'revision_id'			=> ['UINT', null, 'auto_increment'],
						'revision_time'			=> ['TIMESTAMP', 0],
						'post_id'				=> ['UINT', 0],
						'post_subject'			=> ['VCHAR', ''],
						'post_text'				=> ['TEXT', ''],
						'bbcode_uid'			=> ['VCHAR:8', ''],
						'bbcode_bitfield'		=> ['VCHAR:255', ''],
						'post_edit_time'		=> ['TIMESTAMP', 0],
						'post_edit_reason'		=> ['VCHAR:255', ''],
						'post_edit_user'		=> ['UINT:10', 0],
						'post_edit_count'		=> ['UINT:4', 0],
						'primepost_edit_time'	=> ['TIMESTAMP', 0],
						'primepost_edit_user'	=> ['UINT:10', 0],
						'primepost_edit_count'	=> ['UINT:4', 0],
					],
					'PRIMARY_KEY' => 'revision_id',
				],
			],
		];
	}

	/**
	* Add the columns to the posts table
	*
	* @return array Array of data update steps
	* @access public
	*/
	public function update_data()
	{
		return [
			['custom', [[$this, 'add_post_columns']]],
		];
	}

	/**
	* Remove the columns from the posts table. phpBB runs revert_data() before revert_schema(),
	* so by the time revert_schema() runs these columns are already gone and it skips them.
	*
	* @return array Array of data revert steps
	* @access public
	*/
	public function revert_data()
	{
		return [
			['custom', [[$this, 'drop_post_columns']]],
		];
	}

	/**
	* The columns this extension adds to the posts table
	*
	* @return array Column name => [phpBB column definition, MySQL column definition]
	* @access protected
	*/
	protected function get_post_columns()
	{
		return [
			'primepost_edit_time'	=> [['TIMESTAMP', 0],	"int(11) UNSIGNED DEFAULT '0' NOT NULL"],
			'primepost_edit_user'	=> [['UINT:10', 0],		"int(10) UNSIGNED DEFAULT '0' NOT NULL"],
			'primepost_edit_count'	=> [['UINT:4', 0],		"int(4) UNSIGNED DEFAULT '0' NOT NULL"],
		];
	}

	/**
	* Add the columns to the posts table.
	*
	* phpBB's schema tools run a separate ALTER TABLE for each column. On MySQL each of those can
	* rebuild the entire posts table, which on large boards takes long enough to time out. So on
	* MySQL we add all of the columns in a single statement, which is instant on MySQL 8.0.12+ and
	* MariaDB 10.3+. Other databases (PostgreSQL, SQLite, MS SQL Server, Oracle) use phpBB's schema
	* tools one column at a time, since they don't rebuild the table to add a column.
	*
	* Columns that already exist are skipped, so this can finish an install that
	* previously timed out, or one where the admin added the columns manually beforehand.
	*
	* @access public
	*/
	public function add_post_columns()
	{
		$columns = [];
		foreach ($this->get_post_columns() as $column_name => $column_data)
		{
			if (!$this->db_tools->sql_column_exists(POSTS_TABLE, $column_name))
			{
				$columns[$column_name] = $column_data;
			}
		}

		if (empty($columns))
		{
			return;
		}

		if ($this->is_mysql())
		{
			$alter = [];
			foreach ($columns as $column_name => $column_data)
			{
				$alter[] = 'ADD COLUMN `' . $column_name . '` ' . $column_data[1];
			}
			$this->run_mysql_alter(POSTS_TABLE, $alter);
		}
		else
		{
			foreach ($columns as $column_name => $column_data)
			{
				$this->db_tools->sql_column_add(POSTS_TABLE, $column_name, $column_data[0]);
			}
		}
	}

	/**
	* Remove the columns from the posts table, in a single statement on MySQL and one column at a
	* time on other databases (see add_post_columns)
	*
	* @access public
	*/
	public function drop_post_columns()
	{
		$columns = [];
		foreach (array_keys($this->get_post_columns()) as $column_name)
		{
			if ($this->db_tools->sql_column_exists(POSTS_TABLE, $column_name))
			{
				$columns[] = $column_name;
			}
		}

		if (empty($columns))
		{
			return;
		}

		if ($this->is_mysql())
		{
			$alter = [];
			foreach ($columns as $column_name)
			{
				$alter[] = 'DROP COLUMN `' . $column_name . '`';
			}
			$this->run_mysql_alter(POSTS_TABLE, $alter);
		}
		else
		{
			foreach ($columns as $column_name)
			{
				$this->db_tools->sql_column_remove(POSTS_TABLE, $column_name);
			}
		}
	}

	/**
	* @return bool Whether the database is MySQL or MariaDB
	* @access protected
	*/
	protected function is_mysql()
	{
		return strpos($this->db->get_sql_layer(), 'mysql') === 0;
	}

	/**
	* Run a combined ALTER TABLE on MySQL, first trying ALGORITHM=INSTANT (MySQL 8.0.12+, MariaDB 10.3+)
	* and falling back to a regular ALTER TABLE on servers that don't support it.
	*
	* @param string	$table_name	The table to alter
	* @param array	$alter		The individual ADD/DROP clauses
	* @access protected
	*/
	protected function run_mysql_alter($table_name, $alter)
	{
		$sql = 'ALTER TABLE `' . $table_name . '` ' . implode(', ', $alter);

		$this->db->sql_return_on_error(true);
		$result = $this->db->sql_query($sql . ', ALGORITHM=INSTANT');
		$this->db->sql_return_on_error(false);

		if ($result === false)
		{
			// A regular ALTER TABLE can take a while on large boards
			if (function_exists('set_time_limit'))
			{
				@set_time_limit(0);
			}
			$this->db->sql_query($sql);
		}
	}

	/**
	* Remove the primepostrev table from the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return [
			'drop_columns' => [
				FORUMS_TABLE => [
					'primepostrev_enable',
					'primepostrev_autoprune',
				],
				POSTS_TABLE => [
					'primepost_edit_time',
					'primepost_edit_user',
					'primepost_edit_count',
				],
			],
			'drop_tables' => [
				$this->table_prefix . 'primepostrev',
			],
		];
	}
}
