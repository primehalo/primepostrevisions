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

class install_cron2 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\primehalo\primepostrevisions\migrations\install_cron');
	}

	public function update_data()
	{
		return array(
			array('config.remove', array('primepostrev_cron_last_run')),
			array('config.add', array('primepostrev_cron_last_run', 0, true)),
		);
	}
}
