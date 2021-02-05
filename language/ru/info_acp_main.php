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
	'ACP_PRIMEPOSTREVISIONS_TITLE'						=> 'Prime история правок',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'Настройки истории правок',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'Основные настройки',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'Включить историю правок',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'Включает возможность сохранять все версии отредактированных сообщений. Возможность устанавливается отдельно для каждого форума. Отключение истории не удаляет уже сохраненные версии, а лишь предотвращает создание новых.',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'Включить автоудаление истории',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'Включает возможность автоматически удалять историю правок. Интервал удаления устанавливается отдельно для каждого форума.',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'Настройки форумов',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'Сохранять все версии отредактированных сообщений. Автоудаление удаляет версии старше заданного количества дней. Установите 0, чтобы отключить автоудаление.',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'Автоудаление',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'Имя форума',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'Включить',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> 'Настройки Prime истории правок успешно обновлены!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>Изменены настройки Prime истории правок</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'Сохранять историю правок',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'Сохраняет все версии отредактированных сообщений.',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'Автоудаление истории правок',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'Автоматически удаляет версии старше заданного количества дней. Установите 0, чтобы отключить автоудаление.',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>Автоудаление истории правок</strong><br />» Удалено версий: %d » %s',
]);
