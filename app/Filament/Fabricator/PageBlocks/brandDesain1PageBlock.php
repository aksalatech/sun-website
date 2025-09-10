<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Radio;

class brandDesain1PageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('brand-desain1-page')
            ->schema([
                Section::make('Brand Product')
                    ->schema([
                        Repeater::make('brandSection')
                            ->schema([
                                TextInput::make('brandTitle')
                                    ->label('Title')
                                    ->required()
                                    ->default('FOR YOUR'),
                                ColorPicker::make('titleColor')
                                    ->label('Choose Color For Title')
                                    ->hex()
                                    ->default('#C5CD59'),
                                TextInput::make('brandSubtitle')
                                    ->label('Subtitle')
                                    ->default('HD COMPLEXION'),
                                ColorPicker::make('subtitleColor')
                                    ->label('Choose Color For Subtitle')
                                    ->hex()
                                    ->default('#ffffff'),
                                Repeater::make('backgroundColors')
                                    ->label('Gradient Background Colors')
                                    ->schema([
                                        ColorPicker::make('bgColor')
                                            ->label('Choose Color')
                                            ->hex()
                                            ->default('#C5CD59'),
                                    ])
                                    ->minItems(2)
                                    ->maxItems(5)
                                    ->collapsed()
                                    ->cloneable(),
                                FileUpload::make('brandBackground')
                                    ->label('Image For Background')
                                    ->image()
                                    // ->maxSize(3072)
                                    ->disk('public')
                                    ->directory('brands')
                                    ->required(),
                                FileUpload::make('brandImage')
                                    ->label('Image')
                                    ->image()
                                    // ->maxSize(3072)
                                    ->disk('public')
                                    ->directory('brands')
                                    ->required(),
                                Radio::make('path_type')
                                    ->label('Path Type')
                                    ->options([
                                        'page' => 'Page',
                                        'custom' => 'Custom URL',
                                    ])
                                    ->default('page')
                                    ->reactive(),
                                Select::make('url')
                                    ->label('Path Page')
                                    ->options(function ($get, $record) {
                                        return collect(
                                            \Z3d0X\FilamentFabricator\Models\Page::query()
                                                ->where('parent_id', $record->id)
                                                ->pluck('title', 'slug')
                                                ->mapWithKeys(function ($title, $slug) {
                                                    return ['/' . $slug => $title];
                                                })
                                        );
                                    })
                                    ->searchable()
                                    ->required(fn(callable $get) => $get('path_type') === 'page')
                                    ->visible(fn(callable $get) => $get('path_type') === 'page'),
        
                                TextInput::make('url')
                                    ->label('Custom URL')
                                    // ->prefix('https://')
                                    ->required(fn(callable $get) => $get('path_type') === 'custom')
                                    ->visible(fn(callable $get) => $get('path_type') === 'custom')
                                    ->helperText('example: https://google.com'),
                                Toggle::make('reverseRow')
                                    ->label('Reverse Row')
                                    ->inline()
                                    ->default(true),
                            ])
                            ->collapsed()
                            ->cloneable()
                    ]),
            ])
            ->label('Brand Desain 1');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}