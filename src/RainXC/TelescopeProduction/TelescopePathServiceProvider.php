<?php
namespace RainXC\TelescopeProduction;

use Illuminate\Support\ServiceProvider;
use RainXC\TelescopeProduction\Console\Commands\Telescope\TelescopeAuth;
use RainXC\TelescopeProduction\Console\Commands\Telescope\TelescopeRoute;

class TelescopePathServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Helpers/telescope_helpers.php' => app_path('Helpers/telescope_helpers.php'),
            ], 'helpers');

            $this->commands([
                TelescopeAuth::class,
                TelescopeRoute::class
            ]);
        }
    }
    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
