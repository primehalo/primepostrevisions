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
	* Singleton
	*/
	public static function Instance()
	{
		static $inst = null;
		if ($inst === null)
		{
			$inst = new self();
		}
		return $inst;
	}

	/**
	* Clone
	*/
	protected function __clone()
	{
	}

	/**
	* Constructor
	*/
	protected function __construct()
	{
		global $phpbb_container;

		$this->auth			= $phpbb_container->get('auth');		// @var \phpbb\auth\auth
		$this->db			= $phpbb_container->get('dbal.conn');	// @var \phpbb\db\driver\driver_interface
		$this->user			= $phpbb_container->get('user');		// @var \phpbb\user
		$this->root_path	= $phpbb_container->getParameter('core.root_path');
		$this->php_ext		= $phpbb_container->getParameter('core.php_ext');
		$this->revisions_table	= $phpbb_container->getParameter('primehalo.primepostrevisions.tables.primepostrev');
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

		#$old_data['primepost_edit_time'] = empty($old_data['primepost_edit_time']) ? $old_data['post_time'] : $old_data['post_edit_time'];
		#$old_data['primepost_edit_user'] = empty($old_data['primepost_edit_user']) ? $old_data['poster_id'] : $old_data['post_edit_user'];

		$sql_ary = array(
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
		);

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
	* Build a link for a post
	*
	* @param	int $post_id	The post ID
	* @return	string			An HTML link for the post
	* @access	public
	*/
	public function build_post_link($post_id)
	{
		$post_url = $this->build_post_url($post_id);
		return "<a href=\"{$post_url}\">{$this->user->lang['VIEW_LATEST_POST']}</a>";
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
