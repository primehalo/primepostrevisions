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

use phpbb\auth\auth;
use phpbb\config\config;
use phpbb\db\driver\driver_interface as db_driver;
use phpbb\controller\helper as controller_helper;
use phpbb\request\request_interface as request;
use phpbb\template\template;
use phpbb\user;
use phpbb\cache\driver\driver_interface as cache_driver;
use primehalo\primepostrevisions\core\prime_post_revisions as core;
use phpbb\pagination;

/**
* Class declaration
*/
class controller
{
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
	protected $cache;
	protected $core;
	protected $pagination;

	/**
	* Constant variables
	*/
	protected $revisions_table;
	protected $root_path;
	protected $php_ext;

	/**
	 * Cache Key
	 */
	protected const PPR_USER_CACHE_KEY = '_prime_post_revisions_user_cache';

	/**
	* Constructor
	*
	* @param auth					$auth				Auth object
	* @param config					$config				Config object
	* @param db_driver				$db					Database connection
	* @param controller_helper		$controller_helper	Controller helper object
	* @param request				$request			Request object
	* @param template				$template			Template object
	* @param user					$user				User object
	* @param cache_driver			$cache				Cache object
	* @param core					$core				Prime Post Revisions core
	* @param pagination				$pagination			Pagination object
	* @param string					$revisions_table	Prime Post Revisions table
	* @param string					$root_path			phpBB root path
	* @param string					$phpExt				php file extension
	* @access public
	*/
	public function __construct(auth $auth, config $config, db_driver $db, controller_helper $helper, request $request, template $template, user $user, cache_driver $cache, core $core, pagination $pagination, $revisions_table, $root_path, $phpExt)
	{
		$this->auth				= $auth;
		$this->config			= $config;
		$this->db				= $db;
		$this->helper			= $helper;
		$this->request			= $request;
		$this->template			= $template;
		$this->user				= $user;
		$this->cache			= $cache;
		$this->core				= $core;
		$this->pagination		= $pagination;
		$this->revisions_table	= $revisions_table;
		$this->root_path		= $root_path;
		$this->php_ext			= $phpExt;
	}

