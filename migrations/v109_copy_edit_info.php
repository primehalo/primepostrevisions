<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions\migrations;

/**
 * @ignore
 */
use phpbb\db\migration\migration;

/**
 * Migration stage : Copy existing edit info into our edit info columns
 *
 * This replaces install_data::copy_edit_columns(), which updated the wrong table and so never copied anything.
 */
class v109_copy_edit_info extends migration
{
	/** @var int Number of posts to process per step */
	const BATCH_SIZE = 10000;

	/**
	 * (@inheritdoc)
	 */
	static public function depends_on()
	{
		return ['\primehalo\primepostrevisions\migrations\install_data'];
	}

	/**
	* Add or update data in the database
	*
	* @return array Array of data update steps
	* @access public
	*/
	public function update_data()
	{
		return [
			['custom', [[$this, 'copy_edit_info']]],
		];
	}

	/**
	* Copy phpBB's edit info to our edit info columns, in batches of post IDs so large boards don't time
	* out. Returning a value tells phpBB to call this again with that value; returning true means done.
	*
	* Only posts with no edit time of our own are updated, so edits already tracked by this extension
	* are not overwritten.
	*
	* @param int	$start	The post ID the previous batch ended on
	* @return int|true The post ID this batch ended on, or true when all posts have been processed
	* @access public
	*/
	public function copy_edit_info($start = 0)
	{
		// Find the last post ID of this batch
		$sql = 'SELECT post_id
				FROM ' . POSTS_TABLE . '
				WHERE post_id > ' . (int) $start . '
				ORDER BY post_id ASC';
		$result = $this->db->sql_query_limit($sql, 1, self::BATCH_SIZE - 1);
		$end = (int) $this->db->sql_fetchfield('post_id');
		$this->db->sql_freeresult($result);

		// Fewer than a full batch of posts remain, so this is the last batch: run it up to the highest post ID
		$last_batch = !$end;
		if ($last_batch)
		{
			$sql = 'SELECT MAX(post_id) AS max_post_id
					FROM ' . POSTS_TABLE;
			$result = $this->db->sql_query($sql);
			$end = (int) $this->db->sql_fetchfield('max_post_id');
			$this->db->sql_freeresult($result);
		}

		$sql = 'UPDATE ' . POSTS_TABLE . '
				SET primepost_edit_time = post_edit_time,
					primepost_edit_user = post_edit_user,
					primepost_edit_count = post_edit_count
				WHERE post_id > ' . (int) $start . '
					AND post_id <= ' . (int) $end . '
					AND primepost_edit_time = 0
					AND (post_edit_time <> 0 OR post_edit_user <> 0 OR post_edit_count <> 0)';
		$this->db->sql_query($sql);

		return $last_batch ? true : $end;
	}
}
