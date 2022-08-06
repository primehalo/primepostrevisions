# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [1.0.5] - 2022-07-16
### Added
- Support for scaffoldBB

### Fixed
- Post edit time could be incorrect

## [1.0.4] - 2021-08-27
### Changed
- Updated French & Spanish translations
- Minor code adjustments suggested by the Extension Customizations Team

## [1.0.3] - 2021-07-03
### Fixed
- Incorrect formatting of the array returned by update_data() in the install_acp_module module

## [1.0.2] - 2021-06-19
### Changed
- Updated Polish language files
- Renamed `body.html` to `primepostrevisions_body.html`
- Renamed `confirm_restore.html` to `primepostrevisions_confirm_restore.html`
- Added copyright header to minified version of `diff_match_patch.js`

### Removed
- Empty methods, unused methods, and commented out code

## [1.0.1 RC1] - 2021-04-01
### Added
- Add pagination to post history (Thanks Dark❶!)

### Changed
- Split forum data into 50 chunks for SQL Update in ACP Settings (Thanks Dark❶!)

### Fixed
- Undefined index & variable while viewing post history (Thanks Dark❶!)

## [1.0.0] - 2021-02-15
- First release to phpBB Customization Database

## [1.0.0 RC4] - 2021-02-05
### Changed
- Moved from `array(...)` to `[...]` Structure (Thanks Dark❶!)
- Updated "phpBB Forum Mapper" from v1.0.0 to v1.0.3 Structure (Thanks Dark❶!)

### Fixed
- GitHub Actions CI (Thanks Dark❶!)
- Code sniff fixes (Thanks Dark❶!)
- Do not display checkbox for New Post in Editor (Thanks Dark❶!)

## [1.0.0 RC3] - 2020-05-29
### Added
- Russian translations for previously untranslated text

### Fixed
- When showing the reason for deletion, multibyte characters would not show up properly

## [1.0.0 RC2] - 2020-05-01
### Fixed
- When comparing two post revisions, some reserved HTML characters would be displayed as encoded entities (such as `&` displaying as `&amp;`)

## [1.0.0 RC1] - 2020-04-26
### Added
- Profile caching
- Ability to not save post history when editing a post (only for those with the permissions to delete the post history)

### Changed
- SQL `JOIN` to SQL `LEFT JOIN`

### Fixed
- Newline indicators failed to show properly on some Linux systems

### Removed
- Unnecessary profile information displayed next to post revisions

## [1.0.0 RC] - 2020-04-24
### Added
- Added the ability to compare non-sequential revisions

### Changed
- Fixed up code to be CDB (phpBB Customization Database) compliant
- Reformatted ACP directory list to show categories and tree structure
- Minor styling changes

### Fixed
- Unintentional duplicate HTML element IDs

## [1.0.0 BETA 9] - 2020-04-14
### Added
- Admin Control Panel module to more quickly and easily access the individual forums settings in one place
- Global setting to enable/disable the saving of post revisions
- Global setting to enable/disable auto-pruning

### Changed
- When compare revisions it now shows them as they would be seen when composing in an editor, with BBCodes instead of with HTML (Thanks Dark❶!)
- Moved template files from "prosilver" to "all" to make compatibility with prosilver-based themes simpler (Thanks Dark❶!)
- Use the unicode character `↵` to represent line ending changes in comparisons (Thanks Dark❶!)
- Changed "var" to "let" in the JavaScript
- Minor code cleanup

## [1.0.0 BETA 8] - 2020-04-09
### Fixed
- The cron job for removing old revisions would run too often because I failed to declare the `primepostrev_cron_last_run` config variable as Dynamic (Thanks Dark❶!)

### Added
- In the cron results log, list the forums from which revisions were deleted

## [1.0.0 BETA 7] - 2020-03-26
### Changed
- Only log cron results if any revisions were actually pruned

## [1.0.0 BETA 6] - 2019-01-15
### Fixed
- Header information on the Brazilian translation files

### Added
- Remaining Brazilian files that had not been translated

## [1.0.0 BETA 5] - 2018-06-07
### Fixed
- On the post revision history page, the alternative text for action buttons which are supposed to be hidden would sometimes show up because I forgot to added the sr-only class.

### Added
- German language files for the ACP and permissions

### Changed
- Changed JavaScript variables from snake_case formatting to camelCase formatting
- Moved HTML strings out of JavaScript variables and into JavaScript template tags for easier readability
- Updated German language files

## [1.0.0 BETA 4] - 2018-06-06
### Fixed
- A bug introduced in the previous update that removed auto-incrementing the primary key in the revisions database table.

## [1.0.0 BETA 3] - 2018-06-05
### Fixed
- Revisions would fail to save for very long messages due to different column types (using `TEXT` instead of `MTEXT_UNI`). I updated types for some other columns as well to keep them consistent with the posts table columns.

## [1.0.0 BETA 2] - 2018-05-12
### Changed
- Updated the Dutch and French common language files.

## [1.0.0 BETA 1] - 2018-05-02
- First release for phpBB 3.2, ported from the Prime Post Revisions MOD for phpBB 3.0.
