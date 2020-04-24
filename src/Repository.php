<?php

namespace Nodes\Cache;

use Closure;
use Illuminate\Cache\TaggableStore;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache as IlluminateCache;
use Nodes\Cache\Exceptions\CacheException;
use Throwable;

/**
 * Class Repository.
 */
class Repository
{
    /**
     * Cache config.
     *
     * @var array
     */
    protected $config;

    /**
     * Cache groups.
     *
     * @var array
     */
    protected $cacheGroups = [];

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        // Setup cache groups
        $cacheGroups = Arr::pull($config, 'groups');
        $this->setupCacheGroups($cacheGroups);

        // Set cache config
        $this->config = $config;
    }

    /**
     * remember.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param              $cacheGroup
     * @param array        $params
     * @param null         $tags
     * @param Closure|null $closure
     * 
     * @throws CacheException
     *
     * @return mixed|null
     */
    public function remember($cacheGroup, array $params = [], $tags = null, Closure $closure = null)
    {
        $data = $this->get($cacheGroup, $params, $tags);

        // Exactly null should be only case we do not accept currently cached data
        if (!is_null($data)) {
            return $data;
        }

        if ($closure) {
            $callbackData = call_user_func($closure);

            if ($callbackData) {
                $this->put($cacheGroup, $params, $callbackData, $tags);
            }

            return $callbackData;
        }

        throw new CacheException();
    }

    /**
     * Retrieve cache.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param string            $cacheGroupKey
     * @param array             $params
     * @param string|array|null $tags
     *
     * @return mixed|null
     */
    public function get($cacheGroupKey, array $params = [], $tags = null)
    {
        // Make sure caching is enabled
        if (!$this->isCachingEnabled()) {
            return null;
        }

        // Retrieve cache group settings
        $cacheGroup = $this->getCacheGroup($cacheGroupKey);

        // Set cache tag to group name
        if (!$tags) {
            $tags = $cacheGroupKey;
        }

        if (empty($cacheGroup) || (empty($cacheGroup['active']) || empty($cacheGroup['key']))) {
            return null;
        }

        // Generate cache key
        $cacheKey = $this->generateCacheKey($cacheGroup['key'], $params);

        $cacheStore = IlluminateCache::getStore();
        if ($cacheStore instanceof TaggableStore) {
            return $cacheStore->tags($tags)->get($cacheKey);
        }

        return null;
    }

    /**
     * Write to cache.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param string            $cacheGroupKey
     * @param array             $params
     * @param mixed             $data
     * @param string|array|null $tags
     *
     * @return bool
     */
    public function put($cacheGroupKey, array $params, $data, $tags = ['default'])
    {
        // Make sure caching is enabled
        if (!$this->isCachingEnabled()) {
            return false;
        }

        // Retrieve cache group settings
        $cacheGroup = $this->getCacheGroup($cacheGroupKey);

        // Set cache tag to group name
        if (!$tags) {
            $tags = $cacheGroupKey;
        }

        if (empty($cacheGroup) || (empty($cacheGroup['active']) || empty($cacheGroup['key']))) {
            return false;
        }

        // Generate cache key
        $cacheKey = $this->generateCacheKey($cacheGroup['key'], $params);

        // Make sure we have an array of tags
        if (!is_array($tags)) {
            $tags = [$tags];
        }

        try {
            $cacheStore = IlluminateCache::getStore();

            if ($cacheStore instanceof TaggableStore) {
                return $cacheStore->tags($tags)->put($cacheKey, $data, $cacheGroup['lifetime'] ?: $this->config['lifetime']);
            }

            throw new CacheException();
        } catch (Throwable $e) {
            cache_wipe();
        }

        return false;
    }

    /**
     * Delete cache.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param string            $cacheGroupKey
     * @param array             $params
     * @param string|array|null $tags
     *
     * @return bool
     */
    public function forget($cacheGroupKey, array $params = [], $tags = null): bool
    {
        // Make sure caching is enabled
        if (!$this->isCachingEnabled()) {
            return false;
        }

        // Retrieve cache group settings
        $cacheGroup = $this->getCacheGroup($cacheGroupKey);

        // Set cache tag to group name
        if (!$tags) {
            $tags = $cacheGroupKey;
        }

        if (empty($cacheGroup) || (empty($cacheGroup['active']) || empty($cacheGroup['key']))) {
            return false;
        }

        // Generate cache key
        $cacheKey = $this->generateCacheKey($cacheGroup['key'], $params);

        $cacheStore = IlluminateCache::getStore();

        if ($cacheStore instanceof TaggableStore) {
            return $cacheStore->tags($tags)->forget($cacheKey);
        }

        return false;
    }

    /**
     * Flush cache by list of tags.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param array|string $tags
     *
     * @return bool
     */
    public function flush($tags): bool
    {
        $cacheStore = IlluminateCache::getStore();

        if ($cacheStore instanceof TaggableStore) {
            return $cacheStore->tags($tags)->flush();
        }

        return false;
    }

    /**
     * Flush entire cache.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @return bool
     */
    public function wipe(): bool
    {
        return IlluminateCache::getStore()->flush();
    }

    /**
     * Retrieve cache group.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param string $cacheGroup
     *
     * @return array|null
     */
    public function getCacheGroup($cacheGroup)
    {
        return !empty($this->cacheGroups[$cacheGroup]) ? $this->cacheGroups[$cacheGroup] : null;
    }

    /**
     * Retrieve available cache groups.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @return array
     */
    public function getCacheGroups()
    {
        return $this->cacheGroups;
    }

    /**
     * Retrieve cache group by group and key.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param string $group
     * @param string $key
     *
     * @return array|null
     */
    public function getCacheGroupByGroupAndKey($group, $key)
    {
        $cacheGroupName = $group.'.'.$key;

        return $this->getCacheGroup($cacheGroupName);
    }

    /**
     * Generate cache key.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param string       $key
     * @param string|array $params
     *
     * @return string
     */
    private function generateCacheKey($key, $params)
    {
        // If our parameters is an array
        // we need to do some work to it.
        if (is_array($params)) {
            // Sort array and maintain index
            asort($params);

            // Convert array to a query string
            $params = http_build_query($params);
        }

        return $key.'|'.$params;
    }

    /**
     * Setup cache groups.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param array $groups
     *
     * @return void
     */
    private function setupCacheGroups(array $groups)
    {
        foreach ($groups as $group => $keys) {
            // If $keys is not an array, something is wrong
            // with the structure in the config file
            // and we'll just skip it.
            if (!is_array($keys)) {
                continue;
            }

            foreach ($keys as $key => $settings) {
                // Generate group name
                $groupName = $group.'.'.$key;

                // Make sure tag name doesn't already exists.
                // If it does, we'll keep the first one adde
                // and skip all other ones.
                if (array_key_exists($groupName, $this->cacheGroups)) {
                    continue;
                }

                // Add tag to our tags container
                $this->cacheGroups[$groupName] = $settings;
            }
        }
    }

    /**
     * Check if caching is enabled.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @return bool
     */
    protected function isCachingEnabled()
    {
        return (bool) $this->config['enabled'];
    }
}
