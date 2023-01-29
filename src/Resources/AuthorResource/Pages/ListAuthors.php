<?php

namespace Illusive\Blog\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Illusive\Blog\Resources\AuthorResource;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;
}
