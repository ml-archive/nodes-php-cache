<?php

if (!function_exists('cache_remember')) {

    /**
     * Cache remember, both get and put in one go
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param          $cacheGroupKey
     * @param array    $params
     * @param null     $tags
     * @param \Closure $closure
     * @return mixed
     */
    function cache_remember($cacheGroupKey, array $params = [], $tags = null, \Closure $closure)
    {
        return app('nodes.cache')->remember($cacheGroupKey, $params, $tags, $closure);
    }
}

if (!function_exists('cache_get')) {

    /**
     * Retrieve cache.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param  string|array|null $tags
     * @return mixed|null
     */
    function cache_get($cacheGroupKey, array $params = [], $tags = null)
    {
        return app('nodes.cache')->get($cacheGroupKey, $params, $tags);
    }
}

if (!function_exists('cache_put')) {

    /**
     * Store cache.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param  mixed             $data
     * @param  string|array|null $tags
     * @return mixed
     */
    function cache_put($cacheGroupKey, array $params, $data, $tags = null)
    {
        return app('nodes.cache')->put($cacheGroupKey, $params, $data, $tags);
    }
}

if (!function_exists('cache_forget')) {

    /**
     * Forget cache.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param  string            $cacheGroupKey
     * @param  array             $params
     * @param  string|array|null $tags
     * @return bool
     */
    function cache_forget($cacheGroupKey, array $params = [], $tags = null)
    {
        return app('nodes.cache')->forget($cacheGroupKey, $params, $tags);
    }
}

if (!function_exists('cache_flush')) {

    /**
     * Flush cache tags.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param  string|array $tags
     * @return bool
     */
    function cache_flush($tags)
    {
        return app('nodes.cache')->flush($tags);
    }
}

if (!function_exists('cache_wipe')) {

    /**
     * Wipe entire cache.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @return bool
     */
    function cache_wipe()
    {
        return app('nodes.cache')->wipe();
    }
}

if (!function_exists('cache_get_groups')) {

    /**
     * Retrieve all registered cache groups.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @return array|null
     */
    function cache_get_groups()
    {
        return app('nodes.cache')->getCacheGroups();
    }
}

if (!function_exists('cache_get_group')) {

    /**
     * Retrieve a registered cache group.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param string $cacheGroup
     * @return array|null
     */
    function cache_get_group($cacheGroup)
    {
        return app('nodes.cache')->getCacheGroup($cacheGroup);
    }
}

if (!function_exists('cache_get_group_by_group_and_key')) {

    /**
     * Retrieve registered cache group by group and key.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @param  string $group
     * @param  string $key
     * @return array|null
     */
    function cache_get_group_by_group_and_key($group, $key)
    {
        return app('nodes.cache')->getCacheGroupByGroupAndKey($group, $key);
    }
}
