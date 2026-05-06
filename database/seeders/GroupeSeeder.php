<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Groupe;

class GroupeSeeder extends Seeder
{
    public function run(): void
    {
        Groupe::create([
            'nom' => 'GINFO3A',
            'filiere' => 'Génie Informatique',
            'annee' => 3,
        ]);

        Groupe::create([
            'nom' => 'GINFO3B',
            'filiere' => 'Génie Informatique',
            'annee' => 3,
        ]);

        Groupe::create([
            'nom' => 'GINFO2A',
            'filiere' => 'Génie Informatique',
            'annee' => 2,
        ]);

        Groupe::create([
            'nom' => 'GINFO1A',
            'filiere' => 'Génie Informatique',
            'annee' => 1,
        ]);

        Groupe::create([
            'nom' => 'GINFO1B',
            'filiere' => 'Génie Informatique',
            'annee' => 1,
        ]);
    }
}