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

		$db			= $phpbb_container->get('dbal.conn');
		$template	= $phpbb_container->get('template');
		$config		= $phpbb_container->get('config');
		$request	= $phpbb_container->get('request');
		$user		= $phpbb_container->get('user');

		$sql = 'SELECT forum_id, parent_id, forum_name, primepostrev_enable, primepostrev_autoprune FROM ' . FORUMS_TABLE . ' WHERE forum_type = ' . FORUM_POST;
		$result	= $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$template->assign_block_vars('forums', array(
				'FORUM_NAME'				=> $row['forum_name'],
				'FORUM_ID'					=> $row['forum_id'],
				'S_PRIMEPOSTREV_ENABLE'		=> $row['primepostrev_enable'],
				'PRIMEPOSTREV_AUTOPRUNE'	=> $row['primepostrev_autoprune'],
				'U_EDIT'					=> append_sid("?i=acp_forums&amp;mode=manage&amp;parent_id={$row['parent_id']}&amp;f={$row['forum_id']}&amp;action=edit"),
			));
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
			$primepostrev_enable_array = $request->variable('primepostrev_enable', array(0 => 0));
			$primepostrev_autoprune_array = $request->variable('primepostrev_autoprune', array(0 => 0));

			// Build the array for updating the forums
			$forums_sql_array = array();
			foreach ($primepostrev_enable_array as $forum_id => $value) {
				$forums_sql_array[$forum_id]['primepostrev_enable'] = (bool)$value;
			}
			foreach ($primepostrev_autoprune_array as $forum_id => $value) {
				$forums_sql_array[$forum_id]['primepostrev_autoprune'] = (int)$value;
			}

			// Execute the SQL to update the forum settings
			$db->sql_transaction('begin');
			foreach ($forums_sql_array as $forum_id => $sql_array) {
				$sql = 'UPDATE ' . FORUMS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_array) . ' WHERE forum_id = ' . $forum_id;
				$db->sql_query($sql);
			}
			$db->sql_transaction('commit');

			// Log action
			$log = $phpbb_container->get('log');
			$log->add('admin', $user->data['user_id'], $user->ip, 'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG');

			trigger_error($user->lang('ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'PRIMEPOSTREVISIONS_ENABLE_GENERAL' 	=> $config['primepostrev_enable_general'],
			'PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'	=> $config['primepostrev_enable_autoprune'],
			'U_ACTION'								=> $this->u_action,
		));
	}
}