	/**
	* Build the page for viewing all revisions of a post.
	*
	* @param	int				$post_id		The ID of the post whose revisions we want to view
	* @param	bool|int|array	$revision_id	An ID or an array of IDs of the revisions to be compared
	* @return Symphony Response object
	* @access public
	*/
	public function view($post_id, $revision_id = false)
	{
		$comparing_selected = false;	// Are we comparing selected revisions?
		$rev_list = [];			// List of revision IDs to compare

		if ($revision_id !== false)
		{
			$rev_list = is_array($revision_id) ? (count($revision_id) > 1 ? $revision_id : array_merge([0], $revision_id)) : [0, $revision_id];
			$comparing_selected = true;
		}

		// Obtain the current version of the post as well as data for the last person to edit it
		// The post_edit_* fields hold the data for the most recent edit, but we need them as primepost_* for when this post gets merged into the array of revisions.
		$sql = $this->db->sql_build_query('SELECT', [
			'SELECT'	=> 'p.forum_id, p.poster_id, p.post_time, p.post_subject, p.post_text, p.primepost_edit_time,
							p.post_edit_reason, p.primepost_edit_user, p.primepost_edit_count, p.bbcode_bitfield, p.bbcode_uid, u.*',
			'FROM'		=> [POSTS_TABLE => 'p'],
			'LEFT_JOIN'	=> [
				[
					'FROM'	=> [USERS_TABLE => 'u'],
					'ON'	=> '(p.primepost_edit_user = 0 AND p.poster_id = u.user_id) OR p.primepost_edit_user = u.user_id',
				],
			],
			'WHERE'		=> "p.post_id = {$post_id}",
		]);
		$result		= $this->db->sql_query($sql);
		$post_data	= $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Prepare some variables that will be used for permission and deletion checks
		$forum_id			= $post_data['forum_id'];
		$start				= $this->request->variable('start', 0);
		$show_all			= $start < 0;	// Negative value represents Show All
		$posts_per_page		= $this->config['posts_per_page'] - 1;
		$sql_start			= $start == 0 ? $start : $start - 1 ;
		$sql_per_page		= $start == 0 ? $posts_per_page : $posts_per_page + 1 ;
		$base_url			= $this->helper->route('primehalo_primepostrevisions_view', ['post_id' => $post_id]);
		$post_url			= $this->core->build_post_url($post_id);
		$post_link			= "<a href=\"{$post_url}\">{$this->user->lang['VIEW_LATEST_POST']}</a>";
		$page_name			= $comparing_selected ? $this->user->lang['PRIMEPOSTREVISIONS_COMPARING'] : $this->user->lang['PRIMEPOSTREVISIONS_VIEWING'];
		$can_view			= $this->core->is_auth('view', $forum_id, $post_data['poster_id']);
		$can_delete			= $this->core->is_auth('delete', $forum_id, $post_data['poster_id']);
		$can_restore		= $this->core->is_auth('restore', $forum_id, $post_data['poster_id']);
		$url_delim			= (strpos($base_url, '?') === false) ? '?' : ((strpos($base_url, '?') === strlen($base_url) - 1) ? '' : '&amp;');
		$show_all_url		= $show_all ? '' : $base_url . $url_delim . 'start=-1';

		// Compare or Delete button was pressed
		$compare_submit = $this->request->is_set_post('compare') && !$comparing_selected && $can_view;
		$delete_submit = $this->request->is_set_post('delete') && $can_delete;
		$revision_list = $this->request->variable('revision_list', [0]);
		if ($compare_submit || $delete_submit)
		{
			if (!empty($revision_list))
			{
				return ($compare_submit) ? $this->view($post_id, $revision_list) : $this->delete($revision_list);
			}
			else
			{
				trigger_error('FORM_INVALID', E_USER_WARNING);
			}
		}

		// Check if user is allowed to view these revisions
		if (!$can_view)
		{
			return $this->helper->message($this->user->lang['PRIMEPOSTREVISIONS_VIEW_DENIED'] . "<br /><br />{$post_link}");
		}

		// Prepare user data from the cache
		$user_cache = $this->cache->get(self::PPR_USER_CACHE_KEY);

		// If not cached or guest user not cached then cache it
		if ($user_cache === false || !isset($user_cache[ANONYMOUS]))
		{
			$sql = $this->db->sql_build_query('SELECT', [
				'SELECT'	=> 'u.user_id, u.username, u.username_clean, u.user_type, u.user_colour, u.user_avatar, u.user_avatar_type, u.user_avatar_width, u.user_avatar_height',
				'FROM'		=> [USERS_TABLE	=> 'u'],
				'WHERE'		=> 'u.user_id = ' . ANONYMOUS,
			]);
			$result		= $this->db->sql_query($sql);
			$row	= $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			$user_cache[ANONYMOUS] = [
				'username'			=> $row['username'],
				'user_colour'		=> $row['user_colour'],
				'avatar'			=> ($this->user->optionget('viewavatars')) ? phpbb_get_user_avatar($row) : '',

				'author_full'		=> get_username_string('full', ANONYMOUS, $row['username'], $row['user_colour']),
				'author_colour'		=> get_username_string('colour', ANONYMOUS, $row['username'], $row['user_colour']),
				'author_username'	=> get_username_string('username', ANONYMOUS, $row['username'], $row['user_colour']),
				'author_profile'	=> get_username_string('profile', ANONYMOUS, $row['username'], $row['user_colour']),

				'rank_title'		=> '',
				'rank_image'		=> '',
				'rank_image_src'	=> '',

				'contact_user' 		=> '',
				'pm'				=> '',
				'email'				=> '',
				'jabber'			=> '',
			];

			// Cache user data
			$this->cache->put(self::PPR_USER_CACHE_KEY, $user_cache);
		}

		// Prepare some variables
		$deletable_cnt	= 0;	// Total number of revisions that can be deleted
		$revision_cnt	= 0;	// Total number of revisions that can be displayed

		// Get data about the list of revisions and the users that edited them
		$sql_ary = [
			'SELECT'	=> 'r.*, u.*',
			'FROM'		=> [$this->revisions_table => 'r'],
			'LEFT_JOIN'	=> [
				[
					'FROM'	=> [USERS_TABLE => 'u'],
					'ON'	=> "(r.primepost_edit_user = 0 AND u.user_id = {$post_data['poster_id']}) OR r.primepost_edit_user = u.user_id",
				],
			],
			'WHERE'		=> "r.post_id = {$post_id}" . ($comparing_selected ? ' AND ' . $this->db->sql_in_set('r.revision_id', $rev_list) : ''),
			'ORDER_BY'	=> 'r.revision_id DESC',
		];
		$sql		= $this->db->sql_build_query('SELECT', $sql_ary);
		$result		= empty($show_all) ? $this->db->sql_query_limit($sql, $sql_per_page, $sql_start) : $this->db->sql_query($sql);
		$revisions	= $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		// Get total count about the list of revisions
		unset($sql_ary['LEFT_JOIN']);
		$sql_ary['SELECT']	= 'COUNT(*) as total_rev_cnt';
		$sql				= $this->db->sql_build_query('SELECT', $sql_ary);
		$result				= $this->db->sql_query($sql);
		$total_rev_cnt		= $this->db->sql_fetchfield('total_rev_cnt');
		$show_all_url		= $total_rev_cnt <= $posts_per_page ? '' : $show_all_url; // Don't need a show all link when all revisions are already being shown
		$this->db->sql_freeresult($result);

		// Add the current version of the post to the list
		if ((!$comparing_selected && ($start == 0 || $show_all)) || ($comparing_selected && in_array(0, $rev_list)))
		{
			array_unshift($revisions, $post_data);
		}

		// Include the file necessary for obtaining user rank
		if (!function_exists('phpbb_get_user_rank'))
		{
			include($this->root_path . 'includes/functions_display.' . $this->php_ext);
		}
		// Include the file necessary for generating text to display & edit
		if (!function_exists('generate_text_for_display') || !function_exists('generate_text_for_edit'))
		{
			include($this->root_path . 'includes/functions_content.' . $this->php_ext);
		}

		// Loop through the revisions and generate the template variables
		foreach ($revisions as $row)
		{
			$poster_id = $row['user_id'];
			if (!isset($user_cache[$poster_id]))
			{
				$user_rank_data	= phpbb_get_user_rank($row, $row['user_posts']);
				$can_send_pm	= $this->config['allow_privmsg'] && $this->auth->acl_get('u_sendpm') &&
									(
										$row['user_type'] != USER_IGNORE &&
										($row['user_type'] != USER_INACTIVE || $row['user_inactive_reason'] != INACTIVE_MANUAL) &&
										(($this->auth->acl_gets('a_', 'm_') || $this->auth->acl_getf_global('m_')) || $row['user_allow_pm'])
									);
				$u_pm			= ($can_send_pm) ? append_sid("{$this->root_path}ucp.{$this->php_ext}", "i=pm&amp;mode=compose&amp;u=$poster_id") : '';
				$u_email		= ((!empty($row['user_allow_viewemail']) && $this->auth->acl_get('u_sendemail')) || $this->auth->acl_get('a_email'))
									? (($this->config['board_email_form'] && $this->config['email_enable'])
										? append_sid("{$this->root_path}memberlist.$this->php_ext", "mode=email&amp;u=$poster_id")
										: (($this->config['board_hide_emails'] && !$this->auth->acl_get('a_email')) ? '' : 'mailto:' . $row['user_email']))
									: '';
				$u_jabber		= ($this->config['jab_enable'] && $row['user_jabber'] && $this->auth->acl_get('u_sendim'))
									? append_sid("{$this->root_path}memberlist.{$this->php_ext}", "mode=contact&amp;action=jabber&amp;u=$poster_id")
									: '';
				$user_cache[$poster_id] = [
					'username'			=> $row['username'],
					'user_colour'		=> $row['user_colour'],
					'avatar'			=> ($this->user->optionget('viewavatars')) ? phpbb_get_user_avatar($row) : '',

					'author_full'		=> get_username_string('full', $poster_id, $row['username'], $row['user_colour']),
					'author_colour'		=> get_username_string('colour', $poster_id, $row['username'], $row['user_colour']),
					'author_username'	=> get_username_string('username', $poster_id, $row['username'], $row['user_colour']),
					'author_profile'	=> get_username_string('profile', $poster_id, $row['username'], $row['user_colour']),

					'rank_title'		=> $user_rank_data['title'],
					'rank_image'		=> $user_rank_data['img'],
					'rank_image_src'	=> $user_rank_data['img_src'],

					'contact_user' 		=> $this->user->lang('CONTACT_USER', get_username_string('username', $poster_id, $row['username'], $row['user_colour'], $row['username'])),
					'pm'				=> $u_pm,
					'email'				=> $u_email,
					'jabber'			=> $u_jabber,
				];

				// Cache user data
				$this->cache->put(self::PPR_USER_CACHE_KEY, $user_cache);
			}

			$post_rev_id	= empty($row['revision_id']) ? 0 :  $row['revision_id'];
			$parse_flags	= ($row['bbcode_bitfield'] ? OPTION_FLAG_BBCODE : 0) | OPTION_FLAG_SMILIES;
			$post_text		= generate_text_for_display($row['post_text'], $row['bbcode_uid'], $row['bbcode_bitfield'], $parse_flags);
			$post_date		= empty($row['primepost_edit_time']) ? $post_data['post_time'] : $row['primepost_edit_time'];
			$delete_url		= ($can_delete && !empty($post_rev_id)) ? $this->helper->route('primehalo_primepostrevisions_delete', ['revision_id' => $post_rev_id]) : false;
			$restore_url	= ($can_restore && !empty($post_rev_id)) ? $this->helper->route('primehalo_primepostrevisions_restore', ['revision_id' => $post_rev_id]) : false;
			$reason			= $row['post_edit_reason'];
			$edit_count		= (!isset($row['primepost_edit_count']) || empty($row['primepost_edit_count'])) ? 0 : $row['primepost_edit_count'];
			$edit_count_str	= sprintf($this->user->lang['PRIMEPOSTREVISIONS_COUNT'], $edit_count);
			$edit_count_str	= empty($edit_count) ? $this->user->lang['PRIMEPOSTREVISIONS_FIRST'] : $edit_count_str;
			$edit_count_str	= empty($post_rev_id) ? $this->user->lang['PRIMEPOSTREVISIONS_FINAL'] : $edit_count_str;
			$bbcode_text	= generate_text_for_edit($row['post_text'], $row['bbcode_uid'], 0)['text'];
			$deletable_cnt	+= $delete_url ? 1 : 0;
			$contact_fields	= [[
				'ID'		=> 'pm',
				'NAME' 		=> $this->user->lang['SEND_PRIVATE_MESSAGE'],
				'U_CONTACT'	=> $user_cache[$poster_id]['pm'],
			], [
				'ID'		=> 'email',
				'NAME'		=> $this->user->lang['SEND_EMAIL'],
				'U_CONTACT'	=> $user_cache[$poster_id]['email'],
			], [
				'ID'		=> 'jabber',
				'NAME'		=> $this->user->lang['JABBER'],
				'U_CONTACT'	=> $user_cache[$poster_id]['jabber'],
			],];

			$this->template->assign_block_vars('postrow',[
				'REVISION_ID'		=> $post_rev_id,
				'POST_ID'			=> $post_id,
				'POST_DATE'			=> $this->user->format_date($post_date),
				'POST_TEXT'			=> $post_text,
				'POST_SUBJECT'		=> $row['post_subject'],
				'U_RESTORE'			=> $restore_url,
				'U_DELETE'			=> $delete_url,
				'U_POST'			=> $post_url,
				'EDIT_COUNT'		=> $edit_count,
				'EDIT_REASON'		=> $reason,
				'EDIT_COUNT_STR'	=> $edit_count_str,
				'REVISION_CNT'		=> $revision_cnt,
				'BBCODE_TEXT'		=> $bbcode_text,

				// Poster
				'POSTER_AVATAR'			=> $user_cache[$poster_id]['avatar'],
				'POST_AUTHOR_FULL'		=> $user_cache[$poster_id]['author_full'],
				'POST_AUTHOR_COLOUR'	=> $user_cache[$poster_id]['author_colour'],
				'POST_AUTHOR'			=> $user_cache[$poster_id]['author_username'],
				'U_POST_AUTHOR'			=> $user_cache[$poster_id]['author_profile'],
				'RANK_TITLE'			=> $user_cache[$poster_id]['rank_title'],
				'RANK_IMG'				=> $user_cache[$poster_id]['rank_image'],
				'RANK_IMG_SRC'			=> $user_cache[$poster_id]['rank_image_src'],
				'CONTACT_USER'			=> $user_cache[$poster_id]['contact_user'],
				'U_PM'					=> $user_cache[$poster_id]['pm'],
				'U_EMAIL'				=> $user_cache[$poster_id]['email'],
				'U_JABBER'				=> $user_cache[$poster_id]['jabber'],
			]);

			foreach ($contact_fields as $field)
			{
				if ($field['U_CONTACT'])
				{
					$this->template->assign_block_vars('postrow.contact', $field);
				}
			}

			$revision_cnt++;
		}

		$this->pagination->generate_template_pagination($base_url, 'pagination', 'start', $total_rev_cnt, $posts_per_page, $start);

		// Assign some global template variables
		$this->template->assign_vars([
			'REVISIONS'			=> true,
			'COMPARISONS'		=> !$comparing_selected,
			'POST_SUBJECT'		=> $post_data['post_subject'],
			'U_POST'			=> $post_url,
			'POST_ID'			=> $post_id,
			'S_FORM_ACTION'		=> $base_url,
			'DELETABLE_CNT'		=> $deletable_cnt,
			'REVISION_CNT'		=> $revision_cnt,
			'TOTAL_REV_CNT'		=> $total_rev_cnt,
			'SELECTABLE'		=> $deletable_cnt > 1 || (!$comparing_selected && $revision_cnt > 2),	// Do we need checkboxes for selecting revisions?
			'SHOW_ALL_URL'		=> $show_all_url,
		]);

		// Generate Breadcrumbs
		$sql_array = [
			'SELECT'	=> 't.*, f.*, p.post_visibility, p.post_time, p.post_id',
			'FROM'		=> [FORUMS_TABLE => 'f', POSTS_TABLE => 'p', TOPICS_TABLE => 't'],
			'WHERE'		=> "p.post_id = $post_id AND t.topic_id = p.topic_id AND f.forum_id = t.forum_id"
		];
		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query($sql);
		$topic_data = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);
		generate_forum_nav($topic_data);
		$this->template->assign_block_vars('navlinks', [
			'BREADCRUMB_NAME'	=> $topic_data['topic_title'],
			'U_BREADCRUMB'		=> $this->core->build_topic_url($topic_data['topic_id']),
		]);
		$this->template->assign_block_vars('navlinks', [
			'BREADCRUMB_NAME'	=> $post_data['post_subject'],
			'U_BREADCRUMB'		=> $post_url,
		]);
		$this->template->assign_block_vars('navlinks', [
			'BREADCRUMB_NAME'	=> $comparing_selected ? $this->user->lang['PRIMEPOSTREVISIONS_VIEW'] : $this->user->lang['PRIMEPOSTREVISIONS_VIEWING'],
			'U_BREADCRUMB'		=> $base_url,
		]);

