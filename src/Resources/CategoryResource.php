<?php

namespace Stephenjude\FilamentBlog\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Stephenjude\FilamentBlog\Models\Category;
use Stephenjude\FilamentBlog\Resources\CategoryResource\Pages;
use Stephenjude\FilamentBlog\Traits\HasContentEditor;

class CategoryResource extends Resource
{
    use HasContentEditor;

    protected static ?string $model = Category::class;

    protected static ?string $slug = 'blog/categories';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|null|\UnitEnum $navigationGroup = 'Blog';

    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('filament-blog::filament-blog.name'))
                            ->required()
                            ->live(true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->label(__('filament-blog::filament-blog.slug'))
                            ->required()
                            ->unique(Category::class, 'slug', fn($record) => $record),
                        self::getContentEditor('description'),
                        Forms\Components\Toggle::make('is_visible')
                            ->label(__('filament-blog::filament-blog.visible_to_guests'))
                            ->default(true),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label(__('filament-blog::filament-blog.created_at'))
                            ->content(
                                fn(?Category $record): string => $record ? $record->created_at->diffForHumans() : '-'
                            ),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label(__('filament-blog::filament-blog.last_modified_at'))
                            ->content(
                                fn(?Category $record): string => $record ? $record->updated_at->diffForHumans() : '-'
                            ),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-blog::filament-blog.name'))
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('filament-blog::filament-blog.slug'))
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label(__('filament-blog::filament-blog.visibility')),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament-blog::filament-blog.last_updated'))
                    ->date(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-blog::filament-blog.categories');
    }

    public static function getModelLabel(): string
    {
        return __('filament-blog::filament-blog.category');
    }
}
