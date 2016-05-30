## Cache

An easy integration for handling caching - in a structured way - for [Laravel](http://laravel.com/docs).

[![Total downloads](https://img.shields.io/packagist/dt/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Monthly downloads](https://img.shields.io/packagist/dm/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Latest release](https://img.shields.io/packagist/v/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Open issues](https://img.shields.io/github/issues/nodes-php/cache.svg)](https://github.com/nodes-php/cache/issues)
[![License](https://img.shields.io/packagist/l/nodes/cache.svg)](https://packagist.org/packages/nodes/cache)
[![Star repository on GitHub](https://img.shields.io/github/stars/nodes-php/cache.svg?style=social&label=Star)](https://github.com/nodes-php/cache/stargazers)
[![Watch repository on GitHub](https://img.shields.io/github/watchers/nodes-php/cache.svg?style=social&label=Watch)](https://github.com/nodes-php/cache/watchers)
[![Fork repository on GitHub](https://img.shields.io/github/forks/nodes-php/cache.svg?style=social&label=Fork)](https://github.com/nodes-php/cache/network)

## 📝 Introduction

One thing we at [Nodes](http://nodesagency.com) have been missing a lot in [Laravel](http://laravel.com/docs) is more structure of managing caches.
 
We've come up with a more flexible and structured way of managing caches and their lifetime. Also we've created a few helper methods to make it all a bit easier and awesome.

## 📦 Installation

To install this package you will need:

* Laravel 5.1+
* PHP 5.5.9+

You must then modify your `composer.json` file and run `composer update` to include the latest version of the package in your project.

```
"require": {
    "nodes/cache": "^1.0"
}
```

Or you can run the composer require command from your terminal.

```
composer require nodes/cache:^1.0
```

## 🔧 Setup

Setup service provider in `config/app.php`

```
Nodes\Cache\ServiceProvider::class
```

Setup alias in `config/app.php`

```
'NodesCache' => Nodes\Cache\Support\Facades\Cache::class
```

Publish config files

```
php artisan vendor:publish --provider="Nodes\Cache\ServiceProvider"
```

If you want to overwrite any existing config files use the `--force` parameter

```
php artisan vendor:publish --provider="Nodes\Cache\ServiceProvider" --force

## Usage

### Global methods

```php
function cache_put($cacheGroupKey, array $params = [], $data, $tags = null)
```

```php
function cache_get($cacheGroupKey, array $params = [], $tags = null)
```

```php
function cache_forget($cacheGroupKey, array $params = [], $tags = null)
```

```php
function cache_flush($tags)
```

```php
function cache_wipe()
```

### Facade methods

```php
\NodesCache::cache_put($cacheGroupKey, array $params = [], $data, $tags = null)
```

```php
\NodesCache::cache_get($cacheGroupKey, array $params = [], $tags = null)
```

```php
\NodesCache::cache_forget($cacheGroupKey, array $params = [], $tags = null)
```

```php
\NodesCache::cache_flush($tags)
```

```php
\NodesCache::cache_wipe()
```

## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes Agency](http://nodesagency.com)

[![Follow Nodes PHP on Twitter](https://img.shields.io/twitter/follow/nodesphp.svg?style=social)](https://twitter.com/nodesphp) [![Tweet Nodes PHP](https://img.shields.io/twitter/url/http/nodesphp.svg?style=social)](https://twitter.com/nodesphp)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



