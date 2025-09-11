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
                Section::make('Hero Quality')
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

                Section::make('Product Guarantee')
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
                Section::make('Quality Certification')
                    ->schema([
                        // Certification layout (optional)
                        TextInput::make('certTitle')->label('Certification Title')->default('CERTIFICATION'),
                        Repeater::make('certificates')
                            ->label('Certificates (Top Row)')
                            ->schema([
                                FileUpload::make('image')->image()->disk('public')->directory('quality/certificates')->maxSize(51200)->required(),
                            ])
                            ->collapsed(),
                        Repeater::make('certBadges')
                            ->label('Certification Badges (Bottom)')
                            ->schema([
                                FileUpload::make('image')->image()->disk('public')->directory('quality/certificates')->maxSize(20480)->required(),
                            ])
                            ->collapsed(),
                    ]),
                Section::make('Quality Steps Section')
                    ->schema([
                        TextInput::make('stepsTitle')->default('Quality Process with the Best Workforce and Infrastructure')->required(),
                        RichEditor::make('stepsSubtitle')
                            ->label('Subtitle')
                            ->default('For many years PT. Suryatama Usaha Nusantara Food is able to penetrate the Indonesian national market which is very competitive and has similar product competitors with very many variants.<br/>Our success is also due to our contribution to reliability in handling upstream to downstream distribution, namely from neat packaging, safe transport of cargo, careful documentation, and transportation and logistics that maintain excellent quality and taste.'),
                        Repeater::make('stepsImages')
                            ->label('Gallery Images')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('quality/steps')
                                    ->maxSize(51200)
                                    ->required(),
                            ])
                            ->collapsed(),
                    ]),
            ]);
    }
}


