<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Resources\PostResource;

uses(RefreshDatabase::class);

it('can render post list table', function () {
    $this->get(PostResource::getUrl('index'))->assertSuccessful();
});

it('can render post create form', function () {
    $this->get(PostResource::getUrl('create'))->assertSuccessful();
});

it('can render post edit form', function () {
    $this->get(PostResource::getUrl('edit', [
        'record' => Post::factory()->create(),
    ]))->assertSuccessful();
});
