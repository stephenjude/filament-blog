<?php

namespace Stephenjude\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Stephenjude\FilamentBlog\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
