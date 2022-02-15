<?php

namespace Stephenjude\FilamentBlog\Resources\CategoryResource\Pages;

use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;
}
