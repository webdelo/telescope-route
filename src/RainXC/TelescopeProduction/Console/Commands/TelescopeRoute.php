<?php

namespace RainXC\TelescopeProduction\Console\Commands\Telescope;

use Illuminate\Console\Command;

/**
 * Make authorization key for telescope view
 *
 * Syntax:
 * php artisan telescope:route
 *
 * Class TelescopeRoute
 *
 * @package App\Console\Commands\Telescope
 */
class TelescopeRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "
        telescope:route
    ";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Get url to telescope dashboard";

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
     * @return bool
     */
    public function handle()
    {
        try {
            $route = route('telescope');
            $this->info("Telescope auth route: {$route} ");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return false;
        }

        return true;
    }
}
