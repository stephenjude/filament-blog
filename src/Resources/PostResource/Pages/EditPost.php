<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Stephenjude\FilamentBlog\Resources\PostResource;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;
}
