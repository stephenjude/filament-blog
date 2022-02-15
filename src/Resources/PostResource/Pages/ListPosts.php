<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Stephenjude\FilamentBlog\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
}
