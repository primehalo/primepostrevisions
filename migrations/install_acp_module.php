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

class install_acp_module extends \phpbb\db\migration\migration
{
	static private function get_default_settings()
	{
		return array(
			'primepostrev_enable_general'	=> true,
			'primepostrev_enable_autoprune'	=> true,
		);
	}

	public function effectively_installed()
	{
		return isset($this->config['primepostrev_enable_general']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v314');
	}

	public function update_data()
	{
		$return_ary = array();

		$settings_ary = $this->get_default_settings();
		foreach ($settings_ary as $setting_key => $setting_val)
		{
			$return_ary[] = array('config.add', array($setting_key, $setting_val));
		}

		// Add a parent module (ACP_PRIMEPOSTREVISIONS_TITLE) to the Extensions tab (ACP_CAT_DOT_MODS)
		$return_ary[] = array('module.add', array(
			'acp',
			'ACP_CAT_DOT_MODS',
			'ACP_PRIMEPOSTREVISIONS_TITLE'
		));

		// Add our main_module to the parent module (ACP_PRIMEPOSTREVISIONS_TITLE)
		$return_ary[] = array('module.add', array(
			'acp',
			'ACP_PRIMEPOSTREVISIONS_TITLE',
			array(
				'module_basename'	=> '\primehalo\primepostrevisions\acp\main_module',
				'modes' 			=> array('settings'),
			),
		));

		return $return_ary;
	}
}
