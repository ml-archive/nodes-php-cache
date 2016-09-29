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
[![StyleCI](https://styleci.io/repos/45786070/shield)](https://styleci.io/repos/45786070)

## 📝 Introduction

One thing we at [Nodes](http://nodesagency.com) have been missing a lot in [Laravel](http://laravel.com/docs) is more structure of managing caches.
 
We've come up with a more flexible and structured way of managing caches and their lifetime. Also we've created a few helper methods to make it all a bit easier and awesome.

## 📦 Installation
To install this package you will need:

* Laravel 5.1+
* PHP 5.5.9+

You must then modify your `composer.json` file and run `composer update` to include the latest version of the package in your project.

```json
"require": {
    "nodes/cache": "^1.0"
}
```

Or you can run the composer require command from your terminal.

```bash
composer require nodes/cache:^1.0
```

## 🔧 Setup

Setup service provider in `config/app.php`

```php
Nodes\Cache\ServiceProvider::class
```

Setup alias in `config/app.php`

```php
'NodesCache' => Nodes\Cache\Support\Facades\Cache::class
```

Publish config file

```bash
php artisan vendor:publish --provider="Nodes\Cache\ServiceProvider"
```

If you want to overwrite any existing config files use the `--force` parameter

```bash
php artisan vendor:publish --provider="Nodes\Cache\ServiceProvider" --force
```

## ⚙ Usage

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

## Examples

First important thing is to create the config for you new cache group

```
    'groups'   => [
        /*
        |--------------------------------------------------------------------------
        | Project
        |--------------------------------------------------------------------------
        |
        | Cache settings used by your project.
        |
        */
        'geographic' => [
            'continent.bySlug' => [
                'active'   => true,
                'key'      => 'geographic-continent-by-slug',
                'lifetime' => 3600,
            ],

...
```

Will give you a $cacheGroup `geographic.continent.bySlug`
Remember to make the key unique to avoid conflicts

### Remember
Remember is a way to both get and put to cache, 95% of cases this will be the right choice

```
  return cache_remember('geographic.continent.bySlug', ['slug' => $slug], function () use ($slug) {

                // Look up in db
                $continent = $this->where('slug', $slug)->first();

                if (!$continent) {
                    throw new EntityNotFoundException(sprintf('Could not find continent with slug [%s]', $slug));
                }

                return $continent;
            });
```

This way we start by looking in cache, if data if found it will be returned. Else the closure will run where we look up the data in db and return. Returning it in closure will then cache it and return it.



## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes](http://nodesagency.com)

[![Follow Nodes PHP on Twitter](https://img.shields.io/twitter/follow/nodesphp.svg?style=social)](https://twitter.com/nodesphp) [![Tweet Nodes PHP](https://img.shields.io/twitter/url/http/nodesphp.svg?style=social)](https://twitter.com/nodesphp)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

