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
// ’ « » “ ” …
//

$lang = array_merge($lang, [
	// Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'ดูประวัติการโพสต์',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'อย่าบันทึกประวัติการโพสต์',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'กำลังดูประวัติการโพสต์',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'หน้านี้แสดงโพสต์ทุกเวอร์ชัน โดยเริ่มจากเวอร์ชันล่าสุด',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'กำลังดูประวัติการโพสต์',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'โพสต์ต้นฉบับ',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'โพสต์ปัจจุบัน',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'การแก้ไข %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'แก้ไขโดย',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[ไม่มีชื่อเรื่อง]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'เปรียบเทียบ',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'คุณไม่มีสิทธิ์ที่จำเป็นในการดูการแก้ไขโพสต์เหล่านี้',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'การเปรียบเทียบ',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'หมายเหตุ: ไม่สามารถลบโพสต์เวอร์ชันปัจจุบันได้ที่นี่ ความพยายามใดๆ ในการดำเนินการดังกล่าวจะถูกละเว้น',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'เปรียบเทียบประวัติการโพสต์',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'หน้านี้แสดงการเปรียบเทียบระหว่างเวอร์ชันต่างๆ ของโพสต์',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'เปรียบเทียบการแก้ไขที่เลือก',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'ลบการแก้ไข',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'คุณแน่ใจหรือไม่ว่าต้องการลบการแก้ไขนี้',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'คุณไม่มีสิทธิ์ที่จำเป็นในการลบการแก้ไขนี้',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'เกิดข้อผิดพลาดขณะพยายามลบการแก้ไข',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'นำการแก้ไขออกเรียบร้อยแล้ว',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'ไม่ได้เลือกการแก้ไขโพสต์เพื่อนำออก',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'ลบการแก้ไขที่เลือก',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'คุณแน่ใจหรือไม่ว่าต้องการลบการแก้ไขเหล่านี้',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'คุณไม่มีสิทธิ์ที่จำเป็นในการลบการแก้ไขเหล่านี้',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'เกิดข้อผิดพลาดขณะพยายามลบการแก้ไขเหล่านี้',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'การแก้ไขถูกลบออกเรียบร้อยแล้ว',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'ไม่ได้เลือกการแก้ไขโพสต์เพื่อนำออก',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'คืนค่าการแก้ไข',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'คุณแน่ใจหรือไม่ว่าต้องการคืนค่าการแก้ไขนี้',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'คุณไม่มีสิทธิ์ที่จำเป็นในการกู้คืนการแก้ไขนี้',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'เกิดข้อผิดพลาดขณะพยายามกู้คืนการแก้ไข',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'กู้คืนโพสต์สำเร็จแล้ว',
]);
