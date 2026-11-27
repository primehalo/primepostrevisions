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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'لا تستطيع قاعدة بياناتك إضافة أعمدة هذا الامتداد في جدول المشاركات أو إزالتها فورًا، لذا سيتعين عليها إعادة بناء جدول المشاركات بالكامل. في منتدى يحتوي على هذا العدد من المشاركات يستغرق ذلك وقتًا أطول مما يُسمح به لطلب صفحة واحدة.<br><br>يرجى تنفيذ أمر SQL التالي بنفسك، ويُفضَّل من سطر أوامر MySQL لأنه لا يخضع لحد زمني. قد يستغرق ذلك بعض الوقت، وقد يتعذر إنشاء مشاركات جديدة حتى ينتهي:<br><br><code>%s</code><br><br>ثم حاول مرة أخرى.',
]);