		return $this->helper->render('@primehalo_primepostrevisions/primepostrevisions_body.html', $page_name);
	}

	/**
	* Deletes one or more revisions.
	*
	* @param	int|array	$revision_id		An ID or an array of IDs of the revisions to be deleted
	* @return Symphony Response object
	* @access public
	*/
	public function delete($revision_id = 0)
	{
		$rev_list	= array_filter(is_array($revision_id) ? $revision_id : [$revision_id]);
		$msg_prefix	= is_array($revision_id) ? 'PRIMEPOSTREVISIONS_DELETES_' : 'PRIMEPOSTREVISIONS_DELETE_';

		// Load the post data so we can verify the user's permissions
		$sql = $this->db->sql_build_query('SELECT', [
			'SELECT'	=> 'p.post_id, p.forum_id, p.poster_id',
			'FROM'		=> [$this->revisions_table => 'r', POSTS_TABLE => 'p'],
			'WHERE'		=> $this->db->sql_in_set('r.revision_id', $rev_list) . ' AND p.post_id = r.post_id',
		]);
		$result		= $this->db->sql_query($sql);
		$post_data	= $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Prepare some variables
		$forum_id	= $post_data['forum_id'];
		$view_url	= $this->helper->route('primehalo_primepostrevisions_view', ['post_id' => $post_data['post_id']]);
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
			$s_hidden_fields	= build_hidden_fields([
				'delete'		=> true,
				'revision_list'	=> $rev_list,
			]);
			confirm_box(false, $this->user->lang[$msg_prefix . 'CONFIRM'], $s_hidden_fields);
		}

		redirect($view_url);
	}

	/**
	*
	* @return Symphony Response object
	* @access public
	*/
	public function restore($revision_id)
	{
		// Load the post that belongs to the given revision ID
		$sql = $this->db->sql_build_query('SELECT', [
			'SELECT'	=> 'r.post_id, p.forum_id, p.poster_id, r.post_subject, r.post_text, r.bbcode_bitfield, r.bbcode_uid,
							r.post_edit_time, r.post_edit_reason, r.post_edit_user, p.post_edit_count,
							r.primepost_edit_time, r.primepost_edit_user, p.primepost_edit_count',
			'FROM'		=> [$this->revisions_table => 'r', POSTS_TABLE => 'p'],
			'WHERE'		=> 'r.revision_id = ' . (int) $revision_id . ' AND p.post_id = r.post_id',
		]);
		$result		= $this->db->sql_query($sql);
		$post_data	= $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		// Prepare some variables
		$post_id	= $post_data['post_id'];
		$forum_id	= $post_data['forum_id'];
		$view_url	= $this->helper->route('primehalo_primepostrevisions_view', ['post_id' => $post_id]);
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
		$this->template->assign_vars(['POST_EDIT_REASON' => $post_data['post_edit_reason']]);

		// User confirmed the restoration action
		if (confirm_box(true))
		{
			$this->core->save_revision($post_id);

			// Should we restore the edit time and edit count as well, or should
			// those be set as if this were a new edit? I vote for a new edit since
			// we're not removing the edit that's being restored.
			$cur_time = time();
			$update_post = [
				'post_text'			=> $post_data['post_text'],
				'post_subject'		=> $post_data['post_subject'],
				'bbcode_bitfield'	=> $post_data['bbcode_bitfield'],
				'bbcode_uid'		=> $post_data['bbcode_uid'],
				'post_edit_time'	=> $cur_time,	// To restore the original edit time use: $post_data['post_edit_time']
				'post_edit_reason'	=> $this->request->variable('post_edit_reason', $post_data['post_edit_reason'], true),
				'post_edit_user'	=> $post_data['post_edit_user'],
				'post_edit_count'	=> $post_data['post_edit_count'] + 1,
				'primepost_edit_time'	=> $cur_time,	// To restore the original edit time use: $post_data['primepost_edit_time']
				'primepost_edit_user'	=> $post_data['primepost_edit_user'],
				'primepost_edit_count'	=> $post_data['primepost_edit_count'] + 1,
			];
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
			confirm_box(false, $this->user->lang['PRIMEPOSTREVISIONS_RESTORE_CONFIRM'], '', 'primepostrevisions_confirm_restore.html');
		}

		redirect($view_url);
	}
}
