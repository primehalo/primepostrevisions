<?php
/**
*
* prime_post_revisions [French]
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
	'ACP_PRIMEPOSTREVISIONS_TITLE'						=> 'Révisions de message',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'Paramètres de l‘extension',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'Réglages généraux',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'Activer les révisions de publication',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'Permet de stocker les révisions de publication. Le stockage des révisions doit être défini par forum. La désactivation ne supprimera pas les révisions de publication existantes, cela empêchera uniquement le stockage de nouvelles révisions.',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'Activer la suppression automatique',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'Permet de supprimer automatiquement les révisions. La fréquence de suppression doit être définie par forum.',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'Paramètres du forum',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'Conservez un historique des révisions de toutes les modifications apportées aux publications. La suppression automatique supprimera automatiquement les révisions antérieures au nombre de jours indiqué. Mettre à 0 pour désactiver.',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'Suppression automatique',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'Nom du forum',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'Activer',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> 'Les paramètres révisions de message ont été enregistrés avec succès!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>Paramètres révisions de message modifiés</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'Stocker les révisions des messages',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'Conserver un historique des révisions de toutes les modifications apportées aux publications.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'Suppression automatique des revisions',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'Supprimez automatiquement les révisions de publication antérieures au nombre de jours donné. Mettre à 0 pour désactiver.',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>Suppression automatique des révisions de message</strong><br />» Révisions supprimées : %d » %s',
]);
