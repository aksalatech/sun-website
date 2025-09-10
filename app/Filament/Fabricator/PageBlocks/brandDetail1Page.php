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

class brandDetail1Page extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('brand-detail1-page')
            ->schema([
                Section::make('Brand Detail Product')
                ->schema([
                    Repeater::make('productSection')
                    ->schema([
                        TextInput::make('productTitle')
                            ->label('Title')
                            ->required()
                            ->default('Satin Wear Health Green Cushion'),
                        RichEditor::make('productDesc')
                            ->label('Description')
                            ->required()
                            ->default('Aim for lightweight yet flawless coverage with this cushion foundation offering skin care benefits SPF 30 PA++ on top of a subtle glow! Vegan formula packed with bakuchiol, 76% water essence and papaya fruit extract keeps skin in tip-top condition while delivering a natural-looking satin finish. The airtight packaging fitted with micro-holes easily pumps out product without risk of contamination.'),
                        ColorPicker::make('textColor')
                            ->label('Choose Color For Content')
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
                        // TextInput::make('bottomText')
                        //     ->label('Text On Bottom'),
                    ])
                    ->collapsed()
                    ->cloneable(),
                ])
            ])
            ->label('Brand Detail 1');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}