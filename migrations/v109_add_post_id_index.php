<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\migrations;

/**
 * @ignore
 */
use phpbb\db\migration\migration;

/**
 * Migration stage : Add an index on post_id to the revisions table
 */
class v109_add_post_id_index extends migration
{
	/**
	 * (@inheritdoc)
	 */
	public function effectively_installed()
	{
		return $this->db_tools->sql_index_exists($this->table_prefix . 'primepostrev', 'post_id');
	}

	/**
	 * (@inheritdoc)
	 */
	static public function depends_on()
	{
		return ['\primehalo\primepostrevisions\migrations\install_schema3'];
	}

	/**
	* Revisions are always looked up by post_id, which without an index requires a full table scan
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return [
			'add_index' => [
				$this->table_prefix . 'primepostrev' => [
					'post_id' => ['post_id'],
				],
			],
		];
	}

	/**
	* Remove the index
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return [
			'drop_keys' => [
				$this->table_prefix . 'primepostrev' => [
					'post_id',
				],
			],
		];
	}
}
