<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Création de catégories réalistes
        $categories = [
            ['name' => 'Factures', 'description' => 'Documents de facturation et reçus'],
            ['name' => 'Contrats', 'description' => 'Contrats de travail et partenariats'],
            ['name' => 'Rapports', 'description' => 'Rapports d\'activité et bilans'],
            ['name' => 'Identité', 'description' => 'Copies de cartes d\'identité et passeports'],
            ['name' => 'Personnel', 'description' => 'Documents personnels et divers'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate($cat);
        }

        // 2. Création de l'utilisateur de test
        // On utilise updateOrCreate pour éviter les erreurs si tu relances le seeder
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin DocuTrack',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // 3. Optionnel : Créer quelques utilisateurs aléatoires en plus
        User::factory(5)->create();
    }
}
