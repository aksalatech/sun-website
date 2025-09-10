<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;

class HomePageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('home-page')
            ->schema([
                //HOME - Hero Banner Section
                Section::make('Hero Banner Section')
                    ->schema([
                        Repeater::make('heroSlides')
                            ->schema([
                                TextInput::make('heroTitle')->required(),
                                TextInput::make('heroSubtitle'),
                                RichEditor::make('heroDescription'),

                                FileUpload::make('image')
                                    ->label('Slide Image / Video')
                                    ->acceptedFileTypes([
                                        'image/jpeg',
                                        'image/png',
                                        'image/webp',
                                        'video/mp4',
                                        'video/quicktime',
                                        'video/x-msvideo',
                                    ])
                                    ->maxSize(51200)
                                    ->disk('public')
                                    ->directory('slides')
                                    ->required(),
                            ])
                    ]),
                //HOME - Brand Section
                Section::make('Brand Section')
                    ->schema([
                        TextInput::make('brandTitle')
                            ->label('Our Brand')
                            ->required(),
                        TextInput::make('limit')
                            ->label('Number of Brands to Show')
                            ->default(5)
                            ->numeric(),
                    ]),
                //HOME - Why Us
                Section::make('Why Us Section')
                    ->schema([
                        TextInput::make('whyTitle')
                            ->label('Title')
                            ->default('Why Do Our Partners Trust Us?')
                            ->required(),
                        TextInput::make('whySubtitle')
                            ->label('Subtitle')
                            ->default('FOR PARTNERS')
                            ->required(),
                        RichEditor::make('whyDescription')
                            ->label('Description')
                            ->required()
                            ->default('Berdiri sejak tahun 2015, CV BINTANG FAJAR ABADI dengan BRAND UNLEASHIA, EMBRYOLISSE dan IN2IT memiliki basis penjualan online dan offline yang kuat di Indonesia. Di online UNLEASHIA, EMBRYOLISSE dan IN2IT terdaftar di berbagai e-commerce di Indonesia seperti Shopee Mall, Tokopedia Official Store, Zalora, Lazada Mall, TikTok Shop, Blibli.'),
                        FileUpload::make('whyImage')
                            ->label('Why Image')
                            ->image()
                            ->maxSize(51200)
                            ->disk('public')
                            ->directory('image')
                            ->required(),
                    ]),
                //HOME - Our Service
                Section::make('Service Section')
                    ->schema([
                        TextInput::make('serviceSectionTitle')
                            ->label('Title')
                            ->default('OUR SERVICE')
                            ->required(),
                        Repeater::make('serviceList')
                            ->label('Service List')
                            ->schema([
                                FileUpload::make('serviceImage')
                                    ->label('Service Image')
                                    ->image()
                                    ->maxSize(51200)
                                    ->disk('public')
                                    ->directory('service')
                                    ->required(),
                                TextInput::make('serviceTitle')
                                    ->label('Title')
                                    ->default('EXCLUSIVE DISTRIBUTIONS')
                                    ->required(),
                                RichEditor::make('serviceDescription')
                                    ->label('Description')
                                    ->required()
                                    ->default('Provide high quality products to attact mid and premium consumer segments'),
                            ])
                            ->collapsed()
                            ->cloneable(),
                    ]),
                //HOME - Achievement Section
                Section::make('Achievement Section')
                    ->schema([
                        TextInput::make('achievementTitle')
                            ->label('Title')
                            ->required()
                            ->default('What we’ve achieved so far'),
                        RichEditor::make('achievementDescription')
                            ->label('Description')
                            ->required()
                            ->default('Berdiri sejak tahun 2015, <span class="highlight">CV BINTANG FAJAR ABADI</span> dengan
                            <span class="highlight">BRAND EMBRYOLISSE, MOSBEAU dan UNLEASHIA</span><br/>memiliki basis penjualan online dan
                            offline yang kuat di Indonesia.'),
                        Repeater::make('achievementStats')
                            ->label('Achievement Stats')
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('value')
                                    ->required(),
                                TextInput::make('caption')
                                    ->required(),
                            ])
                            ->columns(3)
                            ->default([
                                [
                                    'title' => 'Indonesia Total Populations',
                                    'value' => '284.2',
                                    'caption' => 'Million / Year',
                                ],
                                [
                                    'title' => 'Indonesia Internet Users',
                                    'value' => '221',
                                    'caption' => 'Million / Year',
                                ],
                                [
                                    'title' => 'BFA Exposure',
                                    'value' => '125',
                                    'caption' => 'Million / Year',
                                ],
                                [
                                    'title' => 'BFA Traffic',
                                    'value' => '12',
                                    'caption' => 'Million / Year',
                                ],
                            ]),
                        Grid::make()
                            ->schema([
                                Repeater::make('achievementLogos1')
                                    ->label('Logo 1')
                                    ->schema([
                                        FileUpload::make('logo')
                                            ->label('Logo')
                                            ->image()
                                            ->maxSize(51200)
                                            ->disk('public')
                                            ->directory('achievement')
                                            ->required(),
                                    ])
                                    ->columns(1),
                                Repeater::make('achievementLogos2')
                                ->label('Logo 2')
                                ->schema([
                                    FileUpload::make('logo')
                                        ->label('Logo')
                                        ->image()
                                        ->maxSize(51200)
                                        ->disk('public')
                                        ->directory('achievement')
                                        ->required(),
                                ])
                                ->columns(1),
                            ])
                            ->columns(2),
                    ]),
                //HOME - Market Penetration Section
                Section::make('Market Penetration Section')
                    ->schema([
                        FileUpload::make('marketBackground')
                            ->label('Background')
                            ->image()
                            ->maxSize(51200)
                            ->disk('public')
                            ->directory('product')
                            ->required(),

                        FileUpload::make('marketIcon')
                            ->label('Logo')
                            ->image()
                            ->maxSize(51200)
                            ->disk('public')
                            ->directory('product')
                            ->required(),

                        TextInput::make('marketText')
                            ->label('Text')
                            ->required(),

                        FileUpload::make('marketCountryImage')
                            ->label('Country Image')
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'video/mp4',
                                'video/quicktime',
                                'video/x-msvideo',
                            ])
                            ->maxSize(51200)
                            ->disk('public')
                            ->directory('product')
                            ->required(),
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        logger($data);
        return $data;
    }
}
