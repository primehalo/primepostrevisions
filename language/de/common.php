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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Zeige Beitragsversionen',	// Text for the link to view the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Betrachtet Beitragsversionen',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Diese Seite zeigt alle Versionen des Beitrags, beginnend mit der aktuellsten Version.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Überblick der Beitragsversionen',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Ursprünglicher Beitrag',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Aktueller Beitrag',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Version %d',
	#'PRIMEPOSTREVISIONS_INFO'				=> 'Editiert von',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Editiert von %1$s am %2$s.',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[kein Titel]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Lösche Version',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Bist du sicher, dass du diese Beitragsversion löschen willst?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Du besitzt nicht die erforderlichen Rechte zur Löschung dieser Beitragsversion.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Ein Fehler ist beim Versuch, die Beitragsversion zu löschen, aufgetreten.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Die Beitragsversion wurde erfolgreich gelöscht.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Es wurde keine Beitragsversion für die Löschung ausgewählt.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Löschen Sie ausgewählte Versionen',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Bist du sicher, dass du diese Beitragsversionen löschen willst?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Du besitzt nicht die erforderlichen Rechte zur Löschung dieser Beitragsversionen.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Ein Fehler ist beim Versuch, diese Beitragsversionen zu löschen, aufgetreten.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Die Beitragsversionen wurden erfolgreich gelöscht.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Es wurden keine Beitragsversionen für die Löschung ausgewählt.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
));
