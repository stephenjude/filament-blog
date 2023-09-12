<?php

namespace Stephenjude\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Filament\Actions;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
