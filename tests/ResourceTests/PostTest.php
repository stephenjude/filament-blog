<?php

use Illusive\Blog\Models\Post;
use Illusive\Blog\Resources\PostResource;

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
