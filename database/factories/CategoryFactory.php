<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

// Dans CategoryFactory.php
    public function definition(): array
    {
        return [
            // Utilise word() pour avoir une infinité de possibilités
            'name' => fake()->word() . ' ' . fake()->randomDigit(),
            'description' => fake()->sentence(10),
        ];
    }
}
