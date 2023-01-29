<?php

namespace Illusive\Blog\Resources\PostResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Illusive\Blog\Resources\PostResource;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;
}
