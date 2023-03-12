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
	'ACL_M_PRIMEPOSTREV_VIEW'		=> 'Gönderi revizyonlarını görüntüleyebilir',
	'ACL_M_PRIMEPOSTREV_DELETE'		=> 'Gönderi revizyonlarını silebilir',
	'ACL_M_PRIMEPOSTREV_RESTORE'	=> 'Gönderi revizyonlarını geri yükleyebilir',
	'ACL_F_PRIMEPOSTREV_VIEW'		=> 'Kendi gönderilerinin revizyonlarını görüntüleyebilir',
	'ACL_F_PRIMEPOSTREV_DELETE'		=> 'Kendi gönderilerinin revizyonlarını silebilir',
	'ACL_F_PRIMEPOSTREV_RESTORE'	=> 'Kendi gönderilerinin revizyonlarını geri yükleyebilir',
]);
