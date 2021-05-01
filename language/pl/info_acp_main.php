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
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'Ustawienia rozszerzenia',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'Ustawienia ogólne',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'Włącz wersje postów',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'Włącza możliwość przechowywanie wersji postów. Przechowywanie wersji musi zostać ustawione dla każdego forum z osobna. Wyłączenie tej opcji nie spowoduje usunięcia istniejących wersji postów, a jedynie zapobiega zapisywaniu nowych wersji.',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'Włącz automatyczne usuwanie',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'Włącza możliwość automatycznego usuwania wersji. Częstotliwość usuwania należy ustawić dla każdego forum z osobna.',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'Ustawienia forum',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'Zachowaj historię wersji wszystkich zmian w postach. Funkcjonalność automatycznego czyszczenie automatycznie usunie wersje starsze niż podana liczba dni. Ustaw wartość 0 aby wyłączyć.',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'Automatyczne usuwanie',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'Nazwa forum',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'Włącz',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> 'Ustawienia Prime Post Revisions zostały zapisane pomyślnie!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>Ustawienia Prime Post Revisions zostały zmienione</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'Zachowuj wersje postów',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'Zachowaj historię wersji wszystkich zmian w postach.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'Automatyczne usuwanie wersji',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'Wersje starsze niż zdefiniowana wartość będą automatycznie usuwane. Ustaw wartość 0 aby wyłączyć.',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>Automatycznie usunięte wersje postów</strong><br />» Usunięte wersje: %d » %s',
]);
