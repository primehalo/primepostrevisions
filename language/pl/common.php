<?php
/**
*
* prime_post_revisions [Polish]
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
  // Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Zobacz historię postu.',	// Text for the link to view the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Przeglądanie historii postu',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Ta strona pokazuje wszystkie wersje postu, rozpoczynając od najbardziej aktualnej.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Przeglądanie historii postu',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Oryginalny post',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Aktualny post',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Zmiana %d',
	#'PRIMEPOSTREVISIONS_INFO'				=> 'Zmieniony przez %1$s %2$s.',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Zmieniony przez',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[bez tematu]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing two post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between two versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected two revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Usuń zmianę',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Jesteś pewny(a), że chcesz usunąć tą zmianę?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Nie masz niezbędnych uprawnień, by usunąć tą zmianę.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Wystąpił błąd podczas próby usunięcia tej zmiany.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Zmiana została pomyślnie usunięta.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Nie została wybrana żadna zmiana do usunięcia.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Usuń wybrane zmiany',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Jesteś pewny(a), że chcesz usunąć te zmiany?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Nie masz niezbędnych uprawnień, by usunąć te zmiany.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Wystąpił błąd podczas próby usunięcia tych zmian.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Zmiany zostały pomyślnie usunięte.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Nie została wybrana żadna zmiana do usunięcia.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'	=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'	=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
));
