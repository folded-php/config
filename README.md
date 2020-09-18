# folded/config

Configuration and environment utilities for your PHP web app.

[![Packagist License](https://img.shields.io/packagist/l/folded/config)](https://github.com/folded-php/config/blob/master/LICENSE) [![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/folded/config)](https://github.com/folded-php/config/blob/master/composer.json#L14) [![Packagist Version](https://img.shields.io/packagist/v/folded/config)](https://packagist.org/packages/folded/config) [![Build Status](https://travis-ci.com/folded-php/config.svg?branch=master)](https://travis-ci.com/folded-php/config) [![Maintainability](https://api.codeclimate.com/v1/badges/01cc64f3cc1911b00e3d/maintainability)](https://codeclimate.com/github/folded-php/config/maintainability) [![TODOs](https://img.shields.io/endpoint?url=https://api.tickgit.com/badge?repo=github.com/folded-php/config)](https://www.tickgit.com/browse?repo=github.com/folded-php/config)

## Summary

- [About](#about)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this library to get an easy to setup way to perform configuration/environment value fetch.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

- [folded/action](https://github.com/folded-php/action): A way to organize your controllers for your web app.
- [folded/config](https://github.com/folded-php/config): Configuration and environment utilities for your PHP web app.
- [folded/crypt](https://github.com/folded-php/crypt): Encrypt and decrypt strings for your web app.
- [folded/exception](https://github.com/folded-php/exception): Various kind of exception to throw for your web app.
- [folded/history](https://github.com/folded-php/history): Manipulate the browser history for your web app.
- [folded/http](https://github.com/folded-php/http): HTTP utilities for your web app.
- [folded/orm](https://github.com/folded-php/orm): An ORM for you web app.
- [folded/request](https://github.com/folded-php/request): Request utilities, including a request validator, for your PHP web app.
- [folded/routing](https://github.com/folded-php/routing): Routing functions for your PHP web app.
- [folded/session](https://github.com/folded-php/session): Session functions for your web app.
- [folded/view](https://github.com/folded-php/view): View utilities for your PHP web app.

## Features

- Can get configuration or `.env` values (using dot syntax)
- Can check if a configuration or an env value exist
- Eager load the configuration, such as it is only booted when you get a configuration or an env value

## Requirements

- PHP version >= 7.4.0
- Composer installed

## Installation

- [1. Install the package](#1-install-the-package)
- [2. Set up the library](#2-set-up-the-library)

### 1. Install the package

In your project root directory, run this command:

```bash
composer require folded/config
```

### 2. Set up the library

Right before getting the config or env values, integrate this script:

```php
use function Folded\setConfigFolderPath;
use function Folded\setEnvFolderPath;

setEnvFolderPath(__DIR__);
setConfigFolderPath(__DIR__ . "/config");
```

You don't have to set up both if you only want to use one or the other. However, if you plan to use both, make sure that `setEnvFolderPath()` is called before `setConfigFolderPath()` in order to take advantage of env variables in configurations.

The env folder path is the folder that contains your `.env` file.

## Examples

Since this library uses vlucas/phpdotenv for the env feature, you can learn more on this file format [in the documentation](https://github.com/vlucas/phpdotenv).

- [1. Getting a configuration value](#1-getting-a-configuration-value)
- [2. Getting an env value](#2-getting-an-env-value)
- [3. Checking if a configuration exist](#3-checking-if-a-configuration-exist)
- [4. Check if an env value exist](#4-check-if-an-env-value-exist)
- [5. Get all config variables](#5-get-all-config-variables)

### 1. Getting a configuration value

In this example, we will get a configuration value.

```php
use function Folded\getConfig;

echo getConfig("app.name");
```

Asuming your configuration file is located at `config/app.php`, and contains:

```php
return [
	"name" => "Folded",
];
```

### 2. Getting an env value

In this example, we will get a value stored in the `.env` file.

```php
echo Folded\getEnv("APP_NAME");
```

Asuming your `.env` file contains:

```
APP_NAME="Your app name"
```

### 3. Checking if a configuration exist

In this example, we will check if a configuration key exist.

```php
use function Folded\hasConfig;

if (hasConfig("app.name")) {
	echo "config exist";
} else {
	echo "config don't exist";
}
```

### 4. Check if an env value exist

In this example, we will check if an env variable exist.

```php
use function Folded\hasEnv;

if (hasEnv("APP_NAME")) {
	echo "has env";
} else {
	echo "has not env";
}
```

### 5. Get all config variables

In this example, we will get all the key/values inside the config file `app.php`.

```php
use function Folded\getAllConfig;

$app = getAllConfig("app");

echo $app["name"];
```

## Version support

|        | 7.3 | 7.4 | 8.0 |
| ------ | --- | --- | --- |
| v0.1.0 | ❌  | ✔️  | ❓  |
| v0.1.1 | ❌  | ✔️  | ❓  |
| v0.1.2 | ❌  | ✔️  | ❓  |
