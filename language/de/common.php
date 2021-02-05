<?php
/**
*
* prime_post_revisions [German]
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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Zeige Beitragsversionen',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Do not save post history',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Betrachte Beitragsversionen',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Diese Seite zeigt alle Versionen des Beitrags, beginnend mit der aktuellsten Version.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Überblick der Beitragsversionen',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Ursprünglicher Beitrag',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Aktueller Beitrag',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Version %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Editiert von',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[Kein Titel]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Vergleichen',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'Du besitzt nicht die erforderlichen Rechte zum Anschauen dieser Beitragsversionen.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Lösche die ausgewählte Version',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Bist du sicher, dass Du diese Beitragsversion löschen willst?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Du besitzt nicht die erforderlichen Rechte zur Löschung dieser Beitragsversion.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Beim Versuch die Beitragsversion zu löschen ist ein Fehler aufgetreten.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Die Beitragsversion wurde erfolgreich gelöscht.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Es wurde keine Beitragsversion für die Löschung ausgewählt.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Lösche die ausgewählten Versionen',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Bist Du sicher, dass Du diese Beitragsversionen löschen willst?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Du besitzt nicht die erforderlichen Rechte zur Löschung dieser Beitragsversionen.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Beim Versuch die Beitragsversionen zu löschen ist ein Fehler aufgetreten.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Die Beitragsversionen wurden erfolgreich gelöscht.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Es wurden keine Beitragsversionen für die Löschung ausgewählt.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Beitragsversion wiederherstellen',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Bist Du sicher, dass Du diese Beitragsversion wiederherstellen willst?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'Du besitzt nicht die erforderlichen Rechte zur Wiederherstellung dieser Beitragsversion.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Beim Versuch die Beitragsversion wiederherzustellen ist ein Fehler aufgetreten.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'Die Beitragversion wurde erfolgreich wiederhergestellt.',
]);
