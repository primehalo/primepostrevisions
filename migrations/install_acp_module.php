<?php
/**
 *
* Prime Post Revisions extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, Ken F. Innes IV, https://www.absoluteanime.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace primehalo\primepostrevisions\migrations;

/**
 * @ignore
 */
use phpbb\db\migration\migration;

/**
 * Migration stage : Install ACP Module
 */
class install_acp_module extends migration
{
	static private function get_default_settings()
	{
		return [
			'primepostrev_enable_general'	=> true,
			'primepostrev_enable_autoprune'	=> true,
		];
	}

	public function effectively_installed()
	{
		return isset($this->config['primepostrev_enable_general']);
	}

	static public function depends_on()
	{
		return ['\phpbb\db\migration\data\v31x\v314'];
	}

	public function update_data()
	{
		$return_ary = [];

		$settings_ary = $this->get_default_settings();
		foreach ($settings_ary as $setting_key => $setting_val)
		{
			$return_ary[] = ['config.add', [$setting_key, $setting_val]];
		}

		// Add a parent module (ACP_PRIMEPOSTREVISIONS_TITLE) to the Extensions tab (ACP_CAT_DOT_MODS)
		$return_ary[] = ['module.add', [
			'acp',
			'ACP_CAT_DOT_MODS',
			'ACP_PRIMEPOSTREVISIONS_TITLE'
		]];

		// Add our main_module to the parent module (ACP_PRIMEPOSTREVISIONS_TITLE)
		$return_ary[] = ['module.add', [
			'acp',
			'ACP_PRIMEPOSTREVISIONS_TITLE',
			[
				'module_basename'	=> '\primehalo\primepostrevisions\acp\main_module',
				'modes' 			=> ['settings'],
			],
		]];

		return $return_ary;
	}
}
