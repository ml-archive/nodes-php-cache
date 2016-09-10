<?php

namespace Nodes\Cache;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application service.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @return void
     */
    public function boot()
    {
        $this->publishGroups();
    }

    /**
     * Register service provider.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return void
     */
    public function register()
    {
        $this->registerCacheRepository();
    }

    /**
     * Register publish groups.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @return void
     */
    protected function publishGroups()
    {
        // Config files
        $this->publishes([
            __DIR__.'/../config/cache.php' => config_path('nodes/cache.php'),
        ], 'config');
    }

    /**
     * registerCacheRepository.
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     *
     * @return void
     */
    protected function registerCacheRepository()
    {
        $this->app->singleton('nodes.cache', function ($app) {
            return new Repository(config('nodes.cache'));
        });
    }
}
