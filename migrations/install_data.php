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
 * Migration stage : Install Data
 */
class install_data extends migration
{
	static public function depends_on()
	{
		return ['\primehalo\primepostrevisions\migrations\install_schema'];
	}

	/**
	* Add or update data in the database
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return [
			['custom', [
				[$this, 'copy_edit_columns']
			]],

			// Moderator can view post revisions
			['permission.add', ['m_primepostrev_view', true]],				// Global
			['permission.add', ['m_primepostrev_view', false, 'm_info']],		// Local
			['permission.permission_set', ['ROLE_MOD_FULL', 'm_primepostrev_view']],
			['permission.permission_set', ['ROLE_MOD_STANDARD', 'm_primepostrev_view']],

			// Moderator can delete post revisions
			['permission.add', ['m_primepostrev_delete', true]],				// Global
			['permission.add', ['m_primepostrev_delete', false, 'm_delete']],	// Local
			['permission.permission_set', ['ROLE_MOD_FULL', 'm_primepostrev_delete']],
			['permission.permission_set', ['ROLE_MOD_STANDARD', 'm_primepostrev_delete']],

			// Moderator can restore post revisions
			['permission.add', ['m_primepostrev_restore', true]],				// Global
			['permission.add', ['m_primepostrev_restore', false, 'm_edit']],	// Local
			['permission.permission_set', ['ROLE_MOD_FULL', 'm_primepostrev_restore']],
			['permission.permission_set', ['ROLE_MOD_STANDARD', 'm_primepostrev_restore']],

			// Poster can view revisions for their posts
			['permission.add', ['f_primepostrev_view', false, 'f_edit']],		// Local
			['permission.permission_set', ['ROLE_FORUM_FULL', 'f_primepostrev_view']],
			['permission.permission_set', ['ROLE_FORUM_STANDARD', 'f_primepostrev_view']],
			['permission.permission_set', ['ROLE_FORUM_POLLS', 'f_primepostrev_view']],

			// Poster can delete revisions for their posts
			['permission.add', ['f_primepostrev_delete', false, 'f_delete']],	// Local

			// Poster can restore revisions for their posts
			['permission.add', ['f_primepostrev_restore', false, 'f_edit']],	// Local
	  ];
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
}
