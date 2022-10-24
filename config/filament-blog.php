<?php
return [

    /**
     * In your application you may have User model already existing
     * you can pass the user model class name to this option
     * and replace the default built-in Author model
     * with your custom User Model.
     */
    'author_model' => \Stephenjude\FilamentBlog\Models\Author::class,

    /**
     * This option let you add or remove resources that this package
     * expose as Blog section in to your filament admin sidebar
     * it is usefull when you want to use custom Author model
     * and, you want to hide the AuthorResource
     */
    'resources' => [
        Stephenjude\FilamentBlog\Resources\AuthorResource::class,
        Stephenjude\FilamentBlog\Resources\CategoryResource::class,
        Stephenjude\FilamentBlog\Resources\PostResource::class,
    ],
    /**
     * Supported content editors: richtext & markdown:
     *      \Filament\Forms\Components\RichEditor::class
     *      \Filament\Forms\Components\MarkdownEditor::class
     */
    'editor' => \Filament\Forms\Components\RichEditor::class,

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
