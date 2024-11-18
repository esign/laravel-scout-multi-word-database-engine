<?php

namespace Esign\ScoutMultiWordDatabaseEngine\Tests;

use Esign\ScoutMultiWordDatabaseEngine\ScoutMultiWordDatabaseEngineServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [ScoutMultiWordDatabaseEngineServiceProvider::class];
    }
} 