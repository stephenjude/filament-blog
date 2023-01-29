<?php

namespace Illusive\Blog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Illusive\Blog\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;
}
