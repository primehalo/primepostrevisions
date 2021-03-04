<?php
/**
 *
 * Prime Post Revisions. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, Ken F. Innes IV
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace primehalo\primepostrevisions\cron\task;

use phpbb\cron\task\base;
use phpbb\config\config;
use phpbb\db\driver\driver_interface as db_driver;
use phpbb\log\log_interface as phpbb_log;

/**
 * Prime Post Revisions cron task.
 */
class prune_post_revisions extends base
{

	protected $cron_frequency = 86400;	// How often we run the cron (in seconds), 86400 seconds = 24 hours
	protected $config;
	protected $db;
	protected $phpbb_log;
	protected $revisions_table;

	/**
	* Constructor
	*
	* @param config			$config 			Config object
	* @param db_driver		$db					Database connection
	* @param phpbb_log		$phpbb_log			Log
	* @param string			$revisions_table	Prime Post Revisions table
	*/
	public function __construct(config $config, db_driver $db, phpbb_log $phpbb_log, $revisions_table)
	{
		$this->config			= $config;
		$this->db				= $db;
		$this->phpbb_log		= $phpbb_log;
		$this->revisions_table	= $revisions_table;
	}

	/**
	* Runs this cron task.
	*
	* @return void
	*/
	public function run()
	{
		// Run your cron actions here...
		$del_total	= 0;
		$sql		= 'SELECT forum_id, forum_name, primepostrev_autoprune FROM ' . FORUMS_TABLE . ' WHERE primepostrev_autoprune > 0';
		$result		= $this->db->sql_query($sql);
		$log_forums	= []; // Array of strings, each one indicating which forum had revisions pruned

		while ($row = $this->db->sql_fetchrow($result))
		{
			$del_count = $this->prune_forum($row['forum_id'], $row['primepostrev_autoprune']);
			if ($del_count > 0)
			{
				$log_forums[] = $row['forum_name'];
			}
			$del_total += $del_count;
		}
		$this->db->sql_freeresult($result);

		if ($del_total > 0)
		{
			// Log the auto-pruning result
			$this->phpbb_log->add('admin', ANONYMOUS, '127.0.0.1', 'LOG_PRIMEPOSTREVISIONS_AUTOPRUNE', false, [$del_total, implode(', ', $log_forums)]);
		}

		// Update the cron task run time here if it hasn't already been done by your cron actions.
		$this->config->set('primepostrev_cron_last_run', time(), false);
	}

	/**
	* Deletes revisions from posts in the given forum that are older than the given number of days
	*
	* @param int $forum_id		The ID of the forum
	* @param int $prune_days	The age in day of revisions to be deleted
	* @return int The number of revisions deleted
	*/
	protected function prune_forum($forum_id, $prune_days)
	{
		if ($forum_id && $prune_days)
		{
			$rev_list	= [];
			$prune_date	= time() - ($prune_days * 86400);	// 86400 seconds = 24 hours
			$sql = 'SELECT r.revision_id
					FROM ' . $this->revisions_table . ' r, ' . POSTS_TABLE . ' p
					WHERE p.forum_id = ' . (int) $forum_id . ' AND p.post_id = r.post_id AND r.revision_time < ' . (int) $prune_date;
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$rev_list[] = $row['revision_id'];
			}
			$this->db->sql_freeresult($result);
			$rev_list = array_unique($rev_list);

			if (!empty($rev_list))
			{
				$sql = "DELETE FROM {$this->revisions_table} WHERE " . $this->db->sql_in_set('revision_id', $rev_list);
				$this->db->sql_query($sql);
				return $this->db->sql_affectedrows();
			}
		}
		return 0;
	}


	/**
	* Returns whether this cron task can run, given current board configuration.
	*
	* For example, a cron task that prunes forums can only run when
	* forum pruning is enabled.
	*
	* @return bool
	*/
	public function is_runnable()
	{
		return $this->config['primepostrev_enable_autoprune'];
	}

	/**
	* Returns whether this cron task should run now, because enough time
	* has passed since it was last run.
	*
	* @return bool
	*/
	public function should_run()
	{
		return $this->config['primepostrev_cron_last_run'] < time() - $this->cron_frequency;
	}
}
