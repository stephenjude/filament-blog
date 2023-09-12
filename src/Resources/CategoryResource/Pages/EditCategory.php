<?php

namespace Stephenjude\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Stephenjude\FilamentBlog\Resources\CategoryResource;
use Filament\Actions;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
