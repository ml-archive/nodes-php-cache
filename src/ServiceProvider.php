<?php
namespace Nodes\Cache;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Nodes\Cache\Console\Commands\FlushCache;

/**
 * Class ServiceProvider
 * @author  Casper Rasmussen <cr@nodes.dk>
 *
 * @package Nodes\Cache
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * register
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return void
     */
    public function register()
    {
        $this->registerCacheRepository();
        $this->app['commands.nodes.cache.flush'] = $this->app->share(
            function ($app) {
                return new FlushCache();
            }
        );

        $this->commands('commands.nodes.cache.flush');
    }

    /**
     * registerCacheRepository
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return void
     */
    protected function registerCacheRepository()
    {
        $this->app->singleton('nodes.cache', function($app) {
            return new Repository(config('nodes.cache'));
        });
    }
}