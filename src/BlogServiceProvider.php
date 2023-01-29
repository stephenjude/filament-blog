<?php

namespace Illusive\Blog;

use Filament\PluginServiceProvider;
use Illusive\Blog\Commands\InstallCommand;
use Illusive\Blog\Resources\AuthorResource;
use Illusive\Blog\Resources\CategoryResource;
use Illusive\Blog\Resources\PostResource;
use Spatie\LaravelPackageTools\Package;

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
            ->hasTranslations()
            ->hasCommand(InstallCommand::class)
            ->hasRoute('web')
            ->hasMigration('create_filament_blog_tables');

        $this->publishes([__DIR__.'/../resources/js/Pages' => resource_path('js/Pages')], 'vue-blog-pages');
    }
}
