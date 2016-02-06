<?php
namespace Nodes\Cache;

use Nodes\AbstractServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Nodes\Cache
 */
class ServiceProvider extends AbstractServiceProvider
{
    /**
     * Package name
     *
     * @var string
     */
    protected $package = 'cache';

    /**
     * Facades to install
     *
     * @var array
     */
    protected $facades = [
        'NodesCache' => \Nodes\Cache\Support\Facades\Cache::class
    ];

    /**
     * Artisan commands to register
     *
     * @var array
     */
    protected $commands = [
        \Nodes\Cache\Console\Commands\FlushCache::class
    ];

    /**
     * Array of configs to copy
     *
     * @var array
     */
    protected $configs = [
        'config/cache.php' => 'config/nodes/cache.php'
    ];

    /**
     * Register service provider
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @access public
     * @return void
     */
    public function register()
    {
        parent::register();
        $this->registerCacheRepository();
    }

    /**
     * registerCacheRepository
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @access protected
     * @return void
     */
    protected function registerCacheRepository()
    {
        $this->app->singleton('nodes.cache', function($app) {
            return new Repository(config('nodes.cache'));
        });
    }
}