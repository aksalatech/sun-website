<?php

namespace Database\Factories;

use App\Models\QualityCheck;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QualityCheck>
 */
class QualityCheckFactory extends Factory
{
    protected $model = QualityCheck::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'text' => '<strong>'.$this->faker->words(3, true).'</strong> '.$this->faker->sentence(12),
            'icon' => null,
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}


