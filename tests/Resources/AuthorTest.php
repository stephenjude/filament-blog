<?php

use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Resources\AuthorResource;

it('can render author list table', function () {
    $this->get(AuthorResource::getUrl('index'))->assertSuccessful();
});

it('can render author create form', function () {
    $this->get(AuthorResource::getUrl('create'))->assertSuccessful();
});

it('can render author edit form', function () {
    $this->get(AuthorResource::getUrl('edit', [
        'record' => Author::factory()->create()
    ]))->assertSuccessful();
});


