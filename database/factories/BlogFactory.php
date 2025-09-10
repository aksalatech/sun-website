<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'meta_title' => fake()->sentence(),
            'meta_description' => fake()->sentence(),
            'meta_keywords' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'image' => '3.jpg',
            'content' => fake()->paragraph(),
            'is_active' => fake()->boolean(),
        ];
    }
}
