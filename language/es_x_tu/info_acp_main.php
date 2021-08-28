<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
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
	'ACP_PRIMEPOSTREVISIONS_TITLE'						=> 'Prime Post Revisions',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'Ajustes de la extensión',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'Ajustes generales',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'Habilitar Revisiones de mensajes',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'Habilita la capacidad de almacenar revisiones de mensajes. El almacenamiento de revisiones debe establecerse por foro. Deshabilitar esto no eliminará las revisiones de mensajes existentes, solo evitará que se almacenen nuevas revisiones.',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'Habilitar Auto-purga',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'Habilita la capacidad de purgar automáticamente las revisiones. La frecuencia de purga debe establecerse por foro.',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'Ajustes del foro',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'Ten un historial de revisión de todas las ediciones de los mensajes. Auto-purga eliminará automáticamente las revisiones anteriores al número de días especificado. Establecer en 0 para deshabilitar.',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'Auto-purga',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'Nombre del foro',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'Habilitar',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> '¡La configuración de Prime Post Revisions se ha guardado correctamente!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>Ajustes de Prime Post Revisions alterados</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'Almacenar revisiones de mensajes',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'Mantenga un historial de revisión de todas las ediciones de los mensajes.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'Auto-purga de revisiones',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'Elimina automáticamente las revisiones de mensajes anteriores a la cantidad de días indicada. Establecer en 0 para deshabilitar.',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>Auto-purga de revisiones de mensajes</strong><br />» Revisiones borradas: %d » %s',
]);
