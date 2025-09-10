<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
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
                        RichEditor::make('visionMission')
                            ->label('Vision and Mission')
                            ->default(`<h2>Vision</h2>
                                <p>
                                    Menjadi perusahaan terbaik dalam menyediakan produk kecantikan, kesehatan dan lifestyle yang berkualitas tinggi untuk masyarakat Indonesia.
                                </p>
                                <h2>Mission</h2>
                                <ul>
                                    <li>Membangun kerjasama yang kuat dan berkelanjutan antara pelanggan, pemasok, dan produk.</li>
                                    <li>Mengidentifikasi masalah dari pelanggan dan memberikan solusi dengan mengadakan kerjasama dan menyediakan produk-produk yang terbukti kualitasnya.</li>
                                    <li>Bisnis model yang inovatif dengan mempromosikan penjualan dan pemasaran digital dan offline.</li>
                                    <li>Merangkul pemasok asing dan produk impor untuk membawanya lebih dekat ke konsumen.</li>
                                    <li>Menyediakan produk berkualitas tinggi untuk menarik konsumen dari segmen menengah dan premium.</li>
                                </ul>`),
                        FileUpload::make('visionMissionImage')
                            ->label('Vision and Mission Image')
                            ->image()
                            ->imageEditor()
                            ->directory('about-us')
                            ->default('about-us/vision-mission.png'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}