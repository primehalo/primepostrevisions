<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\core;

use phpbb\auth\auth;
use phpbb\db\driver\driver_interface as db_driver;
use phpbb\user;

/**
* Class declaration
*/
class prime_post_revisions
{
	/**
	* Service Containers
	*/
	private $auth;
	private $db;
	private $user;

	/**
	* Variables
	*/
	public $root_path;
	public $php_ext;
	public $revisions_table;

	/**
	* Constructor
	*
	* @param auth			$auth				Auth object
	* @param db_driver		$db					Database connection
	* @param user			$user				User object
	* @param string			$revisions_table	Prime Post Revisions table
	* @param string			$root_path			phpBB root path
	* @param string			$phpExt				php file extension
	* @access public
	*/
	public function __construct(auth $auth, db_driver $db, user $user, $revisions_table, $root_path, $phpExt)
	{
		$this->auth				= $auth;
		$this->db				= $db;
		$this->user				= $user;
		$this->revisions_table	= $revisions_table;
		$this->root_path		= $root_path;
		$this->php_ext			= $phpExt;
	}

	/**
	* Save the current version of as a revision in the revisions database table.
	*
	* @param	int		$post_id	ID of the post
	* @return 	boolean
	* @access	public
	*/
	public function save_revision($post_id)
	{
		if (empty($post_id))
		{
			return false;
		}

		// Get the current post data so we can store it before the user's edits are saved
		$sql = 'SELECT post_text, post_subject, bbcode_uid, bbcode_bitfield, poster_id, post_time,
						post_edit_time, post_edit_reason, post_edit_user, post_edit_count,
						primepost_edit_time, primepost_edit_user, primepost_edit_count
				 FROM ' . POSTS_TABLE . " WHERE post_id = {$post_id}";
		$old_data = $this->db->sql_fetchrow($result = $this->db->sql_query($sql));
		$this->db->sql_freeresult($result);

		$sql_ary = [
			'revision_time'			=> time(),
			'post_id'				=> $post_id,
			'post_subject'			=> $old_data['post_subject'],
			'post_text'				=> $old_data['post_text'],
			'bbcode_uid'			=> $old_data['bbcode_uid'],
			'bbcode_bitfield'		=> $old_data['bbcode_bitfield'],
			'post_edit_time'		=> $old_data['post_edit_time'],
			'post_edit_reason'		=> $old_data['post_edit_reason'],
			'post_edit_user'		=> $old_data['post_edit_user'],
			'post_edit_count'		=> $old_data['post_edit_count'],
			'primepost_edit_time'	=> $old_data['primepost_edit_time'],
			'primepost_edit_user'	=> $old_data['primepost_edit_user'],
			'primepost_edit_count'	=> $old_data['primepost_edit_count'],
		];

		// Place the revision info into the database.
		return $this->db->sql_query("INSERT INTO {$this->revisions_table} " . $this->db->sql_build_array('INSERT', $sql_ary));
	}

	/**
	* Build the URL for a post
	*
	* @param	int $post_id	The post ID
	* @return	string			An URL for the post
	* @access	public
	*/
	public function build_post_url($post_id)
	{
		return append_sid("{$this->root_path}viewtopic.{$this->php_ext}", 'p=' . $post_id) . '#p' . $post_id;
	}

	/**
	* Build the URL for a topic
	*
	* @param	int $topic_id	The topic ID
	* @return	string			An URL for the topic
	* @access	public
	*/
	public function build_topic_url($topic_id)
	{
		return append_sid("{$this->root_path}viewtopic.{$this->php_ext}", 't=' . $topic_id);
	}

	/**
	* Check for proper permissions
	*
	* @param	string $action	The action to check
	* @param	int $forum_id	The forum ID
	* @param	int $poster_id	The post author's ID
	* @return	string			An HTML link for the post
	* @access	public
	*/
	public function is_auth($action, $forum_id = 0, $poster_id = 0)
	{
		$is_poster = $poster_id && $poster_id == $this->user->data['user_id'];
		if ($action === 'view')
		{
			return $this->auth->acl_get('m_primepostrev_view', $forum_id)
					|| ($is_poster && $this->auth->acl_get('f_primepostrev_view', $forum_id));
		}
		if ($action === 'delete')
		{
			return $this->auth->acl_get('m_primepostrev_delete', $forum_id)
					 || ($is_poster && $this->auth->acl_get('f_primepostrev_delete', $forum_id));
		}
		if ($action === 'restore')
		{
			return $this->auth->acl_get('m_primepostrev_restore', $forum_id)
					|| ($is_poster && $this->auth->acl_get('f_primepostrev_restore', $forum_id));
		}
		return false;
	}
}
