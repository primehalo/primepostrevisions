<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2018 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\core;

/**
 * @ignore
 */
use primehalo\primepostrevisions\core\forum_map;

/**
 * Prime Post Revisions Forum Mapper.
 */
class forum_map_ppr extends forum_map
{
	/**
	 * Get forum custom SQL Column.
	 *
	 * @return array
	 * @access protected
	 */
	protected function get_forums_cust_sql_ary($sql_ary)
	{
		$sql_ary['SELECT'] .= ', f.primepostrev_enable, f.primepostrev_autoprune';
		return $sql_ary;
	}

	/**
	 * Get forum custom template row.
	 *
	 * @param array		$row	Forum row
	 *
	 * @return array
	 * @access protected
	 */
	protected function get_forum_cust_tpl_row($row)
	{
		$tpl_row = [];
		if ($row['forum_type'] == FORUM_POST)
		{
			$tpl_row = [
				'S_PRIMEPOSTREV_ENABLE'		=> $row['primepostrev_enable'],
				'PRIMEPOSTREV_AUTOPRUNE'	=> $row['primepostrev_autoprune'],
				'U_EDIT'					=> append_sid("?i=acp_forums&amp;mode=manage&amp;parent_id={$row['parent_id']}&amp;f={$row['forum_id']}&amp;action=edit"),
			];
		}
		return $tpl_row;
	}
}
