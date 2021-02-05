<?php
/**
*
* prime_post_revisions [Italian]
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* @translation by artikkk
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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Guarda storia messaggio.',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Do not save post history',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Sta guardando la storia del messaggio',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Questa pagina mostra tutte le versioni del messaggio, dal post originale a quello finale.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Sta guardando la storia del messaggio',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Messaggio originale',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Messaggio attuale',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Revisione %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Modificato da',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[nessun soggetto]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Cancella revisione',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Sei sicuro di voler cancellare questa revisione?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Non hai i permessi necessari per eliminare questa revisione.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Si e\' verificato un errore mentre si cercava di eliminare la revisione.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Revisione rimossa con successo.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Nessuna revisione del messaggio e\' stata seleziona per la rimozione.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Cancella le revisioni selezionate',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Sei sicuro di voler cancellare queste revisioni?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Non hai i permessi necessari per eliminare queste revisioni.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Si e\' verificato un errore mentre si cercava di eliminare queste revisioni.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Revisioni rimosse con successo.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Nessuna revisione del messaggio e\' stata seleziona per la rimozione.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
]);
