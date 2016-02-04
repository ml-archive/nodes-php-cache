<?php
if (!function_exists('cache_get')) {

    /**
     * Retrieve cache
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param  string|array|null $tags
     * @return mixed|null
     */
    function cache_get($cacheGroupKey, array $params = [], $tags = null)
    {
        return \NodesCache::get($cacheGroupKey, $params, $tags);
    }
}
if (!function_exists('cache_put')) {

    /**
     * Store cache
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param  mixed             $data
     * @param  string|array|null $tags
     * @return mixed
     */
    function cache_put($cacheGroupKey, array $params = [], $data, $tags = null)
    {
        return \NodesCache::put($cacheGroupKey, $params, $data, $tags);
    }
}

if (!function_exists('cache_forget')) {

    /**
     * Forget cache
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param  string|array|null $tags
     * @return boolean
     */
    function cache_forget($cacheGroupKey, array $params = [], $tags = null)
    {
        return \NodesCache::forget($cacheGroupKey, $params, $tags);
    }
}

if (!function_exists('cache_flush')) {

    /**
     * Flush cache tags
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param  string|array $tags
     * @return boolean
     */
    function cache_flush($tags)
    {
        return \NodesCache::flush($tags);
    }
}

if (!function_exists('cache_wipe')) {

    /**
     * Wipe entire cache
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return boolean
     */
    function cache_wipe()
    {
        return \NodesCache::wipe();
    }
}

if (!function_exists('cache_get_groups')) {

    /**
     * Retrieve all registered cache groups
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return array|null
     */
    function cache_get_groups()
    {
        return \NodesCache::getCacheGroups();
    }
}

if (!function_exists('cache_get_group')) {

    /**
     * Retrieve a registered cache group
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param string $cacheGroup
     * @return array|null
     */
    function cache_get_group($cacheGroup)
    {
        return \NodesCache::getCacheGroup($cacheGroup);
    }
}

if (!function_exists('cache_get_group_by_group_and_key')) {

    /**
     * Retrieve registered cache group by group and key
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @param  string $group
     * @param  string $key
     * @return array|null
     */
    function cache_get_group_by_group_and_key($group, $key)
    {
        return \NodesCache::getCacheGroupByGroupAndKey($group, $key);
    }
}

