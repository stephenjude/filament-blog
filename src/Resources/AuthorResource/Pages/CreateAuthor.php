<?php

namespace Stephenjude\FilamentBlog\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Stephenjude\FilamentBlog\Resources\AuthorResource;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
