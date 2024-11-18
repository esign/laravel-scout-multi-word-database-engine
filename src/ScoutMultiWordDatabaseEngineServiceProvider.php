<?php

namespace Esign\ScoutMultiWordDatabaseEngine;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;

class ScoutMultiWordDatabaseEngineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->make(EngineManager::class)->extend('multi-word-database', function () {
            return new ScoutMultiWordDatabaseEngine();
        });
    }
}
