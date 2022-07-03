<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\config\config;
use phpbb\db\driver\driver_interface as db_driver;
use phpbb\controller\helper as controller_helper;
use phpbb\request\request_interface as request;
use primehalo\primepostrevisions\core\prime_post_revisions as core;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{

	/**
	* Service Containers
	*/
	protected $config;		// @var config
	protected $db;			// @var db_driver
	protected $helper;		// @var controller_helper
	protected $request;		// @var request
	protected $core;		// @var core

	/**
	* Variables
	*/
	protected $posts_with_revisions;
	protected $revisions_table;
	protected $revision_saved;

	static public function getSubscribedEvents()
	{
		return [
			'core.user_setup'								=> 'load_language_on_setup',			// 3.1.0-a1
			'core.permissions'								=> 'set_permissions',					// 3.1.0-a1
			'core.posting_modify_submit_post_before'		=> 'store_post_revision_info',			// 3.1.0-RC5
			'core.submit_post_modify_sql_data'				=> 'update_edit_data',					// 3.1.3-RC1
			'core.posting_modify_template_vars'				=> 'add_template_var',					// 3.1.0-a1
			'core.viewtopic_modify_post_data'				=> 'get_posts_with_revisions',			// 3.1.0-RC3
			'core.viewtopic_modify_post_row'				=> 'build_revisions_url',				// 3.1.0-RC3
			'core.delete_posts_in_transaction_before'		=> 'delete_revisions_for_posts',		// 3.1.0-a4
			'core.acp_manage_forums_request_data'			=> 'acp_manage_forums_request_data',	// 3.1.0-a1
			'core.acp_manage_forums_display_form'			=> 'acp_manage_forums_display_form',	// 3.1.0-a1
		];
	}

	/**
	* Constructor
	*
	* @param config					$config				Config object
	* @param db_driver				$db					Database connection
	* @param controller_helper		$controller_helper	Controller helper object
	* @param request				$request			Request object
	* @param core					$core				Prime Post Revisions core
	* @param string					$revisions_table	Prime Post Revisions table
	*/
	public function __construct(config $config, db_driver $db, controller_helper $helper, request $request, core $core, $revisions_table)
	{
		$this->config			= $config;
		$this->db				= $db;
		$this->helper			= $helper;
		$this->request			= $request;
		$this->core				= $core;
		$this->revisions_table	= $revisions_table;
	}

	/**
	* Set user permissions
	*
	* @param	\phpbb\event\data	$event	The event object from core.permissions
	* @return	void
	* @access	public
	*/
	public function set_permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions['m_primepostrev_view']		= ['lang' => 'ACL_M_PRIMEPOSTREV_VIEW',	'cat' => 'actions'];
		$permissions['m_primepostrev_delete']	= ['lang' => 'ACL_M_PRIMEPOSTREV_DELETE',	'cat' => 'actions'];
		$permissions['m_primepostrev_restore']	= ['lang' => 'ACL_M_PRIMEPOSTREV_RESTORE',	'cat' => 'actions'];
		$permissions['f_primepostrev_view']		= ['lang' => 'ACL_F_PRIMEPOSTREV_VIEW',	'cat' => 'actions'];
		$permissions['f_primepostrev_delete']	= ['lang' => 'ACL_F_PRIMEPOSTREV_DELETE',	'cat' => 'actions'];
		$permissions['f_primepostrev_restore']	= ['lang' => 'ACL_F_PRIMEPOSTREV_RESTORE',	'cat' => 'actions'];
		$event['permissions'] = $permissions;
	}

	/**
	* Load common language file during user setup
	*
	* @param	\phpbb\event\data	$event	The event object from core.user_setup
	* @return	void
	* @access	public
	*/
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'primehalo/primepostrevisions',
			'lang_set' => 'common',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* For posts in the topic, find and store the post_id for each one that has revisions
	*
	* @param	\phpbb\event\data	$event	The event object from core.viewtopic_modify_post_data
	* @return	void
	* @access	public
	*/
	public function get_posts_with_revisions($event)
	{
		$this->posts_with_revisions = [];

		if (!empty($event['post_list']))
		{
			$sql	= "SELECT post_id FROM {$this->revisions_table} WHERE " . $this->db->sql_in_set('post_id', $event['post_list']) . ' GROUP BY post_id';
			$result	= $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$this->posts_with_revisions[] = $row['post_id'];
			}
			$this->db->sql_freeresult($result);
		}
	}

	/**
	* Create the URL for viewing the post's revisions and add it as a template variable
	* so the button can use it.
	*
	* @param	\phpbb\event\data	$event	The event object from core.viewtopic_modify_post_row
	* @return	void
	* @access	public
	*/
	public function build_revisions_url($event)
	{
		$row		= $event['row'];
		$post_row	= $event['post_row'];
		$forum_id	= $row['forum_id'];
		$is_auth	= $this->core->is_auth('view', $forum_id,  $event['poster_id']);

		if ($is_auth && in_array($row['post_id'], $this->posts_with_revisions))
		{
			$post_row['U_PRIMEPOSTREVISIONS'] = $this->helper->route('primehalo_primepostrevisions_view', ['post_id' => $row['post_id']]);
		}
		$event['post_row'] = $post_row;
	}


	/**
	* Save the current iteration of the post before the user's edit is saved to the database.
	*
	* @param	\phpbb\event\data	$event	The event object from core.posting_modify_submit_post_before
	* @return	void
	* @access	public
	*/
	public function store_post_revision_info($event)
	{
		$this->revision_saved = false;

		// Determine if we should store a revision
		$unchanged		= empty($event['update_message']) && empty($event['update_subject']);
		$can_delete		= $this->core->is_auth('delete', $event['forum_id'], $event['post_data']['poster_id']);
		$no_post_rev	= $this->request->variable('no_post_rev', false);
		$disabled		= empty($this->config['primepostrev_enable_general']) || empty($event['post_data']['primepostrev_enable']) || ($can_delete && $no_post_rev);
		if ($event['mode'] !== 'edit' || $unchanged || $disabled)
		{
			return;
		}

		$this->revision_saved = $this->core->save_revision($event['post_id']);
	}


	/**
	* Update the prime post edit data as the post is being saved to the database.
	*
	* @param	\phpbb\event\data	$event	The event object from core.submit_post_modify_sql_data
	* @return	void
	* @access	public
	*/
	public function update_edit_data($event)
	{
		if (!$this->revision_saved || !in_array($event['post_mode'], ['edit', 'edit_first_post', 'edit_last_post', 'edit_topic']))
		{
			return;
		}

		$sql_data	= $event['sql_data'];
		$data		= $event['data'];
		$cur_time	= !empty($data['post_edit_time']) ? $data['post_edit_time'] : time();
		$sql_data[POSTS_TABLE]['sql'] = empty($sql_data[POSTS_TABLE]['sql']) ? [] : $sql_data[POSTS_TABLE]['sql'];
		$sql_data[POSTS_TABLE]['sql'] = array_merge($sql_data[POSTS_TABLE]['sql'], [
			'primepost_edit_time' => $cur_time,
			'primepost_edit_user' => (int) $data['post_edit_user']
		]);
		$sql_data[POSTS_TABLE]['stat'][] = 'primepost_edit_count = primepost_edit_count + 1';

		$event['sql_data'] = $sql_data;
	}


	/**
	* Template Var to allow user to not save the revision to the database.
	*
	* @param	\phpbb\event\data	$event	The event object from core.posting_modify_template_vars
	* @return	void
	* @access	public
	*/
	public function add_template_var($event)
	{
		// Determine if we should allow user to not save the revision
		$page_data = $event['page_data'];
		$new_post = in_array($event['mode'], ['post', 'reply', 'quote']);
		$page_data['NO_POST_REV'] = !$new_post && $this->core->is_auth('delete', $event['forum_id'], $event['post_data']['poster_id']);
		$event['page_data'] = $page_data;
	}


	/**
	* Delete all revisions for the posts that are being deleted.
	*
	* @param	\phpbb\event\data	$event	The event object from core.delete_posts_in_transaction_before
	* @return	void
	* @access	public
	*/
	public function delete_revisions_for_posts($event)
	{
		$table_ary = $event['table_ary'];
		$table_ary[] = $this->revisions_table;
		$event['table_ary'] = $table_ary;
	}


	/**
	* Get and store our form variables
	*
	* @param	\phpbb\event\data	$event	The event object from core.acp_manage_forums_request_data
	* @return	void
	* @access	public
	*/
	public function acp_manage_forums_request_data($event)
	{
		$forum_data = $event['forum_data'];
		$forum_data['primepostrev_enable'] = $this->request->variable('primepostrev_enable', false);
		$forum_data['primepostrev_autoprune'] = $this->request->variable('primepostrev_autoprune', 0);
		$event['forum_data'] = $forum_data;
	}


	/**
	* Add our form variables to the template
	*
	* @param	\phpbb\event\data	$event	The event object from core.acp_manage_forums_display_form
	* @return	void
	* @access	public
	*/
	public function acp_manage_forums_display_form($event)
	{
		$forum_data		= $event['forum_data'];
		$template_data	= $event['template_data'];
		$template_data['S_PRIMEPOSTREV_ENABLE']		= !empty($forum_data['primepostrev_enable']);
		$template_data['PRIMEPOSTREV_AUTOPRUNE']	= !empty($forum_data['primepostrev_autoprune']) ? $forum_data['primepostrev_autoprune'] : 0;
		$event['template_data'] = $template_data;
	}

}
