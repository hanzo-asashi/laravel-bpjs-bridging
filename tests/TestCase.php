<?php

namespace HanzoAsashi\LaravelBpjsBridging\Tests;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridgingServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'HanzoAsashi\\LaravelBpjsBridging\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelBpjsBridgingServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-bpjs-bridging_table.php.stub';
        $migration->up();
        */
    }
}
