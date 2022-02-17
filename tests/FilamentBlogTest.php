<?php

use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Resources\PostResource;

it('can render blog pages', function () {
    $this->get(PostResource::getUrl('create'))->assertSuccessful();
});
//
//it('can create blog post', function () {
//    $newData = Post::factory()->make();
//
//    livewire(PostResource\Pages\CreatePost::class)
//        ->set('data.author_id', $newData->author->getKey())
//        ->set('data.content', $newData->content)
//        ->set('data.tags', $newData->tags)
//        ->set('data.title', $newData->title)
//        ->call('create');
//
//    $this->assertDatabaseHas(Post::class, [
//        'author_id' => $newData->author->getKey(),
//        'content' => $newData->content,
//        'tags' => json_encode($newData->tags),
//        'title' => $newData->title,
//    ]);
//});


