<?php

namespace Esign\ScoutMultiWordDatabaseEngine\Tests;

use Esign\ScoutMultiWordDatabaseEngine\ScoutMultiWordDatabaseEngineServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Scout\ScoutServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ScoutServiceProvider::class,
            ScoutMultiWordDatabaseEngineServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    protected function setUpDatabase(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });
    }
}
