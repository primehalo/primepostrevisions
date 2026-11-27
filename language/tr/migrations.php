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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Veritabanınız bu eklentinin mesajlar tablosundaki sütunlarını anında ekleyemiyor veya kaldıramıyor; bu nedenle tüm mesajlar tablosunu yeniden oluşturması gerekiyor. Bu kadar çok mesajı olan bir forumda bu işlem, tek bir sayfa isteğinin çalışmasına izin verilen süreden daha uzun sürer.<br><br>Lütfen aşağıdaki SQL komutunu kendiniz çalıştırın; zaman sınırı olmadığı için tercihen MySQL komut satırından çalıştırın. Bu biraz zaman alabilir ve tamamlanana kadar yeni mesajlar engellenebilir:<br><br><code>%s</code><br><br>Ardından tekrar deneyin.',
]);
