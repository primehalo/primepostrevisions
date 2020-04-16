<?php
/**
*
* prime_post_revisions [Spanish]
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
* @translation by Jorup16 - www.FIFA-Guate.com
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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Ver el historial del mensaje',	// Texto del enlace para ver la historia del mensaje.

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Viendo el historial del mensaje ',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Esta página muestra todas las versiones de este mensaje, empezando con la versión mas reciente.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Viendo el historial del mensaje',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Mensaje original',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Mensaje actual',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Revisión %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Editado por',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[sin asunto]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Eliminar revisión',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> '&iquest;Está seguro que deseas eliminar esta revisión?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'No tiene los permisos necesarios para eliminar esta revisión.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Se produjo un error al intentar eliminar la revisión.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'La revisión ha sido eliminada exitosamente.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Ninguna revisión ha sido seleccionada para ser removida.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Eliminar las revisiones seleccionadas',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> '&iquest;Está seguro que desea eliminar estas revisiones?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'No tiene los permisos necesarios para eliminar estas revisiones.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Se produjo un error al intentar eliminar la revisión.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Las revisiones se han eliminado exitosamente.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Ninguna revisión ha sido seleccionada para ser removida.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
));
