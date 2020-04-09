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
	'ACP_PRIMEPOSTREVISIONS_ENABLE'				=> 'Armazenar revisões de post',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'		=> 'Mantenha um histórico de revisão de todas as edições de posts.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'			=> 'Auto-limpeza revisões',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'	=> 'Excluir automaticamente as revisões de posts anteriores ao número de dias especificado. Defina como 0 para desativar.',

	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'			=> '<strong>Auto-limpou revisões de post</strong><br />» Revisões excluidas: %d » %s',
));
