<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Stephenjude\FilamentBlog\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;
}
