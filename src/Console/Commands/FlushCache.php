<?php

namespace Nodes\Cache\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache as IlluminateCache;

/**
 * Class FlushCache
 * @author  Casper Rasmussen <cr@nodes.dk>
 *
 * @package Nodes\Cache\Console\Commands
 */
class FlushCache extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nodes:cache:flush';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush entire cache';

    /**
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function handle()
    {
        IlluminateCache::flush();
        $this->info('Cache is flushed');
    }
}
