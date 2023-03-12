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
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'Uzantı Ayarları',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'Genel Ayarlar',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'Gönderi Revizyonunu Etkinleştir',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'Gönderi revizyonlarını saklama yeteneğini etkinleştirir. Revizyonların saklanması forum bazında ayarlanmalıdır. Bunu devre dışı bırakmak mevcut revizyonları silmez, yalnızca yeni revizyonların saklanmasını engeller.',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'Otomatik Budamayı Etkinleştir',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'Revizyon otomatik budama özelliğini etkinleştirir. Budama sıklığı forum bazında ayarlanmalıdır.',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'Forum Ayarları',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'Tüm gönderi düzenlemelerinin revizyon geçmişini tutun. Otomatik budama, verilen gün sayısından daha eski revizyonları otomatik olarak siler. Devre dışı bırakmak için 0 olarak ayarlayın.',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'Otomatik Budama',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'Forum İsmi',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'Etkin',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> 'Prime Post Revisions ayarları başarıyla kaydedildi!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>Prime Post Revisions ayarları değiştirildi</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'Gönderi revizyonlarını sakla',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'Tüm gönderi düzenlemelerinin revizyon geçmişini tutun.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'Revizyonları otomatik buda',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'Belirtilen gün sayısından daha eski gönderi revizyonlarını otomatik olarak silin. Devre dışı bırakmak için 0 olarak ayarlayın.',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>Gönderi revizyonları otomatik budandı</strong><br />» Revizyonlar silindi: %d » %s',
]);
