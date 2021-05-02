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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Zobacz historię postu.',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Nie zapisuj historii postu',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Przeglądanie historii postu',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Ta strona pokazuje wszystkie wersje postu, rozpoczynając od najbardziej aktualnej.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Przeglądanie historii postu',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Oryginalny post',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Aktualny post',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Wersja %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Zmieniony przez',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[bez tematu]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Porównaj',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'Nie masz wymaganych uprawnień do przeglądania wersji tego postu.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Porównanie',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Uwaga: Nie można usunąć bieżącej wersji postu w tym miejscu. Wszelkie próby będą ignorowane.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Porównanie historii postu',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'Ta strona pokazuje porównanie pomiędzy wersjami postu.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Porównaj wybrane wersje',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Usuń wersję',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Jesteś pewny(a), że chcesz usunąć tę wersję?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Nie masz wymaganych uprawnień aby usunąć tę wersję.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Wystąpił błąd podczas próby usunięcia tej wersji.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Wersja została pomyślnie usunięta.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Nie została wybrana żadna wersja do usunięcia.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Usuń wybrane wersje',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Jesteś pewny(a), że chcesz usunąć te zmiany?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Nie masz wymaganych uprawnień do usunięcia tych wersji.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Wystąpił błąd podczas próby usunięcia tych wersji.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Wersje zostały pomyślnie usunięte.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Nie wybrano żadnej wersji do usunięcia.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Przywróć Wersję',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Jesteś pewny(a), że chcesz przywrócić tę wersję?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'Nie masz wymaganych uprawnień do przywrócenia tej wersji.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Wystąpił błąd podczas próby przywrócenia wersji.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'Wersja postu została pomyślnie przywrócona.',
]);
