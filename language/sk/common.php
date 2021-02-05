<?php
/**
*
* prime_post_revisions [Slovak]
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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Zobraziť historiu príspevku.',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Do not save post history',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Zobrazenie post histórie',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Táto stránka zobrazuje všetky verzie prispevku, počínajúc najaktuálnejšie verzia.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Zobrazenie historie prispevku',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Original prispevok',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Aktuálny prispevok',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Uprava %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Upravil',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[no subject]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Odstrániť Upravu',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Ste si istí, že chcete zmazať túto upravu?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Nemate potrebné povolenia na odstránenie tejto upravy.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Došlo k chybe pri pokuse o vymazanie upravy.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Uprava bola úspešne odstránená.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Žiadne upravy neboli vybrané na odstránenie.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Odstrániť vybraté úpravy',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Ste si istí, že chcete zmazať tieto upravy?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Nemate potrebné povolenia na odstránenie tejto upravy.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Došlo k chybe pri pokuse o vymazanie upravy.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Uprava bola úspešne odstránená.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Žiadne upravy neboli vybrané na odstránenie.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
]);
