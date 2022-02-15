<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Stephenjude\FilamentBlog\Resources\PostResource;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
}
