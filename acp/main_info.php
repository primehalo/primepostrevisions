<?php
/**
 *
* Prime Post Revisions extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, Ken F. Innes IV, https://www.absoluteanime.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace primehalo\primepostrevisions\acp;

/**
 * Prime Post Revisions ACP module info.
 */
class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\primehalo\primepostrevisions\acp\main_module',
			'title'		=> 'ACP_PRIMEPOSTREVISIONS_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_PRIMEPOSTREVISIONS_SETTINGS',
					'auth'	=> 'ext_primehalo/primepostrevisions && acl_a_board',
					'cat'	=> ['ACP_PRIMEPOSTREVISIONS_TITLE']
				],
			],
		];
	}
}
