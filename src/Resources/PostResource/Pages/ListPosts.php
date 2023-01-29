<?php

namespace Illusive\Blog\Resources\PostResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Illusive\Blog\Resources\PostResource;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
}
