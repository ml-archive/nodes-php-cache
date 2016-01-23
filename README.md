## Cache

A easy integration for handling files to [Laravel](http://laravel.com/docs).

[![Total downloads](https://img.shields.io/packagist/dt/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Monthly downloads](https://img.shields.io/packagist/dm/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Latest release](https://img.shields.io/packagist/v/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Open issues](https://img.shields.io/github/issues/nodes-php/cache.svg)](https://github.com/nodes-php/cache/issues)
[![License](https://img.shields.io/packagist/l/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Star repository on GitHub](https://img.shields.io/github/stars/nodes-php/cache.svg?style=social&label=Star)](https://github.com/nodes-php/cache/stargazers)
[![Watch repository on GitHub](https://img.shields.io/github/watchers/nodes-php/cache.svg?style=social&label=Watch)](https://github.com/nodes-php/cache/watchers)
[![Fork repository on GitHub](https://img.shields.io/github/forks/nodes-php/cache.svg?style=social&label=Fork)](https://github.com/nodes-php/cache/network)

## Introduction
One thing we at [Nodes](http://nodesagency.com) have been missing in [Laravel](http://laravel.com/docs) is more structure of where the cache settings can be found, and some helpers to crete cache params

## Installation

To install this package you will need:

* Laravel 5.1+
* PHP 5.5.9+

You must then modify your `composer.json` file and run `composer update` to include the latest version of the package in your project.

```
"require": {
    "nodes/cache": "^0.1"
}
```

Or you can run the composer require command from your terminal.

```
composer require nodes/cache
```

Setup service provider in config/app.php

```
'NodesCache' => Nodes\Assets\Support\Facades\Cache::class
```

Setup alias in config/app.php

```
Nodes\Cache\ServiceProvider::class
```

Copy the config files from vendor/nodes/cache/config/cache.php to config/nodes/cache.php

## Usage

###Global functions

```php
function cache_put
```

```php
function cache_get
```

```php
function cache_forget
```

```php
function cache_flush
```

```php
function cache_wipe
```

###Facade

```php
\NodesCache::
```

```php
function cache_put
```

```php
function cache_get
```

```php
function cache_forget
```

```php
function cache_flush
```

```php
function cache_wipe
```

## Developers / Maintainers

This package is developed and maintained by the PHP team at [Nodes Agency](http://nodesagency.com)

[![Follow Nodes PHP on Twitter](https://img.shields.io/twitter/follow/nodesphp.svg?style=social)](https://twitter.com/nodesphp) [![Tweet Nodes PHP](https://img.shields.io/twitter/url/http/nodesphp.svg?style=social)](https://twitter.com/nodesphp)

### License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



