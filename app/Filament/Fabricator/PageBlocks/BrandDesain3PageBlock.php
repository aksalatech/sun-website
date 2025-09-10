<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Radio;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BrandDesain3PageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('brand-desain3-page')
            ->label('Brand Desain 3')
            ->schema([
                Repeater::make('images')
                    ->schema([
                        TextInput::make('title'),
                        FileUpload::make('image')
                            ->image()
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
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}