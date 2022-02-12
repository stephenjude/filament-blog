<?php

namespace Stephenjude\FilamentBlog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stephenjude\FilamentBlog\Commands\FilamentBlogCommand;

class FilamentBlogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-blog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-blog_table')
            ->hasCommand(FilamentBlogCommand::class);
    }
}
