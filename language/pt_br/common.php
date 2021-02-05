<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
* Brazilian Portuguese translation by eunaumtenhoid [2019][ver 1.0.0-beta5] (https://github.com/phpBBTraducoes)
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
// ’ « » “ ” …
//

$lang = array_merge($lang, [
	// Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Visualizar histórico do post.',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Do not save post history',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Visualizando histórico do post.',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Esta página mostra todas as versões do post, começando da mais atual.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Visualizando histórico do post',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Post original',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Post atual',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'revisão %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Editado por',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[sem assunto]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'Você não tem as permissões necessárias para visualizar as revisões do post.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Excluir Revisão',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Quer realmente apagar esta revisão?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Você não tem as permissões necessárias para remover esta revisão.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Ocorreu um erro ao tentar apagar a revisão.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Revisão removida com sucesso.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Nenhuma revisão selecionada para remoção.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Excluir revisões selecionadas',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Quer realmente apagar estas revisões?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Você não tem as permissões necessárias para remover estas revisões.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Ocorreu um erro ao tentar apagar estas revisões.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Revisões removidas com sucesso.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Nenhuma revisão selecionada para remoção.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restaurar revisão',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Quer realmente restaurar esta revisão?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'Você não tem as permissões necessárias para restaurar esta revisão.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Ocorreu um erro ao tentar restaurar a revisão.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'O post foi restaurado com sucesso.',
]);
