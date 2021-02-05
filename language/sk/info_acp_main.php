<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, [
	'ACP_PRIMEPOSTREVISIONS_TITLE'						=> 'Prime Post Revisions',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'Extension Settings',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'General Settings',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'Enable Post Revisions',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'Enables the ability to store post revisions. Storing revisions must be set on a per-forum basis. Disabling this will not delete existing post revisions, it only prevents new revisions from being stored.',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'Enable Auto-prune',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'Enables the ability to auto-prune revisions. Pruning frequency must be set on a per-forum basis.',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'Forum Settings',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'Keep a revision history of all posts edits. Auto-prune will automatically delete revisions older than the given number of days. Set to 0 to disable.',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'Auto-prune',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'Forum Name',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'Enable',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> 'Prime Post Revisions settings have been saved successfully!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>Altered Prime Post Revisions settings</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'Store post revisions',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'Keep a revision history of all posts edits.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'Auto-prune revisions',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'Automatically delete post revisions older than the given number of days. Set to 0 to disable.',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>Auto-pruned post revisions</strong><br />» Revisions deleted: %d » %s',
]);
