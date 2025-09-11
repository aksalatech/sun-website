<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class AboutUsPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('about-us-page')
            ->schema([
                Card::make()
                    ->label('Banner')
                    ->schema([
                        FileUpload::make('banner')
                            ->label('Banner')
                            ->image()
                            ->imageEditor()
                            ->default('about-us/banner.png'),
                        TextInput::make('title')
                            ->label('Title')
                            ->default('BRINGING'),
                        TextInput::make('description')
                            ->label('Description')
                            ->default('QUALITY TO LIFE'),
                    ]),
                Card::make()
                    ->label('Content')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Content')
                            ->default(`<p class="mb-30">
                                Berdiri sejak tahun 2015, CV BINTANG FAJAR ABADI dengan BRAND UNLEASHIA, EMBRYOLISSE dan IN2IT memiliki basis penjualan online dan offline yang kuat di Indonesia.
                                Di online UNLEASHIA, EMBRYOLISSE dan IN2IT terdaftar di berbagai e-commerce di Indonesia seperti Shopee Mall, Tokopedia Official Store, Zalora, Lazada Mall, TikTok Shop, Blibli.
                                </p>
                                <p class="mb-30">
                                Sedangkan di offline, CV BINTANG FAJAR ABADI sudah bekerja sama dengan beberapa Modern Channel seperti Guardian, Sociolla, Boots, Watsons, Aeon, Apotek Roxy, Century dan KKV..
                                </p>
                            `),
                    ]),
                Card::make()
                    ->label('Quote')
                    ->schema([
                        TextInput::make('quote')
                            ->label('Quote')
                            ->default('We believe by bringing best quality products, we can give impact for a better life.'),

                    ]),
                Card::make()
                    ->label('Vision and Mission')
                    ->schema([
                        RichEditor::make('vision')
                            ->label('Vision')
                            ->default(`<h2>Vision</h2>
                                <p>
                                    Become a company that can meet the needs  of Frozen Vegetables and Fruit with quality  products, safe for consumption and halal.
                                </p>
                                `),
                        RichEditor::make('mission')
                            ->label('Mission')
                            ->default(`
                                <h2>Mission</h2>
                                <ul>
                                    <li>Apply the principles of quality and food  safety standards as well as a HALAL guarantee  system in every product produced.</li>
                                    <li>Produce innovative products that are high  quality and safe for consumption and always  provide the best service to consumers.</li>
                                    <li>To uphold ideas, creativity and innovation  for the sustainability and progress of the  company.</li>
                                    <li>Provide positive benefits for the wider  community.</li>
                                </ul>`),
                    ]),
                //HOME - Achievement Section
                Card::make('Achievement Section')
                    ->schema([
                        Repeater::make('achievementStats')
                            ->label('Achievement Stats')
                            ->schema([
                                TextInput::make('value')
                                    ->required(),
                                TextInput::make('prefix')
                                    ->default('+'),
                                TextInput::make('title')
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
                    ]),
                Card::make()
                    ->label('Video Section')
                    ->schema([
                        Toggle::make('enable_video')
                            ->label('Enable Video')
                            ->default(false)
                            ->live(),
                        Select::make('video_type')
                            ->label('Video Type')
                            ->options([
                                'upload' => 'Upload Video File',
                                'youtube' => 'YouTube Link',
                            ])
                            ->default('upload')
                            ->live()
                            ->visible(fn ($get) => $get('enable_video')),
                        FileUpload::make('video_file')
                            ->label('Video File')
                            ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mov', 'video/wmv'])
                            ->maxSize(10240) // 10MB
                            ->visible(fn ($get) => $get('enable_video') && $get('video_type') === 'upload'),
                        TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->url()
                            ->visible(fn ($get) => $get('enable_video') && $get('video_type') === 'youtube'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Ensure video fields have default values
        $data['enable_video'] = $data['enable_video'] ?? false;
        $data['video_type'] = $data['video_type'] ?? 'upload';
        $data['video_file'] = $data['video_file'] ?? null;
        $data['youtube_url'] = $data['youtube_url'] ?? null;
        
        return $data;
    }
}