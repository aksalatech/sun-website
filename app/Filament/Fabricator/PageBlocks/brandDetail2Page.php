<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class brandDetail2Page extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('brand-detail2-page')
        ->schema([
            Section::make('Brand Detail Product')
            ->schema([
                Repeater::make('productSection')
                ->schema([
                    TextInput::make('productTitle')
                        ->label('Title')
                        ->required()
                        ->default('More Than Just Moizturizer'),
                    TextInput::make('productSubtitle')
                        ->label('Subtitle')
                        ->required()    
                        ->default('Lait Creme Concentre'),
                    RichEditor::make('productDesc')
                        ->label('Description')
                        ->required()
                        ->default('
                            <p>The iconic Lait-Crème Concentré is an all-natural hydrating moisturiser enriched with plant extracts and vitamins working to deeply hydrate and protect the skin’s natural barrier for up to 24 hours.</p>
                            <p>30 & 75 ml</p>
                        '),
                    ColorPicker::make('titleColor')
                        ->label('Choose Color For Title')
                        ->hex()
                        ->default('#000000'),
                    ColorPicker::make('subtitleColor')
                        ->label('Choose Color For Subtitle')
                        ->hex()
                        ->default('#000000'),
                    FileUpload::make('productImage')
                        ->label('Product Image')
                        ->image()
                        ->maxSize(51200)
                        ->disk('public')
                        ->directory('brands')
                        ->required(),
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
                    TextInput::make('bottomText')
                        ->label('Text On Bottom'),
                ])
                ->collapsed()
                ->cloneable(),
            ])
        ])
        ->label('Brand Detail 2');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}