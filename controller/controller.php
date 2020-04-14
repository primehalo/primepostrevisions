<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\controller;

use \primehalo\primepostrevisions\core;

/**
* Class declaration
*/
class controller
{
	protected $core;

	/**
	* Service Containers
	*/
	protected $auth;
	protected $config;
	protected $db;
	protected $helper;
	protected $request;
	protected $template;
	protected $user;

	/**
	* Constant variables
	*/
	protected $revisions_table;
	protected $root_path;
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\auth\auth					$auth				Auth object
	* @param \phpbb\config\config				$config				Config object
	* @param \phpbb\db\driver\driver_interface	$db					Database connection
	* @param \phpbb\controller\helper			$controller_helper	Controller helper object
	* @param \phpbb\request\request_interface	$request			Request object
	* @param \phpbb\template\template			$template			Template object
	* @param \phpbb\user						$user				User object
	* @param string								$revisions_table	Prime Post Revisions table
	* @param $root_path							$root_path			phpBB root path
	* @param $phpExt							$phpExt				php file extension
	* @access public
	*/
	public function __construct(
		\phpbb\auth\auth $auth,
		\phpbb\config\config $config,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\controller\helper $helper,
		\phpbb\request\request_interface $request,
		\phpbb\template\template $template,
		\phpbb\user $user,
		$revisions_table,
		$root_path,
		$phpExt)
	{
		$this->auth				= $auth;
		$this->config			= $config;
		$this->db				= $db;
		$this->helper			= $helper;
		$this->request			= $request;
		$this->template			= $template;
		$this->user				= $user;
		$this->revisions_table	= $revisions_table;
		$this->root_path		= $root_path;
		$this->php_ext			= $phpExt;

		$this->core = \primehalo\primepostrevisions\core\prime_post_revisions::Instance();
	}

