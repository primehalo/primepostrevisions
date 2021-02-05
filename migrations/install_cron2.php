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
 * Migration stage : Install Cron 2
 */
class install_cron2 extends migration
{
	static public function depends_on()
	{
		return ['\primehalo\primepostrevisions\migrations\install_cron'];
	}

	public function update_data()
	{
		return [
			['config.remove', ['primepostrev_cron_last_run']],
			['config.add', ['primepostrev_cron_last_run', 0, true]],
		];
	}
}
