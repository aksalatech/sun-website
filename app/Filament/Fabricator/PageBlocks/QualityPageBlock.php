<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class QualityPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('quality-page')
            ->schema([
                Section::make('Hero Quality Section')
                    ->schema([
                        FileUpload::make('heroBackground')
                            ->label('Background Image')
                            ->image()
                            ->disk('public')
                            ->directory('quality')
                            ->maxSize(51200)
                            ->required(),
                        TextInput::make('heroSmallTitle')->default('QUALITY')->required(),
                        RichEditor::make('heroTitle')
                            ->label('Hero Text')
                            ->default('We achieve success from our commitment to quality and our hard work that won customer\'s trust.')
                            ->required(),
                    ]),

                Section::make('Product Guarantee Section')
                    ->schema([
                        TextInput::make('guaranteeTitle')->default('Product Guarantee')->required(),
                        FileUpload::make('guaranteeImageLeft')
                            ->label('Left Image (fruits)')
                            ->image()
                            ->disk('public')
                            ->directory('quality')
                            ->maxSize(51200),
                        Repeater::make('guaranteeItems')
                            ->label('Guarantee Items (right)')
                            ->schema([
                                FileUpload::make('icon')->image()->disk('public')->directory('quality/icons')->maxSize(10240),
                                RichEditor::make('text')->toolbarButtons(['bold'])->required(),
                            ])
                            ->default([
                                [ 'text' => '<strong>Heavy metal pollution</strong> such as : Pb, Cd, AS, Hg and SN, All below the standard limits determined by the government' ],
                                [ 'text' => '<strong>Microbiological Pollution</strong> such as : Escherichia coli, Salmonella spp, Listeria monocytogenes , All below the standard limits determined by the government' ],
                                [ 'text' => '<strong>Testing for pesticide residues</strong> used by our farmer partners is also below the specified standards' ],
                                [ 'text' => 'It is certain that SUN <strong>products do not add preservatives or dangerous ingredients</strong>, and are all safe for use by consumers' ],
                            ])
                            ->collapsed(),
                        Repeater::make('guaranteeBadges')
                            ->label('Badges (bottom)')
                            ->schema([
                                FileUpload::make('image')->image()->disk('public')->directory('quality/badges')->maxSize(10240)->required(),
                            ])
                            ->collapsed(),
                    ]),
            ]);
    }
}


