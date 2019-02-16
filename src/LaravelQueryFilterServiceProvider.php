<?php

namespace RalphMorris\LaravelQueryFilter;

use Illuminate\Support\ServiceProvider;

class LaravelQueryFilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \RalphMorris\LaravelQueryFilter\Commands\FilterMakeCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // 
    }
}
