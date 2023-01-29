<?php

use Illusive\Blog\Models\Author;
use Illusive\Blog\Resources\AuthorResource;

it('can render author list table', function () {
    $this->get(AuthorResource::getUrl('index'))->assertSuccessful();
});

it('can render author create form', function () {
    $this->get(AuthorResource::getUrl('create'))->assertSuccessful();
});

it('can render author edit form', function () {
    $this->get(AuthorResource::getUrl('edit', [
        'record' => Author::factory()->create(),
    ]))->assertSuccessful();
});
