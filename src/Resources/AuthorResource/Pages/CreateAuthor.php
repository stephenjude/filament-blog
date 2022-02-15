<?php

namespace Stephenjude\FilamentBlog\Resources\AuthorResource\Pages;

use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
