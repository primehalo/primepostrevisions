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

class install_data extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\primehalo\primepostrevisions\migrations\install_schema');
	}

	/**
	* Add or update data in the database
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			array('custom', array(
				array($this, 'copy_edit_columns')
			)),

			// Moderator can view post revisions
			array('permission.add', array('m_primepostrev_view', true)),				// Global
			array('permission.add', array('m_primepostrev_view', false, 'm_info')),		// Local
			array('permission.permission_set', array('ROLE_MOD_FULL', 'm_primepostrev_view')),
			array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_primepostrev_view')),

			// Moderator can delete post revisions
			array('permission.add', array('m_primepostrev_delete', true)),				// Global
			array('permission.add', array('m_primepostrev_delete', false, 'm_delete')),	// Local
			array('permission.permission_set', array('ROLE_MOD_FULL', 'm_primepostrev_delete')),
			array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_primepostrev_delete')),

			// Moderator can restore post revisions
			array('permission.add', array('m_primepostrev_restore', true)),				// Global
			array('permission.add', array('m_primepostrev_restore', false, 'm_edit')),	// Local
			array('permission.permission_set', array('ROLE_MOD_FULL', 'm_primepostrev_restore')),
			array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_primepostrev_restore')),

			// Poster can view revisions for their posts
			array('permission.add', array('f_primepostrev_view', false, 'f_edit')),		// Local
			array('permission.permission_set', array('ROLE_FORUM_FULL', 'f_primepostrev_view')),
			array('permission.permission_set', array('ROLE_FORUM_STANDARD', 'f_primepostrev_view')),
			array('permission.permission_set', array('ROLE_FORUM_POLLS', 'f_primepostrev_view')),

			// Poster can delete revisions for their posts
			array('permission.add', array('f_primepostrev_delete', false, 'f_delete')),	// Local

			// Poster can restore revisions for their posts
			array('permission.add', array('f_primepostrev_restore', false, 'f_edit')),	// Local
	  );
	}

	/**
	* Copy all existing edit information to our edit info columns. Our columns are for
	* keeping track of all edits, not just some edits like the default edit columns.
	*
	* @access public
	*/
	public function copy_edit_columns($value)
	{
		$sql = "UPDATE {$this->table_prefix}primepostrev SET
					primepost_edit_time = post_edit_time,
					primepost_edit_user = post_edit_user,
					primepost_edit_count = post_edit_count
				WHERE post_edit_time != 0 OR post_edit_user != 0 OR post_edit_count != 0";
		$this->sql_query($sql);
	}

	/**
	*/
	/*
	public function import_30_table($value)
	{
		if ($this->sql_table_exists($this->table_prefix . 'post_revisions'))
		{


		}
	}
	*/
}
