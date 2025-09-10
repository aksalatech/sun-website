<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;

class Careerpage extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('career-page')
            ->schema([
                Section::make('Header Section')
                    ->schema([
                        TextInput::make('careerHeaderTitle')
                            ->label('Header Title')
                            ->default('We Are Hiring')
                            ->required(),
                        FileUpload::make('headerImage')
                            ->label('background header')
                            ->maxSize(3072)
                            ->disk('public')
                            ->directory('career')
                            ->required(),
                    ]),

                // Part our mission section
                Section::make('Daftar Lowongan')
                    ->schema([
                        TextInput::make('jobseekTitle')
                            ->label('Header Section')
                            ->default('Be part of our mission')
                            ->required(),

                        Textarea::make('jobseekDescription')
                            ->label('Mission Description')
                            ->rows(3)
                            ->required(),

                        Repeater::make('vacancies')
                            ->label('Job Vacancy')
                            ->reorderable()
                            ->schema([
                                TextInput::make('jobTitle')
                                    ->label('Position Name')
                                    ->required(),

                                RichEditor::make('jobDescription')
                                    ->label('Short Description')
                                    ->required(),

                                Toggle::make('is_remote')
                                    ->label('Remote/Full WFO')
                                    ->inline()
                                    ->default(false),

                                Toggle::make('is_fulltime')
                                    ->label('Fulltime/Part-time')
                                    ->inline()
                                    ->default(true),

                                TextInput::make('apply_url')
                                    ->label('Link Apply')
                                    ->required(),
                            ])
                            ->collapsed()
                            ->cloneable(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