	/**
	* Build the page for viewing all revisions of a post.
	*
	* @param int $post_id The ID of the post whose revisions we want to view
	* @return Symphony Response object
	* @access public
	*/
	public function view($post_id)
	{
		// Obtain the current version of the post
		$sql = $this->db->sql_build_query('SELECT', array(
			'SELECT'	=> 'p.forum_id, p.poster_id, p.post_time, p.post_subject, p.post_text, p.primepost_edit_time,
							p.post_edit_reason, p.primepost_edit_user, p.primepost_edit_count, p.bbcode_bitfield, p.bbcode_uid, u.*',
			'FROM'		=> array(POSTS_TABLE => 'p', USERS_TABLE => 'u'),
			'WHERE'		=> 'post_id = ' . $post_id . ' AND ((p.primepost_edit_user = 0 AND p.poster_id = u.user_id) OR p.primepost_edit_user = u.user_id)',
		));
		$result		= $this->db->sql_query($sql);
		$post_data	= $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Prepare some variables that will be used for permission and deletion checks
		$forum_id	= $post_data['forum_id'];
		$post_url	= $this->core->build_post_url($post_id);
		$post_link	= "<a href=\"{$post_url}\">{$this->user->lang['VIEW_LATEST_POST']}</a>";
		$s_hidden_fields = build_hidden_fields(array(
			'revision_list'	=> array_filter($this->request->variable('revision_list', array(0))),
			'action'		=> 'delete',
		));

		// Delete button was pressed
		if ($this->request->variable('action', '') === 'delete')
		{
			$revision_list = array_filter($this->request->variable('revision_list', array(0)));
			if (!empty($revision_list))
			{
				return $this->delete($revision_list, $s_hidden_fields);
			}
		}

		// Check if user is allowed to view these revisions
		if (!$this->core->is_auth('view', $forum_id, $post_data['poster_id']))
		{
			return $this->helper->message($this->user->lang['PRIMEPOSTREVISIONS_VIEW_DENIED'] . "<br /><br />{$post_link}");
		}

		// Prepare some variables
		$user_cache		= array();
		$deletable_cnt	= 0;
		$revision_cnt	= 0;
		$page_name		= $this->user->lang['PRIMEPOSTREVISIONS_VIEWING'];
		$can_delete		= $this->core->is_auth('delete', $forum_id, $post_data['poster_id']);
		$can_restore	= $this->core->is_auth('restore', $forum_id, $post_data['poster_id']);

		// Get data about the list of revisions and the users that edited them
		$sql = "SELECT r.*, u.* FROM {$this->revisions_table} r, " . USERS_TABLE . " u
				WHERE r.post_id = {$post_id} AND ((r.primepost_edit_user = 0 AND u.user_id = {$post_data['poster_id']}) OR r.primepost_edit_user = u.user_id)
				ORDER BY revision_id DESC";
		$result = $this->db->sql_query($sql);
		$revisions = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		// Add the current version of the post to the list
		array_unshift($revisions, $post_data);

		// Include the file necessary for obtaining user rank & also for generation of text for display & edit
		if (!function_exists('phpbb_get_user_rank') || !function_exists('generate_text_for_display') || !function_exists('generate_text_for_edit'))
		{
			include_once($this->root_path . 'includes/functions_display.' . $this->php_ext);
			include_once($this->root_path . 'includes/functions_content.' . $this->php_ext);
		}

		// Loop through the revisions and generate the template variables
		foreach ($revisions as $row)
		{
			$poster_id = $row['user_id'];
			if (!isset($user_cache[$poster_id]))
			{
				$user_rank_data = phpbb_get_user_rank($row, $row['user_posts']);
				$user_cache[$poster_id] = array(
					'user_type'					=> $row['user_type'],
					'user_inactive_reason'		=> $row['user_inactive_reason'],

					'joined'		=> $this->user->format_date($row['user_regdate']),
					'posts'			=> $row['user_posts'],
					'warnings'		=> (isset($row['user_warnings'])) ? $row['user_warnings'] : 0,

					#'sig'					=> $user_sig,
					#'sig_bbcode_uid'		=> (!empty($row['user_sig_bbcode_uid'])) ? $row['user_sig_bbcode_uid'] : '',
					#'sig_bbcode_bitfield'	=> (!empty($row['user_sig_bbcode_bitfield'])) ? $row['user_sig_bbcode_bitfield'] : '',

					'viewonline'	=> $row['user_allow_viewonline'],
					'allow_pm'		=> $row['user_allow_pm'],

					'avatar'		=> ($this->user->optionget('viewavatars')) ? phpbb_get_user_avatar($row) : '',
					'age'			=> '',

					'rank_title'		=> $user_rank_data['title'],
					'rank_image'		=> $user_rank_data['img'],
					'rank_image_src'	=> $user_rank_data['img_src'],

					'username'			=> $row['username'],
					'user_colour'		=> $row['user_colour'],
					'contact_user' 		=> $this->user->lang('CONTACT_USER', get_username_string('username', $poster_id, $row['username'], $row['user_colour'], $row['username'])),

					'online'		=> false,
					#'jabber'		=> ($this->config['jab_enable'] && $row['user_jabber'] && $this->auth->acl_get('u_sendim')) ? append_sid("{$this->root_path}memberlist.{$this->php_ext}", "mode=contact&amp;action=jabber&amp;u=$poster_id") : '',
					'search'		=> ($this->config['load_search'] && $this->auth->acl_get('u_search')) ? append_sid("{$this->root_path}search.{$this->php_ext}", "author_id=$poster_id&amp;sr=posts") : '',

					'author_full'		=> get_username_string('full', $poster_id, $row['username'], $row['user_colour']),
					'author_colour'		=> get_username_string('colour', $poster_id, $row['username'], $row['user_colour']),
					'author_username'	=> get_username_string('username', $poster_id, $row['username'], $row['user_colour']),
					'author_profile'	=> get_username_string('profile', $poster_id, $row['username'], $row['user_colour']),
				);
			}

			$revision_id	= empty($row['revision_id']) ? 0 :  $row['revision_id'];
			$parse_flags	= ($row['bbcode_bitfield'] ? OPTION_FLAG_BBCODE : 0) | OPTION_FLAG_SMILIES;
			$post_text		= generate_text_for_display($row['post_text'], $row['bbcode_uid'], $row['bbcode_bitfield'], $parse_flags);
			$post_date		= empty($row['primepost_edit_time']) ? $post_data['post_time'] : $row['primepost_edit_time'];
			$delete_url		= ($can_delete && !empty($revision_id)) ? $this->helper->route('primehalo_primepostrevisions_delete', array('revision_id' => $revision_id)) : false;
			$restore_url	= ($can_restore && !empty($revision_id)) ? $this->helper->route('primehalo_primepostrevisions_restore', array('revision_id' => $revision_id)) : false;
			$reason			= $row['post_edit_reason'];
			$edit_count_str	= sprintf($this->user->lang['PRIMEPOSTREVISIONS_COUNT'], $row['primepost_edit_count']);
			$edit_count_str	= empty($row['primepost_edit_count']) ? $this->user->lang['PRIMEPOSTREVISIONS_FIRST'] : $edit_count_str;
			$edit_count_str	= empty($revision_id) ? $this->user->lang['PRIMEPOSTREVISIONS_FINAL'] : $edit_count_str;
			$deletable_cnt	+= $delete_url ? 1 : 0;
			$bbcode_text	= generate_text_for_edit($row['post_text'], $row['bbcode_uid'], 0)['text'];

			$this->template->assign_block_vars('postrow',array(
				'REVISION_ID'		=> $revision_id,
				'POST_ID'			=> $post_id,
				'POST_DATE'			=> $this->user->format_date($post_date),
				'POST_TEXT'			=> $post_text,
				'POST_SUBJECT'		=> $row['post_subject'],
				'U_RESTORE'			=> $restore_url,
				'U_DELETE'			=> $delete_url,
				'U_POST'			=> $post_url,
				'EDIT_COUNT'		=> empty($row['primepost_edit_count']) ? 0 : $row['primepost_edit_count'],
				'EDIT_REASON'		=> $reason,
				'EDIT_COUNT_STR'	=> $edit_count_str,
				'REVISION_CNT'		=> $revision_cnt,
				'BBCODE_TEXT'		=> $bbcode_text,

				// Poster
				'POST_AUTHOR_FULL'		=> ($poster_id != ANONYMOUS) ? $user_cache[$poster_id]['author_full'] : get_username_string('full', $poster_id, $row['username'], $row['user_colour'], $row['post_username']),
				'POST_AUTHOR_COLOUR'	=> ($poster_id != ANONYMOUS) ? $user_cache[$poster_id]['author_colour'] : get_username_string('colour', $poster_id, $row['username'], $row['user_colour'], $row['post_username']),
				'POST_AUTHOR'			=> ($poster_id != ANONYMOUS) ? $user_cache[$poster_id]['author_username'] : get_username_string('username', $poster_id, $row['username'], $row['user_colour'], $row['post_username']),
				'U_POST_AUTHOR'			=> ($poster_id != ANONYMOUS) ? $user_cache[$poster_id]['author_profile'] : get_username_string('profile', $poster_id, $row['username'], $row['user_colour'], $row['post_username']),
				'RANK_TITLE'		=> $user_cache[$poster_id]['rank_title'],
				'RANK_IMG'			=> $user_cache[$poster_id]['rank_image'],
				'RANK_IMG_SRC'		=> $user_cache[$poster_id]['rank_image_src'],
				'POSTER_JOINED'		=> $user_cache[$poster_id]['joined'],
				'POSTER_POSTS'		=> $user_cache[$poster_id]['posts'],
				'POSTER_AVATAR'		=> $user_cache[$poster_id]['avatar'],
				'POSTER_WARNINGS'	=> $this->auth->acl_get('m_warn') ? $user_cache[$poster_id]['warnings'] : '',
				'POSTER_AGE'		=> $user_cache[$poster_id]['age'],
				'CONTACT_USER'		=> $user_cache[$poster_id]['contact_user'],
				'U_SEARCH'			=> $user_cache[$poster_id]['search'],
			));
			$revision_cnt += 1;
		}

		// Assign some global template variables
		add_form_key('revisions_form');
		$this->template->assign_vars(array(
			'REVISIONS'			=> true,
			'POST_SUBJECT'		=> $post_data['post_subject'],
			'U_POST'			=> $post_url,
			'POST_ID'			=> $post_id,
			'S_FORM_ACTION'		=> $this->helper->route('primehalo_primepostrevisions_view', array('post_id' => $post_id)),
			'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
			'DELETABLE_CNT'		=> $deletable_cnt,
		));

		return $this->helper->render('body.html', $page_name);
	}

