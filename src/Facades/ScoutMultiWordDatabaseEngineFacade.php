<?php

namespace Esign\ScoutMultiWordDatabaseEngine\Facades;

use Illuminate\Support\Facades\Facade;

class ScoutMultiWordDatabaseEngineFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'scout-multi-word-database-engine';
    }
}
