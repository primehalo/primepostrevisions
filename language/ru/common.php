<?php
/**
*
* prime_post_revisions [Russian]
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* @translated by Sergey aka Porutchik http://forum.aeroion.ru
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
	// Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'История сообщения',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Не сохранять правку в истории',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Просмотр истории сообщения',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'На этой странице показаны все версии сообщения, начиная с текущей.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Просмотр истории сообщения',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Первоначальный текст',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Текущий текст',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Версия %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Отредактировано',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[нет заголовка]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Сравнить',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'У вас отсутствуют права доступа для просмотра этих версий сообщения.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Сравнение',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Замечание: Текущая версия сообщения не может быть удалена здесь.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Сравнение истории правок',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'На этой странице показано сравнение версий сообшения.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Сравнить выбранные версии',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Удалить',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Вы уверены что хотите удалить эту версию?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'У вас отсутствуют права доступа для удаления этой версии сообщения.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Произошла ошибка при попытке удаления версии сообщения.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Версия сообщения успешно удалена.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Не выбрана версия сообщения для удаления.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Удалить выбранные версии',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Вы уверены что хотите удалить все версии сообщения?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'У вас отсутствуют права доступа для удаления версий сообщения.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Произошла ошибка при попытке удаления версий сообщения.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Все версии сообщения успешно удалены.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Не выбраны версии сообщения для удаления.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Восстановить',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Вы уверены что хотите восстановить эту версию?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'У вас отсутствуют права доступа для восстановления этой версий.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Произошла ошибка при попытке восстановления версии сообщения.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'Версия сообщения успешно восстановлена.',
]);
