<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-4';

    protected static ?string $navigationGroup = 'General Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Radio::make('path_type')
                            ->label('Path Type')
                            ->options([
                                'page' => 'Page',
                                'custom' => 'Custom URL',
                            ])
                            ->default('page')
                            ->reactive(),

                        Forms\Components\Select::make('path')
                            ->label('Path Page')
                            ->options(function () {
                                return collect(
                                    \Z3d0X\FilamentFabricator\Models\Page::query()
                                        ->pluck('title', 'slug')
                                        ->mapWithKeys(function ($title, $slug) {
                                            return ['/' . $slug => $title];
                                        })
                                );
                            })
                            ->searchable()
                            ->required(fn(callable $get) => $get('path_type') === 'page')
                            ->visible(fn(callable $get) => $get('path_type') === 'page'),

                        Forms\Components\TextInput::make('path')
                            ->label('Custom URL')
                            // ->prefix('https://')
                            ->required(fn(callable $get) => $get('path_type') === 'custom')
                            ->visible(fn(callable $get) => $get('path_type') === 'custom')
                            ->helperText('example: https://google.com'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('path')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc')
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
