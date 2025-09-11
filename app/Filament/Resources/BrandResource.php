<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make()->schema([
                // Main content area (70%)
                Grid::make()
                    ->schema([
                        Section::make('Title')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Add title')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($state, callable $set) =>
                                        $set('slug', Str::slug($state))),

                                FileUpload::make('logo')
                                    ->image()
                                    ->directory('brands'),
                                    // ->maxSize(1024 * 1024 * 2)
                                    // ->helperText('Maximum size: 2MB'),

                                // Radio::make('path_type')
                                //     ->label('Path Type')
                                //     ->options([
                                //         'page' => 'Page',
                                //         'custom' => 'Custom URL',
                                //     ])
                                //     ->default('page')
                                //     ->reactive(),

                                // Select::make('url')
                                //     ->label('Path Page')
                                //     ->options(function () {
                                //         return collect(
                                //             \Z3d0X\FilamentFabricator\Models\Page::query()
                                //                 ->pluck('title', 'slug')
                                //                 ->mapWithKeys(function ($title, $slug) {
                                //                     return ['/' . $slug => $title];
                                //                 })
                                //         );
                                //     })
                                //     ->searchable()
                                //     ->required(fn(callable $get) => $get('path_type') === 'page')
                                //     ->visible(fn(callable $get) => $get('path_type') === 'page'),

                                // TextInput::make('url')
                                //     ->label('Custom URL')
                                //     // ->prefix('https://')
                                //     ->required(fn(callable $get) => $get('path_type') === 'custom')
                                //     ->visible(fn(callable $get) => $get('path_type') === 'custom')
                                //     ->helperText('example: https://google.com'),

                                // Toggle::make('is_active')
                                //     ->label('Published')
                                //     ->default(true)
                                //     ->inline(false),
                        ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                // Sidebar area (30%)
            ])
                ->columns(['lg' => 3]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                ImageColumn::make('logo')
                    ->defaultImageUrl(url('/images/placeholder.jpg')),

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
                //
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
