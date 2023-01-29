<?php

namespace Illusive\Blog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Illusive\Blog\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;
}
