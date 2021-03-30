<?php
/**
 *
 * Prime Post Revisions extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, Ken F. Innes IV, https://www.absoluteanime.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace primehalo\primepostrevisions\acp;

/**
 * Prime Links ACP module.
 */
class main_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;

		$db				= $phpbb_container->get('dbal.conn');
		$template		= $phpbb_container->get('template');
		$config			= $phpbb_container->get('config');
		$request		= $phpbb_container->get('request');
		$user			= $phpbb_container->get('user');
		$forum_map_ppr	= $phpbb_container->get('primehalo.primepostrevisions.forum_map_ppr');

		$forum_tpl_rows = $forum_map_ppr->main();
		foreach ($forum_tpl_rows as $tpl_row)
		{
			$template->assign_block_vars('forumrow', $tpl_row);
		}

		$this->tpl_name = 'acp_primepostrevisions_body';
		$this->page_title = $user->lang('ACP_PRIMEPOSTREVISIONS_TITLE');
		add_form_key('primepostrevisions_settings');

		// The form was submitted
		if ($request->is_set_post('submit'))
		{
			// Ensure the form submission is valid
			if (!check_form_key('primepostrevisions_settings'))
			{
				 trigger_error('FORM_INVALID');
			}

			// Get and save the basic settings
			$config->set('primepostrev_enable_general', $request->variable('primepostrev_enable_general', true));
			$config->set('primepostrev_enable_autoprune', $request->variable('primepostrev_enable_autoprune', true));

			// Get the individual forums settings
			$primepostrev_enable_array = $request->variable('primepostrev_enable', [0 => 0]);
			$primepostrev_autoprune_array = $request->variable('primepostrev_autoprune', [0 => 0]);

			// Build the array for updating the forums
			$forums_ary = [];
			foreach ($primepostrev_enable_array as $forum_id => $value)
			{
				$forums_ary[$forum_id]['primepostrev_enable'] = (bool) $value;
			}
			foreach ($primepostrev_autoprune_array as $forum_id => $value)
			{
				$forums_ary[$forum_id]['primepostrev_autoprune'] = (int) $value;
			}

			// Split array into 50 size chunks
			$forums_ary = array_chunk($forums_ary, 50, true);

			// Execute the SQL to update the forum settings
			foreach ($forums_ary as $forums_chunk)
			{
				$db->sql_transaction('begin');
				foreach ($forums_chunk as $forum_id => $sql_ary)
				{
					$sql = 'UPDATE ' . FORUMS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . ' WHERE forum_id = ' . (int) $forum_id;
					$db->sql_query($sql);
				}
				$db->sql_transaction('commit');
			}

			// Log action
			$log = $phpbb_container->get('log');
			$log->add('admin', $user->data['user_id'], $user->ip, 'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG');

			trigger_error($user->lang('ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars([
			'PRIMEPOSTREVISIONS_ENABLE_GENERAL' 	=> $config['primepostrev_enable_general'],
			'PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'	=> $config['primepostrev_enable_autoprune'],
			'U_ACTION'								=> $this->u_action,
		]);
	}
}
