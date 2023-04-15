<?php

namespace Frameck\LaravelQueryDateHelpers;

use Frameck\LaravelQueryDateHelpers\Commands\LaravelQueryDateHelpersCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelQueryDateHelpersServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        if (config('query-date-helpers.register_macros')) {
            LaravelQueryDateHelpers::registerMacros();
        }
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-query-date-helpers')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-query-date-helpers_table')
            ->hasCommand(LaravelQueryDateHelpersCommand::class);
    }
}
