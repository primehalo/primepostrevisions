<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\migrations;

/**
 * @ignore
 */
use phpbb\db\migration\migration;

/**
 * Migration stage : Install Schema 2
 */
class install_schema2 extends migration
{
	/**
	 * (@inheritdoc)
	 */
	static public function depends_on()
	{
		return ['\primehalo\primepostrevisions\migrations\install_schema'];
	}

	/**
	* Update columns in the primepostrev database table
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return [
			'change_columns' => [
				$this->table_prefix . 'primepostrev' => [
					'revision_id'		=> ['UINT:10', 0],		// ULINT in phpBB3.2
					'post_id'			=> ['UINT:10', 0],		// ULINT in phpBB3.2
					'post_subject'		=> ['STEXT_UNI', ''],
					'post_text'			=> ['MTEXT_UNI', ''],
					'post_edit_reason'	=> ['STEXT_UNI', ''],
				],
			],
		];
	}

	/**
	* Do nothing. Required for the phpBB Extension Pre-Validator
	*
	* @return array Array of table schema
	* @access public
	*/
	public function revert_schema()
	{
		return [];
	}
}
