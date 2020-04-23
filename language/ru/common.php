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
	// Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Просмотр истории сообщения.',	// Text for the link to view the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Просмотр истории сообщения',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'На этой странице показаны все версии сообщения, начиная с текущей.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Просмотр истории сообщения',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Первоначальный текст',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Текущий текст',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Версия %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Отредактировано',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[нет заголовка]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',
	'PRIMEPOSTREVISIONS_COMPARES_SELECT'	=> 'Select for comparison',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Удалить версию',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Вы уверены что хотите удалить эту версию?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'У вас отсутствуют права доступа для удаления этой версии сообщения.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Произошла ошибка при попытке удаления версии сообщения.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Версия сообщения успешно удалена.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Не выбрана версия сообщения для удаления.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Удалить выбранные версии',
	'PRIMEPOSTREVISIONS_DELETES_SELECT'		=> 'Select for deletion',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Вы уверены что хотите удалить все версии сообщения?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'У вас отсутствуют права доступа для удаления версий сообщения.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Произошла ошибка при попытке удаления версий сообщения.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Все версии сообщения успешно удалены.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Не выбраны версии сообщения для удаления.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
));
