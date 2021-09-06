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
	'ACP_PRIMEPOSTREVISIONS_TITLE'						=> 'การแก้ไข Prime Post',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS'					=> 'การตั้งค่าส่วนขยาย',
	'ACP_PRIMEPOSTREVISIONS_BASIC_SETTINGS'				=> 'การตั้งค่าทั่วไป',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL'				=> 'เปิดใช้งานการแก้ไขโพสต์',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_GENERAL_EXPLAIN'		=> 'เปิดใช้งานความสามารถในการจัดเก็บการแก้ไขหลังการแก้ไข ต้องตั้งค่าการแก้ไขการจัดเก็บตามแต่ละบอร์ด การปิดใช้งานนี้จะไม่ลบการแก้ไขโพสต์ที่มีอยู่ แต่จะป้องกันไม่ให้มีการจัดเก็บการแก้ไขใหม่เท่านั้น',

	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE'			=> 'เปิดใช้งานตัดการแก้ไขอัตโนมัติ',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_AUTOPRUNE_EXPLAIN'	=> 'เปิดใช้งานความสามารถในการตัดการแก้ไขอัตโนมัติ ต้องตั้งค่าความถี่การตัดแต่งกิ่งตามแต่ละฟอรัม',

	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS'				=> 'การตั้งค่าบอร์ด',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_EXPLAIN'		=> 'เก็บประวัติการแก้ไขของการแก้ไขโพสต์ทั้งหมด ตัดอัตโนมัติจะลบการแก้ไขที่เก่ากว่าจำนวนวันที่กำหนดโดยอัตโนมัติ ตั้งค่าเป็น 0 เพื่อปิดการใช้งาน',
	'ACP_PRIMEPOSTREVISIONS_FORUM_SETTINGS_AUTOPRUNE'	=> 'ตัดอัตโนมัติ',
	'ACP_PRIMEPOSTREVISIONS_FORUM_NAME'					=> 'ชื่อบอร์ด',
	'ACP_PRIMEPOSTREVISIONS_FORUM_ENABLE'				=> 'เปิดใช้งาน',

	'ACP_PRIMEPOSTREVISIONS_SETTINGS_SAVED'				=> 'บันทึกการตั้งค่า Prime Post Revisions สำเร็จแล้ว!',
	'ACP_PRIMEPOSTREVISIONS_SETTINGS_LOG'				=> '<strong>แก้ไขการตั้งค่า Prime Post Revisions</strong>',

	// Forum Settings
	'ACP_PRIMEPOSTREVISIONS_ENABLE'						=> 'การแก้ไขการเก็บโพสต์',
	'ACP_PRIMEPOSTREVISIONS_ENABLE_EXPLAIN'				=> 'เก็บประวัติการแก้ไขของการแก้ไขโพสต์ทั้งหมด',

	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> 'แก้ไขการตัดแต่งอัตโนมัติ',
	'ACP_PRIMEPOSTREVISIONS_AUTOPRUNE_EXPLAIN'			=> 'ลบการแก้ไขโพสต์ที่เก่ากว่าจำนวนวันที่กำหนดโดยอัตโนมัติ ตั้งค่าเป็น 0 เพื่อปิดการใช้งาน',

	// Cron Log
	'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE'					=> '<strong>การแก้ไขโพสต์ที่ตัดแต่งอัตโนมัติ</strong><br />» การแก้ไขที่ถูกลบ: %d » %s',
]);
