<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professeur;

class ProfesseurSeeder extends Seeder
{
    public function run(): void
    {
        Professeur::create([
            'user_id' => 2,
            'cin' => 'D111111',
            'specialite' => 'Développement Web',
            'telephone' => '0611111111',
        ]);

        Professeur::create([
            'user_id' => 3,
            'cin' => 'D222222',
            'specialite' => 'Base de Données',
            'telephone' => '0622222222',
        ]);
    }
}