<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ProductIn2itPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('product-in2it-page')
            ->label('Product In2it Page')
            ->schema([
                FileUpload::make('banner')
                    ->label('Banner')
                    ->required()
                    ->image()
                    ->disk('public')
                    ->directory('product')
                    ->imageEditor()
                    ->default('products/in2it-banner.png'),
                Card::make()
                    ->schema([
                        TextInput::make('productTitle')
                            ->label('Product Label')
                            ->default('PRIMER ++'),
                        FileUpload::make('productBackground')
                            ->label('Background In2it')
                            ->required()
                            ->image()
                            ->disk('public')
                            ->directory('product')
                            ->imageEditor()
                            ->default('products/in2it-primer.png'),
                        Repeater::make('productBenefits')
                            ->label('Product Benefits')
                            ->schema([
                                TextInput::make('item')
                                    ->label('Feature Item')
                            ])
                            ->default([
                                [
                                    'item' => 'A velvet and lightweight texture primer without added weight or a greasy after feel that improves the wear-time if makeup.'
                                ],
                                [
                                    'item' => 'It absorbs oil to control shine and delivers blurring effect with a velvety matte finish'
                                ],
                                [
                                    'item' => 'This formula works as skin shield and maintain hydrated skin',
                                ],
                                [
                                    'item' => 'It leaves a smooth, even surface so that foundation effortlessly glides on and stays put for all-day makeup wear',
                                ],
                                [
                                    'item' => 'Quickly minimize the appearance of pores, redness, & fine lines for smoother',
                                ],
                                [
                                    'item' =>
                                        'Concentrated in hydrating hyaluronic acid, intensely hydrates the skin and provides an immediate radiant effect',
                                ],
                                [
                                    'item' =>
                                        'The skin is luminous, its texture is refined',
                                ]
                            ])
                                ]),
                Repeater::make('productList')
                    ->label('Product List')
                    ->schema([
                        Radio::make('isBanner')
                            ->label('Is Banner')
                            ->options([
                                'yes' => 'Yes',
                                'no' => 'No',
                            ])
                            ->inline()
                            ->reactive(),
                        RichEditor::make('title')
                            ->label('Title')
                            ->default('CLICK CLICK <strong>GLASS LIP</strong>'),
                        RichEditor::make('description')
                            ->label('Description')
                            ->default('Enhance your lips with our juicy and glossy lipstick that provides a non-sticky and lightweight formula'),

                        FileUpload::make('image')
                            ->visible(fn(callable $get) => $get('isBanner') === 'no')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('product')
                            ->imageEditor()
                            ->default('products/in2it-lip.png'),
                        Checkbox::make('rowReverse')
                            ->visible(fn(callable $get) => $get('isBanner') === 'no')
                            ->label('Row Reverse')
                            ->default(false),
                        FileUpload::make('banner')
                            ->visible(fn(callable $get) => $get('isBanner') === 'yes')
                            ->label('Banner')
                            ->image()
                            ->disk('public')
                            ->directory('product')
                            ->imageEditor()
                            ->default('products/in2it-foundation.png'),
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}