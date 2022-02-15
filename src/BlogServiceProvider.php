<?php

namespace Stephenjude\Blog;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Stephenjude\FilamentBlog\Commands\BlogCommand;

class BlogServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-blog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-blog_table')
            ->hasCommand(BlogCommand::class);
    }
}
