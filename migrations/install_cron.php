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
 * Migration stage : Install Cron
 */
class install_cron extends migration
{
	public function effectively_installed()
	{
		return isset($this->config['primepostrev_cron_last_run']);
	}

	static public function depends_on()
	{
		return ['\phpbb\db\migration\data\v31x\v313'];
	}

	public function update_data()
	{
		return [
			['config.add', ['primepostrev_cron_last_run', 0, true]],
		];
	}
}
