<?php
namespace Nodes\Cache\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Cache
 * 
 * @package Nodes\Cache\Support\Facades
 */
class Cache extends Facade
{
    /**
     * Get the registered name of the component
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @access protected
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nodes.cache';
    }
}
