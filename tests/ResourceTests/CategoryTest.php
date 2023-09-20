<?php

use Illuminate\Support\Str;
use Stephenjude\FilamentBlog\Models\Category;
use Stephenjude\FilamentBlog\Resources\CategoryResource;

use function Pest\Livewire\livewire;

it('can list', function () {
    $categories = Category::factory()->count(10)->create();

    livewire(CategoryResource\Pages\ListCategories::class)
        ->assertCanSeeTableRecords($categories);
});

it('can create', function () {
    $newData = Category::factory()->make();

    livewire(CategoryResource\Pages\CreateCategory::class)
        ->fillForm([
            'name' => $newData->name,
            'description' => $newData->description,
            'is_visible' => $newData->is_visible,
        ])
        ->assertFormSet([
            'slug' => Str::slug($newData->name),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Category::class, [
        'name' => $newData->name,
        'slug' => $newData->slug,
        'description' => $newData->description,
        'is_visible' => $newData->is_visible,
    ]);
});

it('can retrieve data', function () {
    $category = Category::factory()->create();

    livewire(CategoryResource\Pages\EditCategory::class, [
        'record' => $category->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $category->name,
            'slug' => $category->slug,
            'description' => $category->description,
            'is_visible' => $category->is_visible,
        ]);
});
