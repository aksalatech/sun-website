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

                //HOME - About Overlay Section (under Quality)
                Section::make('About Overlay Section')
                    ->schema([
                        FileUpload::make('aboutOverlayBackground')
                            ->label('Background Image')
                            ->image()
                            ->disk('public')
                            ->directory('about')
                            ->maxSize(51200)
                            ->required(),
                        TextInput::make('aboutOverlayTitle')
                            ->label('Title')
                            ->default('About Us')
                            ->required(),
                        RichEditor::make('aboutOverlayText')
                            ->label('Text')
                            ->default('PT suryatama usaha nusantara (Sunfrozen) was founded in 2023. We are the leading supplier of frozen vegetables, frozen berries and frozen fruits in...'),
                        TextInput::make('aboutOverlayButtonText')
                            ->label('Button Text')
                            ->default('More'),
                        TextInput::make('aboutOverlayButtonLink')
                            ->label('Button Link')
                            ->default('/about-us'),
                        Repeater::make('aboutOverlayBadges')
                            ->label('Badges (e.g., certifications)')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('about/badges')
                                    ->maxSize(10240)
                                    ->required(),
                            ])
                            ->collapsed(),
                    ]),

                //HOME - Why Frozen Vegetables & Fruits
                Section::make('Why Frozen Vegetables & Fruits')
                    ->schema([
                        TextInput::make('whyFrozenTitle')
                            ->default('Why Frozen Vegetables & Fruits')
                            ->required(),
                        Textarea::make('whyFrozenSubtitle')
                            ->rows(2)
                            ->default('We flash freeze and package our fruits at their peak ripeness, which locks in nutrition and flavors. This allows you to utilize them at your convenience, without worrying about diminishing freshness or flavor — and that means less food waste.'),
                        Repeater::make('whyFrozenReasons')
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
                                ['title' => 'Practical in use and easy to store'],
                                ['title' => 'Guaranteed stock availability throughout the year, with competitive prices'],
                                ['title' => 'Longer shelf life, and not easily wilted/damaged.'],
                                ['title' => 'Maintained Nutritional Content'],
                                ['title' => 'Efficient and effective, and can reduce operational costs'],
                            ])
                            ->minItems(1)
                            ->maxItems(5)
                            ->collapsed()
                            ->cloneable(),
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
