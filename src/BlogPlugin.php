<?php

namespace Stephenjude\FilamentBlog;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Stephenjude\FilamentBlog\Resources\PostResource;

class BlogPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function getId(): string
    {
        return 'filament-blog';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                AuthorResource::class,
                CategoryResource::class,
                PostResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
