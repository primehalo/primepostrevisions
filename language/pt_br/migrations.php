<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 Ken F. Innes IV <https://www.absoluteanime.com>
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

// Messages shown while enabling the extension or deleting its data. Languages without this
// file fall back to the English one.

$lang = array_merge($lang, [
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Seu banco de dados não consegue adicionar ou remover instantaneamente as colunas desta extensão na tabela de mensagens, então teria que reconstruir toda a tabela de mensagens. Em um fórum com tantas mensagens, isso leva mais tempo do que uma única requisição de página pode ser executada.<br><br>Execute você mesmo o SQL a seguir, de preferência pela linha de comando do MySQL, já que ela não tem limite de tempo. Isso pode demorar um pouco, e novas mensagens podem ficar bloqueadas até terminar:<br><br><code>%s</code><br><br>Depois, tente novamente.',
]);
