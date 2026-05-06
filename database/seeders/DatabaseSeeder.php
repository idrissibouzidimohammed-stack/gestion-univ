<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GroupeSeeder::class,
            ProfesseurSeeder::class,
            EtudiantSeeder::class,
            ModuleSeeder::class,
        ]);
    }
}