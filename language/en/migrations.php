<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 Ken F. Innes IV <https://www.absoluteanime.com>
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

// Messages shown while enabling the extension or deleting its data. Languages without this
// file fall back to the English one.

$lang = array_merge($lang, [
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Your database can’t add or remove this extension’s posts table columns instantly, so it would have to rebuild the whole posts table. On a board with this many posts that takes longer than a single page request is allowed to run.<br><br>Please run the following SQL yourself, ideally from the MySQL command line since it has no time limit. It may take a while, and new posts may be blocked until it finishes:<br><br><code>%s</code><br><br>Then try again.',
]);
