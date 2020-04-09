# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [1.0.0 BETA 8] - 2020-04-09
### Fixed
- The cron job for removing old revisions would run too often because I failed to declare the primepostrev_cron_last_run config variable as Dynamic

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
- Revisions would fail to save for very long messages due to different column types (using TEXT instead of MTEXT_UNI). I updated types for some other columns as well to keep them consistent with the posts table columns.

## [1.0.0 BETA 2] - 2018-05-12
### Changed
- Updated the Dutch and French common language files.

## [1.0.0 BETA 1] - 2018-05-02
- First release for phpBB 3.2, ported from the Prime Post Revisions MOD for phpBB 3.0.