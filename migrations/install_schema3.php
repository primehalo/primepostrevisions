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
 * Migration stage : Install Schema 3
 */
class install_schema3 extends migration
{
	/**
	 * (@inheritdoc)
	 */
	static public function depends_on()
	{
		return ['\primehalo\primepostrevisions\migrations\install_schema2'];
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
					'revision_id' => ['UINT:10', null, 'auto_increment'],		// ULINT in phpBB3.2
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
