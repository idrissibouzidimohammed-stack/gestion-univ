<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etudiant;

class EtudiantSeeder extends Seeder
{
    public function run(): void
    {
        Etudiant::create([
            'user_id' => 4,
            'groupe_id' => 1,
            'cin' => 'D123456',
            'apogee' => '20210001',
            'telephone' => '0612345678',
            'date_naissance' => '2001-05-15',
        ]);

        Etudiant::create([
            'user_id' => 5,
            'groupe_id' => 1,
            'cin' => 'D234567',
            'apogee' => '20210002',
            'telephone' => '0623456789',
            'date_naissance' => '2001-08-22',
        ]);

        Etudiant::create([
            'user_id' => 6,
            'groupe_id' => 2,
            'cin' => 'D345678',
            'apogee' => '20210003',
            'telephone' => '0634567890',
            'date_naissance' => '2002-01-10',
        ]);
    }
}