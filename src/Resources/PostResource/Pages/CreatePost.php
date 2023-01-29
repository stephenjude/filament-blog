<?php

namespace Illusive\Blog\Resources\PostResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illusive\Blog\Resources\PostResource;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
