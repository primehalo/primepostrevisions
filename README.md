# Prime Post Revisions

## Synopsis

A phpBB 3.2/3.3 extension that keeps a revision history of all posts edits. These revisions can be viewed, deleted, and restored only by users with the necessary permissions. Other features include the ability to enable/disable for specific forums and auto-pruning to remove old revisions. These options are set on the page for editing forum settings in ACP. This extension can be used with phpBB 3.1.3+ but due to a change of how button icons are displayed between 3.1 and 3.2 the template styling won't match completely.

## Installation

1. Download the ZIP file.
2. Unzip and copy to the `ext` directory of your phpBB board so that you have `ext/primehalo/primepostrevisions.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Prime Post Revisions` under the Disabled Extensions list, and click its `Enable` link.

### Large boards

This extension adds three columns to the posts table. On MySQL 8.0.12+ and MariaDB 10.3+ this is instant. On older versions MySQL has to rebuild the whole posts table, which on a board with a very large number of posts can take longer than your web server allows for a single request.

If that applies to your board, you can add the columns yourself from phpMyAdmin or the MySQL command line before enabling the extension (replace `phpbb_` with your table prefix):

```sql
ALTER TABLE phpbb_posts
  ADD COLUMN primepost_edit_time int(11) UNSIGNED DEFAULT '0' NOT NULL,
  ADD COLUMN primepost_edit_user int(10) UNSIGNED DEFAULT '0' NOT NULL,
  ADD COLUMN primepost_edit_count int(4) UNSIGNED DEFAULT '0' NOT NULL;
```

The extension will see that the columns already exist and skip that step. The same applies when deleting the extension's data, where you can remove the columns yourself first:

```sql
ALTER TABLE phpbb_posts
  DROP COLUMN primepost_edit_time,
  DROP COLUMN primepost_edit_user,
  DROP COLUMN primepost_edit_count;
```

## License

[GPLv2](license.txt)

## Donations
If you like this extension and have the desire to express your thanks through a donation you may do so via PayPal. My PayPal ID is primehalo@gmail.com. The suggested donation amount for this extension is $10.00 but any amount is appreciated.
