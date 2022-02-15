<?php

namespace Stephenjude\FilamentBlog\Resources\AuthorResource\Pages;

use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Filament\Resources\Pages\ListRecords;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;
}
