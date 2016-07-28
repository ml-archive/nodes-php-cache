<?php

namespace Nodes\Cache\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Cache.
 */
class Cache extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nodes.cache';
    }
}
