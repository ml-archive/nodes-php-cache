<?php
if (!function_exists('cache_get')) {

    /**
     * cache_get
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param       $cacheGroup
     * @param array $params
     * @param array $tags
     * @return mixed|null
     */
    function cache_get($cacheGroup, array $params = [], $tags = ['default'])
    {
        return \NodesCache::get($cacheGroup, $params, $tags);
    }
}
if (!function_exists('cache_put')) {

    /**
     * cache_put
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param       $cacheGroup
     * @param array $params
     * @param       $data
     * @param array $tags
     * @return mixed
     */
    function cache_put($cacheGroup, array $params = [], $data, $tags = ['default'])
    {
        return \NodesCache::put($cacheGroup, $params, $data, $tags);
    }
}

if (!function_exists('cache_forget')) {

    /**
     * cache_forget
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param       $cacheGroup
     * @param array $params
     * @param array $tags
     * @return boolean
     */
    function cache_forget($cacheGroup, array $params = [], $tags = ['default'])
    {
        return \NodesCache::forget($cacheGroup, $params, $tags);
    }
}

if (!function_exists('cache_flush')) {

    /**
     * cache_flush
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param array $tags
     * @return boolean
     */
    function cache_flush($tags = ['default'])
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

