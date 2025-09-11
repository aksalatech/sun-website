<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    // Main content area (70%)
                    Grid::make()
                        ->schema([
                            Section::make('Product Information')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('Product name')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                            if (!$get('slug')) {
                                                $slug = Str::slug($state);
                                                $originalSlug = $slug;
                                                $i = 1;

                                                // Check for uniqueness
                                                while (Product::where('slug', $slug)->exists()) {
                                                    $slug = $originalSlug . '-' . $i++;
                                                }

                                                $set('slug', $slug);
                                            }
                                        }),
                                    TextInput::make('slug')
                                        ->required()
                                        ->maxLength(255)
                                        ->placeholder('product-slug')
                                        ->disabled(fn($record) => $record ? true : false)
                                        ->reactive()
                                        ->dehydrated()
                                        ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                            $slug = Str::slug($state);
                                            $originalSlug = $slug;
                                            $i = 1;

                                            // Ensure slug uniqueness if manually changed
                                            while (Product::where('slug', $slug)->exists()) {
                                                $slug = $originalSlug . '-' . $i++;
                                            }

                                            $set('slug', $slug);
                                        })
                                        ->unique(ignoreRecord: true),

                                    Textarea::make('short_description')
                                        ->maxLength(500)
                                        ->placeholder('Short product description')
                                        ->rows(3),

                                    Select::make('category')
                                        ->label('Category')
                                        ->searchable()
                                        ->options([
                                            'vegetables' => 'Vegetables',
                                            'fruits' => 'Fruits',
                                            'mix' => 'Mix',
                                        ]),

                                    TextInput::make('detail_name')
                                        ->maxLength(255)
                                        ->placeholder('Detail product name'),

                                    RichEditor::make('detail_desc')
                                        ->placeholder('Detailed product description'),

                                    Section::make('Product Details')
                                        ->schema([
                                            Repeater::make('detail_size')
                                                ->label('Size Information')
                                                ->schema([
                                                    TextInput::make('label')
                                                        ->placeholder('e.g., Weight, Dimensions')
                                                        ->required(),
                                                    TextInput::make('value')
                                                        ->placeholder('e.g., 100g, 10x5cm')
                                                        ->required(),
                                                ])
                                                ->columns(2)
                                                ->addActionLabel('Add Size Info'),

                                            Repeater::make('detail_packing')
                                                ->label('Packing Information')
                                                ->schema([
                                                    TextInput::make('label')
                                                        ->placeholder('e.g., Material, Type')
                                                        ->required(),
                                                    TextInput::make('value')
                                                        ->placeholder('e.g., Plastic, Bottle')
                                                        ->required(),
                                                ])
                                                ->columns(2)
                                                ->addActionLabel('Add Packing Info'),

                                            Repeater::make('detail_certificate')
                                                ->label('Certificate Information')
                                                ->schema([
                                                    TextInput::make('label')
                                                        ->placeholder('e.g., Halal, BPOM, ISO')
                                                        ->required(),
                                                    TextInput::make('value')
                                                        ->placeholder('e.g., Yes, No, Certificate Number')
                                                        ->required(),
                                                ])
                                                ->columns(2)
                                                ->addActionLabel('Add Certificate Info'),
                                        ])
                                        ->collapsible(),
                                ])
                                ->columnSpan(2),
                        ])
                        ->columnSpan(['lg' => 2]),

                    // Sidebar area (30%)
                    Grid::make()
                        ->schema([
                            Section::make('SEO Settings')
                                ->collapsible()
                                ->schema([
                                    TextInput::make('meta_title')
                                        ->maxLength(60)
                                        ->helperText('Recommended length is 50-60 characters'),

                                    Textarea::make('meta_description')
                                        ->maxLength(160)
                                        ->rows(3)
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
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'vegetables' => 'success',
                        'fruits' => 'secondary',
                        'mix' => 'primary',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('short_description')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(),

                TextColumn::make('images_count')
                    ->label('Images')
                    ->counts('images')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'skincare' => 'Skincare',
                        'makeup' => 'Makeup',
                        'health' => 'Health',
                        'beauty' => 'Beauty',
                        'supplements' => 'Supplements',
                    ]),
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
            RelationManagers\ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
