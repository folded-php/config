# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.1.5] 2020-10-03

### Fixed

- Updated dependency `folded/exception` to version 0.4.\*.

## [0.1.4] 2020-10-01

### Fixed

- Added missing namespace `Folded` to `function_exists` statements.

## [0.1.3] 2020-09-18

### Fixed

- Dependency updated.

## [0.1.2] 2020-09-12

### Fixed

- Having an env set to `true`, `false` or `null` will now correctly returns a boolean or `null` instead of a string.

## [0.1.1] 2020-09-07

### Added

- **Nothing changes** in your code, but we now use our shared package [folded/exception](https://github.com/folded-php/exception) for the exception `Folded\Exceptions\FolderNotFoundException` and `Folded\Exceptions\NotAFolderException`.

## [0.1.0] 2020-09-05

### Added

- First working version.
