<?php

namespace RalphMorris\LaravelRequestFilters;

use Illuminate\Support\ServiceProvider;

class LaravelRequestFiltersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \RalphMorris\LaravelRequestFilters\Commands\FilterMakeCommand::class
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
