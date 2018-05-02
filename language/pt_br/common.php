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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Observar histórico da mensagem.',	// Texto para o link de observar o histórico de revisões

	// Observando revisões
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Observando histórico da mensagem.',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Esta página mostra todas as versões da mensagem, começando da mais atual.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Observando histórico da mensagem',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Mensagem original',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Mensagem atual',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'revisão %d',
	#'PRIMEPOSTREVISIONS_INFO'				=> 'Editado por %1$s em %2$s.',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Editado por',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[sem assunto]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'Você não tem as permissões necessárias para visualizar as revisões de mensagem.',

	// Apagar uma revisão
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Excluir Revisão',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Quer realmente apagar esta revisão?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Você não tem as permissões necessárias para remover esta revisão.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Ocorreu um erro ao tentar apagar a revisão.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Revisão removida com sucesso.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Nenhuma revisão selecionada para remoção.',

	// Apagar todas revisões
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
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'A mensagem foi restaurada com sucesso.',
));
