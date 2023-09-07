<?php

namespace Stephenjude\FilamentBlog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stephenjude\FilamentBlog\Commands\InstallCommand;
use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Stephenjude\FilamentBlog\Resources\PostResource;

class BlogServiceProvider extends PackageServiceProvider
{
    protected array $resources = [
        AuthorResource::class,
        CategoryResource::class,
        PostResource::class,
    ];

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
