<?php

namespace Stephenjude\FilamentBlog\Resources;

use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Resources\AuthorResource\Pages;
use Stephenjude\FilamentBlog\Traits\HasContentEditor;
use UnitEnum;

class AuthorResource extends Resource
{
    use HasContentEditor;

    protected static ?string $model = Author::class;

    protected static ?string $slug = 'blog/authors';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | null | UnitEnum $navigationGroup = 'Blog';

    protected static string | null | BackedEnum $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('filament-blog::filament-blog.name'))
                            ->required(),
                        TextInput::make('email')
                            ->label(__('filament-blog::filament-blog.email'))
                            ->required()
                            ->email()
                            ->unique(Author::class, 'email', fn ($record) => $record),
                        FileUpload::make('photo')
                            ->label(__('filament-blog::filament-blog.photo'))
                            ->image()
                            ->disk(config('filament-blog.avatar.disk', 'public'))
                            ->visibility(config('filament-blog.avatar.visibility', 'public'))
                            ->maxSize(config('filament-blog.avatar.maxSize', 5120))
                            ->directory(config('filament-blog.avatar.directory', 'blog'))
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        self::getContentEditor('bio'),
                        TextInput::make('github_handle')
                            ->label(__('filament-blog::filament-blog.github')),
                        TextInput::make('twitter_handle')
                            ->label(__('filament-blog::filament-blog.twitter')),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan(2),
                Section::make()
                    ->schema([
                        TextEntry::make('created_at')
                            ->default('—')
                            ->label(__('filament-blog::filament-blog.created_at'))
                            ->state(fn (?Author $record) => $record?->created_at?->diffForHumans()),
                        TextEntry::make('updated_at')
                            ->default('—')
                            ->label(__('filament-blog::filament-blog.last_modified_at'))
                            ->state(fn (?Author $record) => $record?->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->disk(config('filament-blog.avatar.disk', 'public'))
                    ->visibility(config('filament-blog.banner.visibility', 'public'))
                    ->label(__('filament-blog::filament-blog.photo'))
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-blog::filament-blog.name'))
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament-blog::filament-blog.email'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('github_handle')
                    ->label(__('filament-blog::filament-blog.github')),
                Tables\Columns\TextColumn::make('twitter_handle')
                    ->label(__('filament-blog::filament-blog.twitter')),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-blog::filament-blog.authors');
    }

    public static function getModelLabel(): string
    {
        return __('filament-blog::filament-blog.author');
    }
}
