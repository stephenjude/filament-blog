<?php

namespace Stephenjude\FilamentBlog\Traits;

trait HasContentEditor
{
    public static function getContentEditor()
    {
        $defaultEditor = config('filament-blog.editor');

        return $defaultEditor::make('content')
            ->required()
            ->toolbarButtons(config('filament-blog.toolbar_buttons'))
            ->columnSpan([
                'sm' => 2,
            ]);
    }
}
