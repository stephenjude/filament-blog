<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Stephenjude\FilamentBlog\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
