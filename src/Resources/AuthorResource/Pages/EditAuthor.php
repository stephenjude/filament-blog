<?php

namespace Stephenjude\FilamentBlog\Resources\AuthorResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Stephenjude\FilamentBlog\Resources\AuthorResource;
use Filament\Actions;

class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
