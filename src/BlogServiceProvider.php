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
    public function __construct($app, protected array $resources)
    {
        parent::__construct($app);
        $this->resources = config('filametn-blog.resources', [
            AuthorResource::class,
            CategoryResource::class,
            PostResource::class,
        ]);
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
