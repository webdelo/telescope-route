<?php
namespace Webdelo\TelescopeRoute;

use Illuminate\Support\ServiceProvider;
use Webdelo\TelescopeRoute\Console\Commands\Telescope\TelescopeRouteRefresh;
use Webdelo\TelescopeRoute\Console\Commands\Telescope\TelescopeRoute;
use Webdelo\TelescopeRoute\Contracts\TelescopeRouteServiceContract;
use Webdelo\TelescopeRoute\Services\TelescopeRouteService;

class TelescopeRouteServiceProvider extends ServiceProvider
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
                TelescopeRouteRefresh::class,
                TelescopeRoute::class
            ]);
        }
    }
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(TelescopeRouteServiceContract::class, TelescopeRouteService::class);
    }
}
