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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Votre base de données ne peut pas ajouter ou supprimer instantanément les colonnes de cette extension dans la table des messages ; elle devrait donc reconstruire toute la table des messages. Sur un forum comptant autant de messages, cela prend plus de temps que ce qui est autorisé pour une seule requête de page.<br><br>Veuillez exécuter vous-même la requête SQL suivante, de préférence depuis la ligne de commande MySQL, car elle n’a pas de limite de temps. Cela peut prendre un certain temps et la publication de nouveaux messages peut être bloquée jusqu’à la fin :<br><br><code>%s</code><br><br>Réessayez ensuite.',
]);
