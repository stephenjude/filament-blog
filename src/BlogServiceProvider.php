<?php

namespace Stephenjude\FilamentBlog;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Stephenjude\FilamentBlog\Commands\InstallCommand;
use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Stephenjude\FilamentBlog\Resources\PostResource;

class BlogServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        AuthorResource::class,
        CategoryResource::class,
        PostResource::class,
    ];

    protected function getResources(): array
    {
        return count(config('filament-blog.resources'))>0? config('filament-blog.resources'): $this->resources;
    }

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
