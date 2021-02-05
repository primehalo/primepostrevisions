<?php
/**
*
* prime_post_revisions [Arabic]
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
	// Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'عرض تاريخ المشاركة.',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Do not save post history',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'مشاهدة تاريخ المشاركة',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'هذه الصفحة تعرض كل النسخ الخاصة بهذه المشاركة، بدءاً بالنسخة الأحدث.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'مشاهدة تاريخ المشاركة',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'المشاركة الأصلية',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'المشاركة الحالية',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'التعديل %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'تم التعديل بواسطة',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[لا عنوان]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Compare',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'You lack the necessary permissions to view these post revisions.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Notice: The current version of the post cannot be deleted here. Any attempt to do so will be ignored.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparing post history',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'This page shows comparison between versions of the post.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Compare selected revisions',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'حذف التعديل',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'هل أنت متأكد من أنك تريد حذف هذا التعديل؟',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'أنت تفتقر إلى الصلاحيات اللازمة لحذف هذا التعديل.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'حدث خطأ أثناء محاولة حذف التعديل.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'تم إزالة التعديل بنجاح.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'لم يتم اختيار أي من تعديلات المشاركة للإزالة.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'حذف التعديلات المحددة',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'هل أنت متأكد من أنك تريد حذف هذه التعديلات؟',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'أنت تفتقر إلى الصلاحيات اللازمة لحذف هذه التعديلات.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'حدث خطأ أثناء محاولة حذف هذه التعديلات.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'تم إزالة التعديلات بنجاح.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'لم يتم اختيار أي من تعديلات المشاركة للإزالة.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restore Revision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Are you sure you want to restore this revision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'You lack the necessary permissions to restore this revision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'An error occurred while attempting to restore the revision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'The post has been successfully restored.',
]);
