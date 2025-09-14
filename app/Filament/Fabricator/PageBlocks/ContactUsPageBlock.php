<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Card;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;

class ContactUsPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('contact-us-page')
            ->schema([
                Card::make()
                    ->label('Banner')
                    ->schema([
                        FileUpload::make('banner')
                            ->label('Banner')
                            ->image()
                            ->imageEditor()
                            ->default('about-us/banner.png'),
                    ]),
                Section::make('Detail Section')
                    ->schema([
                        TextInput::make('title'),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3),

                        Repeater::make('information')
                            ->label('Informasi Kontak')
                            ->schema([
                                FileUpload::make('icon')
                                    ->label('Icon')
                                    ->acceptedFileTypes(['image/png', 'image/svg+xml']) //izinkan SVG & PNG
                                    ->disk('public')
                                    ->directory('icons')
                                    ->required(),
                                TextInput::make('text')
                                    ->label('Contact Details')
                                    ->required(),
                            ]),
                        
                        Textarea::make('google_maps_embed')
                            ->label('Google Maps Embed Code')
                            ->helperText('Paste the iframe embed code from Google Maps here')
                            ->rows(4)
                            ->placeholder('<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
