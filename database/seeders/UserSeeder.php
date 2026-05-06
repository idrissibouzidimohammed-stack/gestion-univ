<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin UPF',
            'email' => 'admin@upf.ma',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Professeurs
        User::create([
            'name' => 'Pr. Kzadri Marwane',
            'email' => 'kzadri@upf.ma',
            'password' => Hash::make('password'),
            'role' => 'professeur',
        ]);

        User::create([
            'name' => 'Pr. Alami Hassan',
            'email' => 'alami@upf.ma',
            'password' => Hash::make('password'),
            'role' => 'professeur',
        ]);

        // Etudiants
        User::create([
            'name' => 'Idriss Bouzidi',
            'email' => 'idriss@upf.ma',
            'password' => Hash::make('password'),
            'role' => 'etudiant',
        ]);

        User::create([
            'name' => 'Sara Bennani',
            'email' => 'sara@upf.ma',
            'password' => Hash::make('password'),
            'role' => 'etudiant',
        ]);

        User::create([
            'name' => 'Youssef Idrissi',
            'email' => 'youssef@upf.ma',
            'password' => Hash::make('password'),
            'role' => 'etudiant',
        ]);
    }
}