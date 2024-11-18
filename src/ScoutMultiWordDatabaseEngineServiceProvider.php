<?php

namespace Esign\ScoutMultiWordDatabaseEngine;

use Illuminate\Support\ServiceProvider;

class ScoutMultiWordDatabaseEngineServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([$this->configPath() => config_path('scout-multi-word-database-engine.php')], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'scout-multi-word-database-engine');

        $this->app->singleton('scout-multi-word-database-engine', function () {
            return new ScoutMultiWordDatabaseEngine;
        });
    }

    protected function configPath(): string
    {
        return __DIR__ . '/../config/scout-multi-word-database-engine.php';
    }
}
