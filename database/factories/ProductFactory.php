<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);
        
        return [
            'name' => $name,
            'slug' => \Str::slug($name),
            'short_description' => fake()->sentence(10),
            'category' => fake()->randomElement(['skincare', 'makeup', 'health', 'beauty', 'supplements']),
            'detail_name' => fake()->words(2, true),
            'detail_desc' => fake()->paragraph(3),
            'detail_size' => [
                'weight' => fake()->randomFloat(2, 10, 1000) . 'g',
                'dimensions' => fake()->randomFloat(1, 5, 50) . 'cm x ' . fake()->randomFloat(1, 5, 50) . 'cm',
            ],
            'detail_packing' => [
                'material' => fake()->randomElement(['Plastic', 'Glass', 'Metal', 'Cardboard']),
                'type' => fake()->randomElement(['Bottle', 'Tube', 'Jar', 'Sachet']),
            ],
            'detail_certificate' => [
                'halal' => fake()->boolean(),
                'bpom' => fake()->boolean(),
                'iso' => fake()->boolean(),
            ],
            'meta_title' => fake()->sentence(6),
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => fake()->words(5, true),
        ];
    }
}
