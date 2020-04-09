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
	$lang = array();
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

$lang = array_merge($lang, array(
	'ACP_PRIMEPOSTREVISIONS_ENABLE'				=> 'Store post revisions',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'		=> 'Keep a revision history of all posts edits.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'			=> 'Auto-prune revisions',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'	=> 'Automatically delete post revisions older than the given number of days. Set to 0 to disable.',

	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'			=> '<strong>Auto-pruned post revisions</strong><br />» Revisions deleted: %d » %s',
));
