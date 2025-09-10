<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
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
                Section::make('Detail Section')
                    ->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->required(),

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

                        Repeater::make('brandLogos')
                            ->label('Brand Logos')
                            ->schema([
                                FileUpload::make('logo')
                                    ->label('Logo Brand')
                                    ->image()
                                    ->maxSize(3072)
                                    ->disk('public')
                                    ->directory('brands')
                                    ->required(),
                            ]),
                    ]),
                // Section::make('Form Section'),
                Section::make('Form Section')
                    ->schema([
                        TextInput::make('formTitle')
                            ->label('Title')
                            ->required(),
                        // ->default('Who We Are'),

                        TextInput::make('sub')
                            ->label('Subtitle')
                            ->required(),
                        // ->default('Who We Are'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
