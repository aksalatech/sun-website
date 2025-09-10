<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlogPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('blog-page')
            ->schema([
                // Hero Section Block
                Section::make('Hero Section')
                    ->schema([
                        TextInput::make('headerTitle')
                            ->label('Header Title')
                            ->default('Blog')
                            ->required(),

                        TextInput::make('subTitle')
                            ->label('Sub Title')
                            ->default('Sub Title')
                            ->required(),

                        FileUpload::make('headerImage')
                            ->label('Header Background')
                            ->maxSize(3072)
                            ->disk('public')
                            ->directory('blog')
                            ->required(),
                    ]),

                // Main Blog Section
                Section::make('Main Blog Content')
                    ->schema([
                        TextInput::make('limit')
                            ->label('Number of Brands    to Show')
                            ->default(2)
                            ->numeric(),

                        TextInput::make('latest_limit')
                            ->label('Number of Latest Blogs to Show')
                            ->default(3)
                            ->numeric(),

                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        $data['limit'] = $data['limit'] ?? 5;
        $data['latest_limit'] = $data['latest_limit'] ?? 3;
        return $data;
    }
}
