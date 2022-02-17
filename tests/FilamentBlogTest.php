<?php

use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Resources\PostResource;

it('can install blog migrations and configurations', function () {
    $this->artisan('filament-blog:install')
        ->expectsOutput('Publishing Blog Configuration...')
        ->expectsOutput('Publishing Filament Blog Migrations...')
        ->expectsOutput('Filament blog was installed successfully.')
        ->assertExitCode(0);
});
