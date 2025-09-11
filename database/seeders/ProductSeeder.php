<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample products
        $products = [
            [
                'name' => 'Baby Corn',
                'slug' => 'baby-corn',
                'short_description' => 'Fresh and tender baby corn, perfect for stir-fries and salads.',
                'category' => 'vegetables',
                'detail_name' => 'Premium Baby Corn',
                'detail_desc' => 'Our baby corn is carefully selected and processed to maintain its natural sweetness and crisp texture.',
                'detail_size' => [
                    ['label' => 'Weight', 'value' => '500g'],
                    ['label' => 'Dimensions', 'value' => '10cm x 5cm']
                ],
                'detail_packing' => [
                    ['label' => 'Material', 'value' => 'Plastic'],
                    ['label' => 'Type', 'value' => 'Vacuum Pack']
                ],
                'detail_certificate' => [
                    ['label' => 'Halal', 'value' => 'Yes'],
                    ['label' => 'BPOM', 'value' => 'Yes']
                ],
                'meta_title' => 'Baby Corn - Fresh Vegetables',
                'meta_description' => 'Premium quality baby corn, fresh and tender for your cooking needs.',
                'meta_keywords' => 'baby corn, vegetables, fresh, cooking'
            ],
            [
                'name' => 'Bawang Merah Giling',
                'slug' => 'bawang-merah-giling',
                'short_description' => 'Finely minced red onions, ready to use in your cooking.',
                'category' => 'vegetables',
                'detail_name' => 'Minced Red Onion',
                'detail_desc' => 'Conveniently pre-minced red onions to save you time in the kitchen.',
                'detail_size' => [
                    ['label' => 'Weight', 'value' => '250g'],
                    ['label' => 'Dimensions', 'value' => '15cm x 10cm']
                ],
                'detail_packing' => [
                    ['label' => 'Material', 'value' => 'Plastic'],
                    ['label' => 'Type', 'value' => 'Resealable Bag']
                ],
                'detail_certificate' => [
                    ['label' => 'Halal', 'value' => 'Yes'],
                    ['label' => 'BPOM', 'value' => 'Yes']
                ],
                'meta_title' => 'Bawang Merah Giling - Minced Red Onion',
                'meta_description' => 'Conveniently pre-minced red onions for easy cooking.',
                'meta_keywords' => 'bawang merah, red onion, minced, cooking'
            ],
            [
                'name' => 'Bawang Putih Kupas',
                'slug' => 'bawang-putih-kupas',
                'short_description' => 'Peeled garlic cloves, ready to use in your recipes.',
                'category' => 'vegetables',
                'detail_name' => 'Peeled Garlic',
                'detail_desc' => 'Fresh peeled garlic cloves, saving you time and effort in food preparation.',
                'detail_size' => [
                    ['label' => 'Weight', 'value' => '200g'],
                    ['label' => 'Dimensions', 'value' => '12cm x 8cm']
                ],
                'detail_packing' => [
                    ['label' => 'Material', 'value' => 'Plastic'],
                    ['label' => 'Type', 'value' => 'Vacuum Pack']
                ],
                'detail_certificate' => [
                    ['label' => 'Halal', 'value' => 'Yes'],
                    ['label' => 'BPOM', 'value' => 'Yes']
                ],
                'meta_title' => 'Bawang Putih Kupas - Peeled Garlic',
                'meta_description' => 'Fresh peeled garlic cloves, ready to use in your cooking.',
                'meta_keywords' => 'bawang putih, garlic, peeled, cooking'
            ],
            [
                'name' => 'Fresh Strawberries',
                'slug' => 'fresh-strawberries',
                'short_description' => 'Sweet and juicy fresh strawberries, perfect for desserts.',
                'category' => 'fruits',
                'detail_name' => 'Premium Strawberries',
                'detail_desc' => 'Hand-picked fresh strawberries with natural sweetness and vibrant color.',
                'detail_size' => [
                    ['label' => 'Weight', 'value' => '300g'],
                    ['label' => 'Dimensions', 'value' => '20cm x 15cm']
                ],
                'detail_packing' => [
                    ['label' => 'Material', 'value' => 'Cardboard'],
                    ['label' => 'Type', 'value' => 'Clamshell']
                ],
                'detail_certificate' => [
                    ['label' => 'Halal', 'value' => 'Yes'],
                    ['label' => 'Organic', 'value' => 'Yes']
                ],
                'meta_title' => 'Fresh Strawberries - Premium Fruits',
                'meta_description' => 'Sweet and juicy fresh strawberries, perfect for desserts and snacking.',
                'meta_keywords' => 'strawberries, fruits, fresh, dessert'
            ],
            [
                'name' => 'Basil Leaves',
                'slug' => 'basil-leaves',
                'short_description' => 'Fresh aromatic basil leaves for cooking and garnishing.',
                'category' => 'herbs',
                'detail_name' => 'Fresh Basil',
                'detail_desc' => 'Aromatic fresh basil leaves, perfect for Italian dishes and garnishing.',
                'detail_size' => [
                    ['label' => 'Weight', 'value' => '50g'],
                    ['label' => 'Dimensions', 'value' => '8cm x 6cm']
                ],
                'detail_packing' => [
                    ['label' => 'Material', 'value' => 'Plastic'],
                    ['label' => 'Type', 'value' => 'Clamshell']
                ],
                'detail_certificate' => [
                    ['label' => 'Halal', 'value' => 'Yes'],
                    ['label' => 'Organic', 'value' => 'Yes']
                ],
                'meta_title' => 'Basil Leaves - Fresh Herbs',
                'meta_description' => 'Fresh aromatic basil leaves for cooking and garnishing.',
                'meta_keywords' => 'basil, herbs, fresh, cooking'
            ]
        ];

        foreach ($products as $productData) {
            $product = \App\Models\Product::create($productData);
            
            // Create sample images for each product
            \App\Models\ProductImage::create([
                'product_id' => $product->id,
                'image_path' => 'products/sample-' . $product->slug . '-1.jpg',
                'alt_text' => $product->name . ' - Main Image',
                'sort_order' => 0,
                'is_primary' => true
            ]);
            
            \App\Models\ProductImage::create([
                'product_id' => $product->id,
                'image_path' => 'products/sample-' . $product->slug . '-2.jpg',
                'alt_text' => $product->name . ' - Secondary Image',
                'sort_order' => 1,
                'is_primary' => false
            ]);
        }
    }
}
