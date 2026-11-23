<?php
/**
*
* Prime Post Revisions extension for the phpBB Forum Software package.
*
* @copyright (c) 2026 Ken F. Innes IV <https://www.absoluteanime.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace primehalo\primepostrevisions;

/**
 * Extension class for custom enable/disable/purge actions
 */
class ext extends \phpbb\extension\base
{
	/**
	* Delete the extension's data, after first repairing any migration that was left half installed.
	*
	* phpBB records a migration as installed before running its schema changes. If those changes never
	* finish (for example the install timed out on a large board), the migration is left marked with
	* neither its schema nor its data done. phpBB's revert skips such a migration without removing it,
	* but still counts it as installed, so "Delete data" loops forever until the script times out.
	*
	* @param mixed $old_state The return value of the previous call of this method, or false on the first call
	* @return mixed Returns false after the last step, otherwise temporary state which is passed as an argument to the next step
	* @access public
	*/
	public function purge_step($old_state)
	{
		$this->repair_stuck_migrations();

		return parent::purge_step($old_state);
	}

	/**
	* Mark each half-installed migration as installed so that phpBB's revert will undo it and remove it.
	* The revert steps only remove what exists, so it is safe to run them on partially applied changes.
	*
	* The data is only marked done if the migration has schema changes, since only those can be partially
	* applied. Reverting the data of such a migration lets install_schema drop the posts columns in a single
	* statement before its revert_schema() would otherwise drop them one at a time.
	*
	* @access protected
	*/
	protected function repair_stuck_migrations()
	{
		$stuck = [];
		foreach ($this->get_migration_file_list() as $name)
		{
			$state = $this->migrator->migration_state($name);
			if ($state !== false && !$state['migration_schema_done'] && !$state['migration_data_done'])
			{
				$stuck[] = $name;
			}
		}

		if (empty($stuck))
		{
			return;
		}

		$db = $this->container->get('dbal.conn');
		$migrations_table = $this->container->getParameter('tables.migrations');

		foreach ($stuck as $name)
		{
			$has_schema = false;
			if (class_exists($name))
			{
				$migration = $this->migrator->get_migration($name);
				$has_schema = !empty($migration->update_schema());
			}

			$sql = 'UPDATE ' . $migrations_table . '
				SET ' . $db->sql_build_array('UPDATE', [
					'migration_schema_done'	=> 1,
					'migration_data_done'	=> (int) $has_schema,
					'migration_data_state'	=> '',
				]) . "
				WHERE migration_name = '" . $db->sql_escape($name) . "'";
			$db->sql_query($sql);
		}

		$this->migrator->load_migration_state();
	}
}
