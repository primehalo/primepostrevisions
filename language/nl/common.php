<?php
/**
*
* prime_post_revisions [Dutch]
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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Bekijk berichten geschiedenis.',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Do not save post history',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Bekijkt berichten geschiedenis',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Op deze pagina vindt u alle versies van de post, te beginnen met de meest recente versie.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Bekijkt berichten geschiedenis',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Origineel bericht',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Huidig bericht',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Revisie %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Aangepast door',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[geen onderwerp]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Vergelijk',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'U mist de nodige rechten om deze post revisies te bekijken.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Verwijder revisie',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Weet u zeker dat u deze revisie wilt verwijderen? ',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Je hebt je beschikt niet over voldoende permissies om deze revisie te verwijderen.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Er is een fout opgetreden bij het verwijderen van de revisie.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'De revisie is met succes verwijderd!.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Geen revisie berichten geselecteerd om te verwijderen.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Verwijder geselecteerde revisie',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Weet u zeker dat u deze revisie wilt verwijderen? ',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Je hebt je beschikt niet over voldoende permissies om deze revisie te verwijderen.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Er is een fout opgetreden bij het verwijderen van de revisie.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'De revisie is met succes verwijderd!.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Geen revisie berichten geselecteerd om te verwijderen.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Revisie herstellen',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Weet je zeker dat je deze revisie wilt herstellen?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'U mist de nodige rechten om deze revisie te herstellen.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Er is een fout opgetreden bij een poging de revisie te herstellen.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'Het bericht is succesvol hersteld.',
]);
