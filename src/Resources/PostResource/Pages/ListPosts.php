<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Stephenjude\FilamentBlog\Resources\PostResource;
use Filament\Actions;


class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
