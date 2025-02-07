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
        $this->publishes([
            __DIR__.'/../config/file-flux.php' => config_path('file-flux.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/file-flux.php', 'file-flux');

        // Register the main class to use with the facade
        $this->app->singleton('file-flux', function () {
            return new FileFlux;
        });
    }
}
