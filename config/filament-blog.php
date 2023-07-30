<?php

return [

    /**
     * Supported content editors: richtext & markdown:
     *      \Filament\Forms\Components\RichEditor::class
     *      \Filament\Forms\Components\MarkdownEditor::class
     */
    'editor' => \Filament\Forms\Components\RichEditor::class,

    /**
     * Configs for Posts banner file that give you option to change
     * Disk,Directory name , maximum upload size and the
     * Crop aspect ratio of the Posts banner image.
     */
    'banner' => [
        'disk' => 'public',
        'directory' => 'blog',
        'maxSize' => 5120,
        'cropAspectRatio' => '16:9',
    ],

    /**
     * Configs for Posts that give you option to change
     * the sort column and direction of the Posts.
     */
    'sort' => [
        'column' => 'published_at',
        'direction' => 'asc',
    ],

    /**
     * Configs for Author Avatar file that give you option to change
     * Disk,Directory name , maximum upload size and the
     * Of the Author avatar image.
     */
    'avatar' => [
        'disk' => 'public',
        'directory' => 'blog',
        'maxSize' => 5120,
    ],

    /**
     * Buttons for text editor toolbar.
     */
    'toolbar_buttons' => [
        'attachFiles',
        'blockquote',
        'bold',
        'bulletList',
        'codeBlock',
        'h2',
        'h3',
        'italic',
        'link',
        'orderedList',
        'redo',
        'strike',
        'undo',
    ],
];
