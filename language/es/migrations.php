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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Su base de datos no puede añadir ni eliminar al instante las columnas de esta extensión en la tabla de mensajes, por lo que tendría que reconstruir toda la tabla de mensajes. En un foro con tantos mensajes, eso tarda más de lo que se permite a una sola petición de página.<br><br>Ejecute usted mismo la siguiente sentencia SQL, preferiblemente desde la línea de comandos de MySQL, ya que no tiene límite de tiempo. Puede tardar un rato y es posible que no se puedan publicar mensajes nuevos hasta que termine:<br><br><code>%s</code><br><br>Después, inténtelo de nuevo.',
]);
