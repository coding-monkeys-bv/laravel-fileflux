<?php

namespace Codingmonkeys\FileFlux;

use Illuminate\Support\ServiceProvider;

class FileFluxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/fileflux.php' => config_path('fileflux.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/fileflux.php', 'fileflux');

        // Register the main class to use with the facade
        $this->app->singleton('fileflux', function () {
            return new FileFlux;
        });
    }
}
