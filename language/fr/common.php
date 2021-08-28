<?php
/**
*
* prime_post_revisions [French]
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
	'PRIMEPOSTREVISIONS_VIEW'				=> 'Voir l’historique.',	// Texte du lien pour afficher l'historique des révisions
	'PRIMEPOSTREVISIONS_NO_POST_REV'		=> 'Ne pas enregistrer l‘historique',	// Texte pour la case à cocher pour ne pas enregistrer l'historique des révisions

	// Viewing revisions
	'PRIMEPOSTREVISIONS_VIEWING'			=> 'Voir l’historique des éditions',
	'PRIMEPOSTREVISIONS_VIEWING_EXPLAIN'	=> 'Cette page permet de consulter l’historique des éditions.',
	'PRIMEPOSTREVISIONS_TITLE'				=> 'Historique éditions',
	'PRIMEPOSTREVISIONS_FIRST'				=> 'Message initial',
	'PRIMEPOSTREVISIONS_FINAL'				=> 'Dernière édition',
	'PRIMEPOSTREVISIONS_COUNT'				=> 'Édition %d',
	'PRIMEPOSTREVISIONS_EDIT_BY'			=> 'Édité par',
	'PRIMEPOSTREVISIONS_NO_SUBJECT'			=> '[sans sujet]',
	'PRIMEPOSTREVISIONS_COMPARE'			=> 'Comparer',
	'PRIMEPOSTREVISIONS_VIEW_DENIED'		=> 'Vous ne disposez pas des autorisations nécessaires pour afficher ces révisions post.',
	'PRIMEPOSTREVISIONS_COMPARISON'			=> 'Comparaison',
	'PRIMEPOSTREVISIONS_DELETE_POST_NOTICE'	=> 'Remarque : La version actuelle du message ne peut pas être supprimée ici. Toute tentative de le faire sera ignorée.',

	// Compare selected revisions
	'PRIMEPOSTREVISIONS_COMPARING'			=> 'Comparer l‘historique des publications',
	'PRIMEPOSTREVISIONS_COMPARING_EXPLAIN'	=> 'Cette page montre une comparaison entre les versions de du message.',
	'PRIMEPOSTREVISIONS_COMPARES'			=> 'Comparer les révisions sélectionnées',

	// Delete a revision
	'PRIMEPOSTREVISIONS_DELETE'				=> 'Effacer édition',
	'PRIMEPOSTREVISIONS_DELETE_CONFIRM'		=> 'Êtes vous sur de vouloir supprimer cette édition ?',
	'PRIMEPOSTREVISIONS_DELETE_DENIED'		=> 'Vous n’avez pas les permissions nécessaires pour supprimer une édition.',
	'PRIMEPOSTREVISIONS_DELETE_FAILED'		=> 'Une erreur est apparue pendant la suppression de l’édition.',
	'PRIMEPOSTREVISIONS_DELETE_SUCCESS'		=> 'Cette édition à été supprimée avec succès.',
	'PRIMEPOSTREVISIONS_DELETE_INVALID'		=> 'Aucune édition n’a été sélectionnée pour être supprimée.',

	// Delete all revisions
	'PRIMEPOSTREVISIONS_DELETES'			=> 'Effacer les éditions sélectionnées',
	'PRIMEPOSTREVISIONS_DELETES_CONFIRM'	=> 'Êtes vous sur de vouloir supprimer ces éditions ?',
	'PRIMEPOSTREVISIONS_DELETES_DENIED'		=> 'Vous n’avez pas les permissions nécessaires pour supprimer ces éditions.',
	'PRIMEPOSTREVISIONS_DELETES_FAILED'		=> 'Une erreur est apparue pendant la suppression des éditions.',
	'PRIMEPOSTREVISIONS_DELETES_SUCCESS'	=> 'Ces éditions ont été supprimées avec succès.',
	'PRIMEPOSTREVISIONS_DELETES_INVALID'	=> 'Aucune édition n’a été sélectionnée pour être supprimée.',

	// Restore a revision
	'PRIMEPOSTREVISIONS_RESTORE'			=> 'Restaurer la révision',
	'PRIMEPOSTREVISIONS_RESTORE_CONFIRM'	=> 'Êtes-vous sûr de vouloir restaurer cette révision?',
	'PRIMEPOSTREVISIONS_RESTORE_DENIED'		=> 'Vous n’avez pas les autorisations nécessaires pour restaurer cette révision.',
	'PRIMEPOSTREVISIONS_RESTORE_FAILED'		=> 'Une erreur s’est produite lors de la tentative de restauration de la révision.',
	'PRIMEPOSTREVISIONS_RESTORE_SUCCESS'	=> 'Le message a été restauré avec succès.',
]);
