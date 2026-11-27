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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Ваша база данных не может мгновенно добавить или удалить столбцы этого расширения в таблице сообщений, поэтому ей пришлось бы перестроить всю таблицу сообщений. На форуме с таким количеством сообщений это занимает больше времени, чем разрешено выполняться одному запросу страницы.<br><br>Пожалуйста, выполните следующий SQL-запрос самостоятельно, лучше всего из командной строки MySQL, так как там нет ограничения по времени. Это может занять некоторое время, и до завершения публикация новых сообщений может быть заблокирована:<br><br><code>%s</code><br><br>Затем повторите попытку.',
]);
