<?php

namespace Stephenjude\FilamentBlog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stephenjude\FilamentBlog\Commands\InstallCommand;

class BlogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-blog')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasCommand(InstallCommand::class)
            ->hasMigration('create_filament_blog_tables');
    }
}
