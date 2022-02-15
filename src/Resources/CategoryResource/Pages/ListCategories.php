<?php

namespace Stephenjude\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Stephenjude\FilamentBlog\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;
}
