<?php
if (!function_exists('cache_get')) {

    /**
     * cache_get
     *
     * @author Casper Rasmussen <cr@nodes.dk>
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
     * cache_put
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param                    $data
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
     * cache_forget
     *
     * @author Casper Rasmussen <cr@nodes.dk>
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
     * cache_flush
     *
     * @author Casper Rasmussen <cr@nodes.dk>
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
     * cache_wipe
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @return boolean
     */
    function cache_wipe()
    {
        return \NodesCache::wipe();
    }
}

if (!function_exists('cache_get_groups')) {

    /**
     * cache_get_group
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @return array|null
     */
    function cache_get_groups()
    {
        return \NodesCache::getCacheGroups();
    }
}

if (!function_exists('cache_get_group')) {

    /**
     * cache_get_group
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param $cacheGroup
     * @return array|null
     */
    function cache_get_group($cacheGroup)
    {
        return \NodesCache::getCacheGroup($cacheGroup);
    }
}

if (!function_exists('cache_get_group_by_group_and_key')) {

    /**
     * cache_get_group_by_group_and_key
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param $group
     * @param $key
     * @return array|null
     */
    function cache_get_group_by_group_and_key($group, $key)
    {
        return \NodesCache::getCacheGroupByGroupAndKey($group, $key);
    }
}

