<?php

namespace Stephenjude\FilamentBlog\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Filament\Actions;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