	/**
	* Deletes one or more revisions.
	*
	* @param	int|array	$revision_id		An ID or an array of IDs of the revisions to be deleted
	* @param	string		$s_hidden_fields	A string of hidden fields to pass to confirm_box()
	* @return Symphony Response object
	* @access public
	*/
	public function delete($revision_id = 0, $s_hidden_fields = '')
	{
		$rev_list	= is_array($revision_id) ? $revision_id : array($revision_id);
		$msg_prefix	= is_array($revision_id) ? 'PRIMEPOSTREVISIONS_DELETES_' : 'PRIMEPOSTREVISIONS_DELETE_';

		// Load the post data so we can verify the user's permissions
		$sql = $this->db->sql_build_query('SELECT', array(
			'SELECT'	=> 'p.post_id, p.forum_id, p.poster_id',
			'FROM'		=> array($this->revisions_table => 'r', POSTS_TABLE => 'p'),
			'WHERE'		=> $this->db->sql_in_set('r.revision_id', $rev_list) . ' AND p.post_id = r.post_id',
		));
		$result		= $this->db->sql_query($sql);
		$post_data	= $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Prepare some variables
		$forum_id	= $post_data['forum_id'];
		$view_url	= $this->helper->route('primehalo_primepostrevisions_view', array('post_id' => $post_data['post_id']));
		$view_link	= "<a href=\"{$view_url}\">{$this->user->lang['PRIMEPOSTREVISIONS_VIEW']}</a>";

		// Check if user is allowed to delete this revision
		if (!$this->core->is_auth('delete', $forum_id, $post_data['poster_id']))
		{
			return $this->helper->message($this->user->lang[$msg_prefix . 'DENIED'] . "<br /><br />{$view_link}");
		}

		// User confirmed the deletion action
		if (confirm_box(true))
		{
			$sql = "DELETE FROM {$this->revisions_table} WHERE " . $this->db->sql_in_set('revision_id', $rev_list);
			if ($this->db->sql_query($sql))
			{
				meta_refresh(3, $view_url);
				return $this->helper->message($this->user->lang[$msg_prefix . 'SUCCESS'] . "<br /><br />{$view_link}");
			}
			else
			{
				return $this->helper->message($this->user->lang[$msg_prefix . 'FAILED'] . "<br /><br />{$view_link}");
			}
		}
		else
		{
			confirm_box(false, $this->user->lang[$msg_prefix . 'CONFIRM'], $s_hidden_fields);
		}

		redirect($view_url);
		return $this->helper->message($view_link); // Safety net in case redirection isn't possible
	}

