<?php

use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Resources\PostResource;

use function Pest\Livewire\livewire;

it('can list', function () {
    $posts = Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts);
});

it('can create', function () {
    $newData = Post::factory()->make();

    $this->assertDatabaseHas(Author::class, [
        'name' => $newData->author->name,
        'email' => $newData->author->email,
    ]);

    livewire(PostResource\Pages\CreatePost::class)
        ->fillForm([
            'title' => $newData->title,
            'slug' => $newData->slug,
            'excerpt' => $newData->excerpt,
            'content' => $newData->content,
            'blog_author_id' => $newData->author->getKey(),
            'blog_category_id' => $newData->category->getKey(),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Post::class, [
        'title' => $newData->title,
        'slug' => $newData->slug,
        'excerpt' => $newData->excerpt,
        'content' => $newData->content,
        'blog_author_id' => $newData->author->getKey(),
        'blog_category_id' => $newData->category->getKey(),
    ]);
});

it('can retrieve data', function () {
    $post = Post::factory()->create();

    livewire(PostResource\Pages\EditPost::class, [
        'record' => $post->getRouteKey(),
    ])
        ->assertFormSet([
            'title' => $post->title,
            'slug' => $post->slug,
            'excerpt' => $post->excerpt,
            'content' => $post->content,
        ]);
});
