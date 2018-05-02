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

class install_schema extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v313');
	}

	/**
	* Add the primepostrev table to the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				FORUMS_TABLE => array(
					'primepostrev_enable'		=> array('BOOL', 1),
					'primepostrev_autoprune'	=> array('UINT:8', 0),
				),
				POSTS_TABLE	=> array(
					'primepost_edit_time'		=> array('UINT:11', 0),
					'primepost_edit_user'		=> array('UINT:10', 0),
					'primepost_edit_count'		=> array('UINT:4', 0),
				),
			),
			'add_tables'	=> array(
				$this->table_prefix . 'primepostrev' => array(
					'COLUMNS' => array(
						'revision_id'			=> array('UINT', null, 'auto_increment'),
						'revision_time'			=> array('TIMESTAMP', 0),
						'post_id'				=> array('UINT', 0),
						'post_subject'			=> array('VCHAR', ''),
						'post_text'				=> array('TEXT', ''),
						'bbcode_uid'			=> array('VCHAR:8', ''),
						'bbcode_bitfield'		=> array('VCHAR:255', ''),
						'post_edit_time'		=> array('TIMESTAMP', 0),
						'post_edit_reason'		=> array('VCHAR:255', ''),
						'post_edit_user'		=> array('UINT:10', 0),
						'post_edit_count'		=> array('UINT:4', 0),
						'primepost_edit_time'	=> array('UINT:11', 0),
						'primepost_edit_user'	=> array('UINT:10', 0),
						'primepost_edit_count'	=> array('UINT:4', 0),
					),
					'PRIMARY_KEY' => 'revision_id',
				),
			),
		);
	}

	/**
	* Remove the primepostrev table from the database
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				FORUMS_TABLE => array(
					'primepostrev_enable',
					'primepostrev_autoprune',
				),
				POSTS_TABLE	=> array(
					'primepost_edit_time',
					'primepost_edit_user',
					'primepost_edit_count',
				),
			),
			'drop_tables'	=> array(
				$this->table_prefix . 'primepostrev',
			),
		);
	}
}
