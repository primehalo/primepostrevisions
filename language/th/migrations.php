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
	'PRIMEPOSTREV_ALTER_POSTS_MANUALLY'	=> 'ฐานข้อมูลของคุณไม่สามารถเพิ่มหรือลบคอลัมน์ของส่วนขยายนี้ในตารางโพสต์ได้ทันที จึงต้องสร้างตารางโพสต์ใหม่ทั้งหมด สำหรับบอร์ดที่มีโพสต์จำนวนมากขนาดนี้ การดำเนินการดังกล่าวใช้เวลานานกว่าที่คำขอหน้าเว็บหนึ่งครั้งได้รับอนุญาตให้ทำงาน<br><br>โปรดรันคำสั่ง SQL ต่อไปนี้ด้วยตนเอง โดยควรรันจากบรรทัดคำสั่งของ MySQL เนื่องจากไม่มีการจำกัดเวลา อาจใช้เวลาสักครู่ และอาจไม่สามารถตั้งโพสต์ใหม่ได้จนกว่าจะเสร็จสิ้น:<br><br><code>%s</code><br><br>จากนั้นลองอีกครั้ง',
]);
