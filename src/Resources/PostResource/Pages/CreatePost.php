<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Stephenjude\FilamentBlog\Resources\PostResource;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
