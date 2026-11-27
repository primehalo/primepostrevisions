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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'Twoja baza danych nie może natychmiast dodać ani usunąć kolumn tego rozszerzenia w tabeli postów, więc musiałaby przebudować całą tabelę postów. Na forum z tak dużą liczbą postów trwa to dłużej, niż pozwala się działać pojedynczemu żądaniu strony.<br><br>Wykonaj samodzielnie poniższe polecenie SQL, najlepiej z wiersza poleceń MySQL, ponieważ nie ma on limitu czasu. Może to chwilę potrwać, a do jego zakończenia dodawanie nowych postów może być zablokowane:<br><br><code>%s</code><br><br>Następnie spróbuj ponownie.',
]);
