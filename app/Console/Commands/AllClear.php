<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class allClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'all-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cash all clear for cache, config, route and view';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$cache = \Artisan::call('cache:clear');
		$config = \Artisan::call('config:clear');
		$route = \Artisan::call('route:clear');
		$view = \Artisan::call('view:clear');

        if (0 == $cache ) {
            $this->info('Application cache cleared!');
        }
        if (0 == $config ) {
            $this->info('Configuration cache cleared!');
        }
        if (0 == $route ) {
            $this->info('Route cache cleared!');
        }
        if (0 == $view ) {
            $this->info('Compiled views cleared!');
        }
    }
}