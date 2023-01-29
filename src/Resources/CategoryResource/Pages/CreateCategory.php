<?php

namespace Illusive\Blog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illusive\Blog\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
