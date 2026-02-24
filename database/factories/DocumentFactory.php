<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'file_path' => 'documents/test_file.pdf', // Un chemin fictif
            'category_id' => Category::factory(), // Crée une catégorie si aucune n'est fournie
            'user_id' => User::first()?->id ?? User::factory(), // Utilise le 1er utilisateur ou en crée un
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
