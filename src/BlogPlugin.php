<?php

namespace Stephenjude\FilamentBlog;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Stephenjude\FilamentBlog\Resources\PostResource;

class BlogPlugin implements Plugin
{
    use EvaluatesClosures;

    public Closure | bool $authorizedPost = true;

    public Closure | bool $authorizedAuthor = true;

    public Closure | bool $authorizedCategory = true;

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
            ->when(
                value: fn () => $this->authorizedPost(),
                callback: fn (Panel $panel) => $panel->resources([PostResource::class])
            )->when(
                value: fn () => $this->authorizedCategory(),
                callback: fn (Panel $panel) => $panel->resources([CategoryResource::class])
            )->when(
                value: fn () => $this->authorizedAuthor(),
                callback: fn (Panel $panel) => $panel->resources([AuthorResource::class])
            );
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public function authorizePost(Closure | bool $condition = true): static
    {
        $this->authorizedPost = $condition;

        return $this;
    }

    public function authorizedPost(): bool
    {
        return $this->evaluate($this->authorizedPost) === true;
    }

    public function authorizeCategory(Closure | bool $condition = true): static
    {
        $this->authorizedCategory = $condition;

        return $this;
    }

    public function authorizedCategory(): bool
    {
        return $this->evaluate($this->authorizedCategory) === true;
    }

    public function authorizeAuthor(Closure | bool $condition = true): static
    {
        $this->authorizedAuthor = $condition;

        return $this;
    }

    public function authorizedAuthor(): bool
    {
        return $this->evaluate($this->authorizedAuthor) === true;
    }
}
