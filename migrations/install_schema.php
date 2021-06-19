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
				POSTS_TABLE => [
					'primepost_edit_time'		=> ['TIMESTAMP', 0],
					'primepost_edit_user'		=> ['UINT:10', 0],
					'primepost_edit_count'		=> ['UINT:4', 0],
				],
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
