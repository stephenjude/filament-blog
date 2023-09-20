<?php

use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Resources\AuthorResource;

use function Pest\Livewire\livewire;

it('can list', function () {
    $authors = Author::factory()->count(10)->create();

    livewire(AuthorResource\Pages\ListAuthors::class)
        ->assertCanSeeTableRecords($authors);
});

it('can create', function () {
    $newData = Author::factory()->make();

    livewire(AuthorResource\Pages\CreateAuthor::class)
        ->fillForm([
            'name' => $newData->name,
            'email' => $newData->email,
            'bio' => $newData->bio,
            'github_handle' => $newData->github_handle,
            'twitter_handle' => $newData->twitter_handle,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Author::class, [
        'name' => $newData->name,
        'email' => $newData->email,
        'bio' => $newData->bio,
        'github_handle' => $newData->github_handle,
        'twitter_handle' => $newData->twitter_handle,
    ]);
});

it('can retrieve data', function () {
    $author = Author::factory()->create();

    livewire(AuthorResource\Pages\EditAuthor::class, [
        'record' => $author->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $author->name,
            'email' => $author->email,
            'bio' => $author->bio,
            'github_handle' => $author->github_handle,
            'twitter_handle' => $author->twitter_handle,
        ]);
});
