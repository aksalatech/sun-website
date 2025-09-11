<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class PartnershipPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('partnership-page')
            ->schema([
                Section::make('Hero')
                    ->schema([
                        FileUpload::make('heroBackground')->image()->disk('public')->directory('partnership')->maxSize(51200)->required(),
                    ]),

                Section::make('Why Frozen')
                    ->schema([
                        TextInput::make('whyTitle')->default('Why Frozen Vegetables & Fruits')->required(),
                        Textarea::make('whySubtitle')->rows(2)->default('We flash freeze and package our fruits at their peak ripeness, which locks in nutrition and flavors. This allows you to utilize them at your convenience, without worrying about diminishing freshness or flavor — and that means less food waste.'),
                        Repeater::make('whyItems')->schema([
                            FileUpload::make('icon')->image()->disk('public')->directory('partnership/why')->maxSize(10240),
                            TextInput::make('title')->required(),
                        ])->default([
                            ['title' => 'Practical in use and easy to store'],
                            ['title' => 'Guaranteed stock availability throughout the year, with competitive prices'],
                            ['title' => 'Longer shelf life, and not easily wilted/damaged.'],
                            ['title' => 'Maintained Nutritional Content'],
                        ])->collapsed(),
                    ]),

                Section::make('Production Process')
                    ->schema([
                        TextInput::make('processTitle')->default('Production Process')->required(),
                        RichEditor::make('processSubtitle')->default('Embracing “Frozen as the new fresh”, especially for F&B businesses, is a strategic switch that yields benefits on all fronts.'),
                        Repeater::make('processSteps')->schema([
                            TextInput::make('step')->default('1')->required(),
                            TextInput::make('text')->required(),
                        ])->default([
                            ['step' => '1', 'text' => 'Incoming Raw Material From Supplier'],
                            ['step' => '2', 'text' => 'Production 1: Sortir & Cutting'],
                            ['step' => '3', 'text' => 'Production 2: Washing–Blanching–Drying–Packing'],
                            ['step' => '4', 'text' => 'Initial Freezing With ABF (-25 C) 45–90s 30–C)'],
                            ['step' => '5', 'text' => 'Packing Plastic Qty 5kg'],
                            ['step' => '6', 'text' => 'Packing Box Qty 10 Kg'],
                            ['step' => '7', 'text' => 'Cold Storage -18 C'],
                            ['step' => '8', 'text' => 'Delivery to Customers'],
                        ])->columns(2)->collapsed(),
                    ]),

                Section::make('Stats')
                    ->schema([
                        Repeater::make('stats')->schema([
                            TextInput::make('value')->required(),
                            TextInput::make('label')->required(),
                        ])->default([
                            ['value' => '40+', 'label' => 'Network of Local Farmers'],
                            ['value' => '650,000', 'label' => 'Kgs Annual Production Capacity'],
                            ['value' => '30,000+', 'label' => 'Unique Customers Served'],
                            ['value' => '150+', 'label' => 'F&B Brands Across 300+ Outlets'],
                        ])->columns(4)->collapsed(),
                    ]),

                Section::make('Partnership Form')
                    ->schema([
                        TextInput::make('formTitle')->default('CONTACT FOR PARTNERSHIP INQUIRIES')->required(),
                        RichEditor::make('formSubtitle')->default('For immediate assistance please write via WhatsApp by clicking here or directly WhatsApp +62-21-6543-5430. You can also leave a message below for any inquiries.'),
                        Select::make('formRecipient')->options([
                            'admin@bintangfajarabadi.com' => 'Default',
                        ])->default('admin@bintangfajarabadi.com'),
                    ]),
            ]);
    }
}