	/**
	*
	* @return Symphony Response object
	* @access public
	*/
	public function restore($revision_id)
	{
		// Load the post that belongs to the given revision ID
		$sql = $this->db->sql_build_query('SELECT', array(
			'SELECT'	=> 'r.post_id, p.forum_id, p.poster_id, r.post_subject, r.post_text, r.bbcode_bitfield, r.bbcode_uid,
							r.post_edit_time, r.post_edit_reason, r.post_edit_user, p.post_edit_count,
							r.primepost_edit_time, r.primepost_edit_user, p.primepost_edit_count',
			'FROM'		=> array($this->revisions_table => 'r', POSTS_TABLE => 'p'),
			'WHERE'		=> 'r.revision_id = ' . $revision_id . ' AND p.post_id = r.post_id',
		));
		$result		= $this->db->sql_query($sql);
		$post_data	= $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Prepare some variables
		$post_id	= $post_data['post_id'];
		$forum_id	= $post_data['forum_id'];
		$view_url	= $this->helper->route('primehalo_primepostrevisions_view', array('post_id' => $post_id));
		$post_url	= $this->core->build_post_url($post_id);
		$view_link	= "<a href=\"{$view_url}\">{$this->user->lang['PRIMEPOSTREVISIONS_VIEW']}</a>";
		$post_link	= "<a href=\"{$post_url}\">{$this->user->lang['VIEW_LATEST_POST']}</a>";

		// Check if user is allowed to restore this revision
		if (!$this->core->is_auth('restore', $forum_id, $post_data['poster_id']))
		{
			return $this->helper->message($this->user->lang['PRIMEPOSTREVISIONS_DELETE_DENIED'] . "<br /><br />{$view_link}");
		}

		// Assign template variables for the confirmation box
		$this->user->add_lang('posting');
		$this->template->assign_vars(array('POST_EDIT_REASON' => $post_data['post_edit_reason']));

		// User confirmed the restoration action
		if (confirm_box(true))
		{
			$this->core->save_revision($post_id);

			// Should we restore the edit time and edit count as well, or should
			// those be set as if this were a new edit? I vote for a new edit since
			// we're not removing the edit that's being restored.
			$cur_time = time();
			$update_post = array(
				'post_text'			=> $post_data['post_text'],
				'post_subject'		=> $post_data['post_subject'],
				'bbcode_bitfield'	=> $post_data['bbcode_bitfield'],
				'bbcode_uid'		=> $post_data['bbcode_uid'],
				#'post_edit_time'	=> $post_data['post_edit_time'],
				'post_edit_time'	=> $cur_time,
				'post_edit_reason'	=> $this->request->variable('post_edit_reason', $post_data['post_edit_reason']),
				'post_edit_user'	=> $post_data['post_edit_user'],
				'post_edit_count'	=> $post_data['post_edit_count'] + 1,
				#'primepost_edit_time'	=> $post_data['primepost_edit_time'],
				'primepost_edit_time'	=> $cur_time,
				'primepost_edit_user'	=> $post_data['primepost_edit_user'],
				'primepost_edit_count'	=> $post_data['primepost_edit_count'] + 1,
			);
			if ($this->db->sql_query('UPDATE ' . POSTS_TABLE . ' SET '. $this->db->sql_build_array('UPDATE', $update_post) . " WHERE post_id = {$post_id}"))
			{
				meta_refresh(3, $post_url);
				return $this->helper->message($this->user->lang['PRIMEPOSTREVISIONS_RESTORE_SUCCESS'] . "<br /><br />{$post_link}");
			}
			else
			{
				return $this->helper->message($this->user->lang['PRIMEPOSTREVISIONS_RESTORE_FAILURE'] . "<br /><br />{$post_link}");
			}
		}
		else
		{
			confirm_box(false, $this->user->lang['PRIMEPOSTREVISIONS_RESTORE_CONFIRM'], '', 'confirm_restore.html');
		}

		redirect($view_url);
		return $this->helper->message($view_link); // Safety net in case redirection isn't possible
	}
}
