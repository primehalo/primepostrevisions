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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Deine Datenbank kann die Spalten dieser Erweiterung in der Beitragstabelle nicht sofort hinzufügen oder entfernen und müsste daher die gesamte Beitragstabelle neu aufbauen. Bei einem Board mit so vielen Beiträgen dauert das länger, als ein einzelner Seitenaufruf laufen darf.<br><br>Bitte führe den folgenden SQL-Befehl selbst aus, am besten über die MySQL-Kommandozeile, da diese kein Zeitlimit hat. Das kann eine Weile dauern, und bis dahin können eventuell keine neuen Beiträge erstellt werden:<br><br><code>%s</code><br><br>Versuche es danach erneut.',
]);
