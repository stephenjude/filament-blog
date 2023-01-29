<?php

namespace Illusive\Blog\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illusive\Blog\Resources\AuthorResource;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
