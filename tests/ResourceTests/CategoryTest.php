<?php

use Illusive\Blog\Models\Category;
use Illusive\Blog\Resources\CategoryResource;

it('can render category list table', function () {
    $this->get(CategoryResource::getUrl('index'))->assertSuccessful();
});

it('can render category create form', function () {
    $this->get(CategoryResource::getUrl('create'))->assertSuccessful();
});

it('can render category edit form', function () {
    $this->get(CategoryResource::getUrl('edit', [
        'record' => Category::factory()->create(),
    ]))->assertSuccessful();
});
