<?php

namespace HanzoAsashi\LaravelBpjsBridging;

use HanzoAsashi\LaravelBpjsBridging\Commands\LaravelBpjsBridgingCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBpjsBridgingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-bpjs-bridging')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-bpjs-bridging_table')
            ->hasCommand(LaravelBpjsBridgingCommand::class);
    }
}
