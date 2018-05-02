<?php
/**
*
* prime_post_revisions [Português do Brasil]
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

// ATENÇÃO DESENVOLVEDORES
//
// Todos os arquivos devem usar linguagem UTF-8 como a sua codificação e os arquivos não devem conter um BOM.
//
// Espaços, podem conter agora, informação de ordem, por exemplo, ao invés vez de
//"Página %s de %s' você poderá (e deveria) escrever 'Page %1$s of %2$s', isso permite
// a tradutores re-ordenar a saída de dados, enquanto garante que continue correta
//
// Você não precisa disso onde espaços únicos são usados, por exemplo, 'Message %d' está bom
// igualmente, onde uma string contem apenas dois espaços que são usados para ajustar o texto
// numa url você também não precisa especificar uma ordem, por exemplo, 'Click %sHERE%s' está bom
//
// Alguns carácteres que você pode querer copiar&colar:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	// Observando a mensagem
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Observar hist&oacute;rico da mensagem..',	// Texto para o link de observar o histórico de revisões

	// Observando revisões
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Observando hist&oacute;rico da mensagem.',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Esta p&aacute;gina mostra todas as vers&otilde;es da mensagem, come&ccedil;ando da mais atual.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Observando hist&oacute;rico da mensagem',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Mensagem original',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Mensagem atual',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'revis&atilde;o %d',
	#'PRIMEPOSTREVISIONS_INFO'				=> 'Editado por %1$s on %2$s.',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Editado por',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[sem assunto]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',

	// Apagar uma revisão
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Apagar Revis&atilde;o',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Quer realmente apagar esta revis&atilde;o?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Voc&ecirc; n&atilde;o tem as permiss&otilde;es necess&aacute;rias para eliminar esta revis&atilde;o.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Ocorreu um erro ao tentar apagar a revisão.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Revis&atilde;o removida com sucesso.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Nenhuma revis&atilde;o selecionada para remo&ccedil;&atilde;o.',

	// Apagar todas revisões
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Excluir revisões selecionadas',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Quer realmente apagar estas revis&otilde;es?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Voc&ecirc; n&atilde;o tem as permiss&otilde;es necess&aacute;rias para remover estas revis&otilde;es.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Ocorreu um erro ao tentar apagar estas revis&otilde;es.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Revis&otilde;es removidas com sucesso.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Nenhuma revis&atilde;o selecionada para remo&ccedil;&atilde;o.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
));
