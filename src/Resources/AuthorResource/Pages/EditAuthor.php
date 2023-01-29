<?php

namespace Illusive\Blog\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Illusive\Blog\Resources\AuthorResource;

class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;
}
