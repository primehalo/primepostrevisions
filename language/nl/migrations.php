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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Je database kan de kolommen van deze extensie in de berichtentabel niet direct toevoegen of verwijderen, en zou daarom de volledige berichtentabel opnieuw moeten opbouwen. Op een forum met zoveel berichten duurt dat langer dan één paginaverzoek mag duren.<br><br>Voer de volgende SQL zelf uit, bij voorkeur via de MySQL-opdrachtregel omdat die geen tijdslimiet heeft. Dit kan even duren en nieuwe berichten kunnen geblokkeerd zijn totdat het klaar is:<br><br><code>%s</code><br><br>Probeer het daarna opnieuw.',
]);
