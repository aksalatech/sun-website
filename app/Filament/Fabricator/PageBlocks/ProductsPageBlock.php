<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ProductsPageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('products-page')
            ->label('Products Page')
            ->schema([
                Section::make('Header Section')
                    ->schema([
                        RichEditor::make('productHeaderTitle')
                            ->label('Header Title')
                            ->default('Freshness Locked In, Goodness Anytime'),
                        FileUpload::make('headerImage')
                            ->label('background header')
                            ->maxSize(3072)
                            ->disk('public')
                            ->directory('product')
                            ->required(),
                    ]),
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Section Title')
                            ->default('Our Products')
                            ->required(),

                        TextInput::make('subtitle')
                            ->label('Section Subtitle')
                            ->default('Discover our high-quality products'),

                        TextInput::make('product_limit')
                            ->label('Product Limit')
                            ->numeric()
                            ->default(8)
                            ->minValue(1)
                            ->maxValue(50)
                            ->helperText('Maximum number of products to display'),

                        Select::make('category_filter')
                            ->label('Category Filter')
                            ->multiple()
                            ->options([
                                'vegetables' => 'Vegetables',
                                'fruits' => 'Fruits',
                                'mix' => 'Mix',
                            ])
                            ->helperText('Leave empty to show all categories'),

                        Toggle::make('show_category_filter')
                            ->label('Show Category Filter')
                            ->default(true)
                            ->helperText('Display category filter buttons above products'),

                        Toggle::make('show_pagination')
                            ->label('Show Pagination')
                            ->default(false)
                            ->helperText('Show pagination if products exceed limit'),

                        Select::make('sort_order')
                            ->label('Sort Order')
                            ->options([
                                'asc' => 'Ascending (A-Z)',
                                'desc' => 'Descending (Z-A)',
                            ])
                            ->default('desc')
                            ->required()
                            ->helperText('Choose how products are sorted by name'),

                        Toggle::make('show_sort_dropdown')
                            ->label('Show Sort Dropdown')
                            ->default(true)
                            ->helperText('Allow users to change sorting on frontend'),
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Get products based on configuration
        $query = \App\Models\Product::with('images');
        
        // Apply sorting
        $sortOrder = $data['sort_order'] ?? 'desc';
        if ($sortOrder === 'asc') {
            $query->orderBy('name', 'asc');
        } else {
            $query->orderBy('name', 'desc');
        }

        // Apply category filter if specified
        if (!empty($data['category_filter'])) {
            $query->whereIn('category', $data['category_filter']);
        }

        // Apply limit
        $limit = $data['product_limit'] ?? 8;
        
        if ($data['show_pagination'] ?? false) {
            $products = $query->paginate($limit);
        } else {
            $products = $query->limit($limit)->get();
        }

        // Get all categories for filter
        $categories = \App\Models\Product::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category')
            ->toArray();

        $data['products'] = $products;
        $data['categories'] = $categories;

        return $data;
    }
}
