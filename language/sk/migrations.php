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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Vaša databáza nedokáže okamžite pridať ani odstrániť stĺpce tohto rozšírenia v tabuľke príspevkov, takže by musela prestavať celú tabuľku príspevkov. Na fóre s takým množstvom príspevkov to trvá dlhšie, než môže bežať jedna požiadavka na stránku.<br><br>Spustite prosím nasledujúci príkaz SQL sami, najlepšie z príkazového riadku MySQL, pretože nemá časový limit. Môže to chvíľu trvať a kým sa to nedokončí, nové príspevky môžu byť zablokované:<br><br><code>%s</code><br><br>Potom to skúste znova.',
]);
