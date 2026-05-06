<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        Module::create([
            'nom' => 'Technologie Web 2',
            'code' => 'TW2',
            'credits' => 3,
            'professeur_id' => 1,
            'groupe_id' => 1,
        ]);

        Module::create([
            'nom' => 'Base de Données',
            'code' => 'BD',
            'credits' => 3,
            'professeur_id' => 2,
            'groupe_id' => 1,
        ]);

        Module::create([
            'nom' => 'Algorithmique',
            'code' => 'ALGO',
            'credits' => 3,
            'professeur_id' => 1,
            'groupe_id' => 2,
        ]);

        Module::create([
            'nom' => 'Réseaux',
            'code' => 'RES',
            'credits' => 3,
            'professeur_id' => 2,
            'groupe_id' => 2,
        ]);

        Module::create([
            'nom' => 'Systèmes d\'exploitation',
            'code' => 'SE',
            'credits' => 3,
            'professeur_id' => 1,
            'groupe_id' => 1,
        ]);
    }
}