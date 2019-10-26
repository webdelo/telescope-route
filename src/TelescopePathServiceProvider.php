<?php
namespace src;

use App\Console\Commands\Telescope\TelescopeAuth;
use App\Console\Commands\Telescope\TelescopeRoute;
use Illuminate\Support\ServiceProvider;

class TelescopePathServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Helpers/telescope_helpers.php' => app_path('Helpers/telescope_helpers.php'),
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
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'skeleton');
    }
}
