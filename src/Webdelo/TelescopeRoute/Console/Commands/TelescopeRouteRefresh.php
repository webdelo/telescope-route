<?php

namespace Webdelo\TelescopeRoute\Console\Commands\Telescope;

use Illuminate\Console\Command;
use Webdelo\TelescopeRoute\Contracts\TelescopeRouteServiceContract;

/**
 * Make authorization key for telescope view
 *
 * Syntax:
 * php artisan telescope:auth
 *
 * Class TelescopeAuth
 *
 * @package App\Console\Commands\Telescope
 */
class TelescopeRouteRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "
        telescope:route-refresh
    ";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Make authorization key for telescope view";

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
     * @param TelescopeRouteServiceContract $service
     *
     * @return bool
     */
    public function handle(TelescopeRouteServiceContract $service)
    {
        try {
            $key = $service->generate();
            $this->call('config:cache');
            $route = route('telescope');

            $this->info("Telescope auth key: {$key} ");
            $this->info("Telescope auth route: {$route} ");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return false;
        }

        return true;
    }
}
