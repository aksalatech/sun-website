<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    // Main content area (70%)
                    Grid::make()
                        ->schema([
                            Section::make('Blog')
                                ->schema([
                                    FileUpload::make('thumbnail')
                                        ->image()
                                        ->required()
                                        ->directory('blog'),
                                    TextInput::make('title')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Add title')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                            if (!$get('slug')) {
                                                $slug = Str::slug($state);
                                                $originalSlug = $slug;
                                                $i = 1;

                                                // Check for uniqueness
                                                while (Blog::where('slug', $slug)->exists()) {
                                                    $slug = $originalSlug . '-' . $i++;
                                                }

                                                $set('slug', $slug);
                                            }
                                        }),
                                    TextInput::make('slug')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Add slug')
                                        ->disabled(fn($record) => $record ? true : false)
                                        ->reactive()
                                        ->dehydrated()
                                        ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                            $slug = Str::slug($state);
                                            $originalSlug = $slug;
                                            $i = 1;

                                            // Ensure slug uniqueness if manually changed
                                            while (Blog::where('slug', $slug)->exists()) {
                                                $slug = $originalSlug . '-' . $i++;
                                            }

                                            $set('slug', $slug);
                                        })
                                        ->unique(ignoreRecord: true),

                                    TextInput::make('desc')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Add Desc'),

                                    RichEditor::make('content')
                                        ->required()
                                        ->placeholder('Add Content'),

                                    Toggle::make('is_active')
                                        ->label('Published')
                                        ->default(true)
                                        ->inline(false),

                                ])
                                ->columnSpan(2),
                        ])
                        ->columnSpan(['lg' => 2]),

                    // Sidebar area (30%)
                    Grid::make()
                        ->schema([
                            Section::make('Group')
                                ->collapsible()
                                ->schema([
                                    Select::make('category')
                                        ->label('Category')
                                        ->searchable()
                                        ->options([
                                            'makeup' => 'Make Up',
                                            'skincare' => 'Skincare',
                                            'health' => 'Health',
                                            'beauty' => 'Beauty',
                                            'other' => 'Other',
                                        ])
                                ])
                                ->columnSpan(2),
                            Section::make('SEO Settings')
                                ->collapsible()
                                ->schema([
                                    TextInput::make('meta_title')
                                        ->maxLength(60)
                                        ->helperText('Recommended length is 50-60 characters'),

                                    TextInput::make('meta_description')
                                        ->maxLength(160)
                                        ->helperText('Recommended length is 150-160 characters'),

                                    TextInput::make('meta_keywords')
                                        ->helperText('Separate keywords with commas'),
                                ])
                                ->columnSpan(2),
                        ])
                        ->columnSpan(['lg' => 1]),
                ])
                    ->columns(['lg' => 3]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->defaultImageUrl(url('/images/placeholder.jpg')),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('desc')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('url')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                ToggleColumn::make('is_active')
                    ->label('Published')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->searchable()
            ->filters([
                // Add any filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ReplicateAction::make()->modalWidth('sm')->modalAlignment('left'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
