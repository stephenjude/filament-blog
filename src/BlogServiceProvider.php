<?php

namespace Stephenjude\FilamentBlog;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
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

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-blog')
            ->hasConfigFile()
            ->hasMigrations([
                'create_blog_authors_table',
                'create_blog_categories_table',
                'create_blog_posts_table',
            ]);
    }
}
