<?php

use Stephenjude\FilamentBlog\Models\Category;
use Stephenjude\FilamentBlog\Resources\CategoryResource;

it('can render author list table', function () {
    $this->get(CategoryResource::getUrl('index'))->assertSuccessful();
});

it('can render author create form', function () {
    $this->get(CategoryResource::getUrl('create'))->assertSuccessful();
});

it('can render author edit form', function () {
    $this->get(CategoryResource::getUrl('edit', [
        'record' => Category::factory()->create()
    ]))->assertSuccessful();
});


