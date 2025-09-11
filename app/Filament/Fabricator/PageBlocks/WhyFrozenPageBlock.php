<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class WhyFrozenPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('why-frozen')
            ->schema([
                Section::make('Why Frozen Vegetables & Fruits')
                    ->schema([
                        TextInput::make('title')
                            ->default('Why Frozen Vegetables & Fruits')
                            ->required(),
                        Textarea::make('subtitle')
                            ->rows(2)
                            ->default('We flash freeze and package our fruits at their peak ripeness, which locks in nutrition and flavors. This allows you to utilize them at your convenience, without worrying about diminishing freshness or flavor — and that means less food waste.'),

                        Repeater::make('reasons')
                            ->label('Reasons')
                            ->schema([
                                FileUpload::make('icon')
                                    ->image()
                                    ->disk('public')
                                    ->directory('why-frozen/icons')
                                    ->maxSize(10240)
                                    ->label('Icon (png/svg)')
                                    ->nullable(),
                                TextInput::make('title')->required(),
                            ])
                            ->default([
                                [
                                    'title' => 'Practical in use and easy to store'
                                ],
                                [
                                    'title' => 'Guaranteed stock availability throughout the year, with competitive prices'
                                ],
                                [
                                    'title' => 'Longer shelf life, and not easily wilted/damaged.'
                                ],
                                [
                                    'title' => 'Maintained Nutritional Content'
                                ],
                                [
                                    'title' => 'Efficient and effective, and can reduce operational costs'
                                ],
                            ])
                            ->minItems(1)
                            ->maxItems(5)
                            ->collapsed()
                            ->cloneable(),
                    ])
            ]);
    }
}


