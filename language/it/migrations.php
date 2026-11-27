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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Il tuo database non può aggiungere o rimuovere istantaneamente le colonne di questa estensione nella tabella dei messaggi, quindi dovrebbe ricostruire l’intera tabella dei messaggi. Su una board con così tanti messaggi, ciò richiede più tempo di quanto sia consentito a una singola richiesta di pagina.<br><br>Esegui tu stesso la seguente istruzione SQL, preferibilmente dalla riga di comando di MySQL, poiché non ha limiti di tempo. Potrebbe richiedere un po’ di tempo e la pubblicazione di nuovi messaggi potrebbe essere bloccata fino al termine:<br><br><code>%s</code><br><br>Quindi riprova.',
]);
