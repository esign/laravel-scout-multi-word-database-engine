<?php

namespace Esign\ScoutMultiWordDatabaseEngine;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;

class ScoutMultiWordDatabaseEngineServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([$this->configPath() => config_path('scout-multi-word-database-engine.php')], 'config');
        }

        $this->app->make(EngineManager::class)->extend('multi-word-database', function () {
            return new ScoutMultiWordDatabaseEngine();
        });
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'scout-multi-word-database-engine');
    }

    protected function configPath(): string
    {
        return __DIR__ . '/../config/scout-multi-word-database-engine.php';
    }
}
