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
// ’ « » “ ” …
//

$lang = array_merge($lang, [
	// Viewing posts
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Gönderi tarihçesini görüntüle',	// Text for the link to view the revision history
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Gönderi tarihçesini kaydetme',	// Text for the checkbox to not save the revision history

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Gönderi tarihçesini görüntülüyor',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Bu sayfa, en güncel sürümden başlayarak gönderinin tüm sürümlerini gösterir.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Gönderi tarihçesini görüntülüyor',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Orijinal gönderi',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Şu anki gönderi',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Revizyon %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Düzenleyen',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[konu yok]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Karşılaştır',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'Bu gönderi revizyonlarını görüntülemek için gerekli izinlere sahip değilsiniz.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Karşılaştırma',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Uyarı: Gönderinin güncel hali buradan silinemez. Bunu yapmaya yönelik herhangi bir girişim göz ardı edilecektir.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Gönderi geçmişi karşılaştırma',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'Bu sayfa gönderinin sürümleri arasındaki karşılaştırmayı gösterir.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Seçili revizyonları karşılaştır',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Revizyonu Sil',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Bu revizyonu silmek istediğinize emin misiniz?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Bu revizyonu silmek için gerekli izinlere sahip değilsiniz.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Revizyonu silmeye çalışırken bir hata meydana geldi.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Revizyon başarıyla silindi.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Kaldırmak için herhangi bir gönderi revizyonu seçilmedi.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Seçili revizyonları sil',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Bu revizyonları silmek istediğinize emin misiniz?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Bu revizyonları silmek için gerekli izinlere sahip değilsiniz.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Bu revizyonları silmeye çalışırken bir hata meydana geldi.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Revizyonlar başarıyla kaldırıldı.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Kaldırmak için herhangi bir gönderi revizyonu seçilmedi.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Revizyonları geri yükle',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Bu revizyonu geri yüklemek istediğinize emin misiniz?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'Bu revizyonu geri yüklemek için gerekli izinlere sahip değilsiniz.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Revizyonu geri yüklemeye çalışırken bir hata meydana geldi.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'Gönderi başarıyla geri yüklendi.',
]);
