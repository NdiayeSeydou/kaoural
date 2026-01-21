<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
           'name' => 'Test',
            'surname' => 'Users',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Testusers@123'),
            'telephone' => '+22300000000',
            'adresse' => 'Bamako, Mali',
            'role' => 2,
        ]);

         User::create([
            'name' => 'Mountaga',
            'surname' => 'Ndiaye',
            'email' => 'mountaga@gmail.com',
            'password' => Hash::make('Mountaga@123'),
            'telephone' => '+22376369679',
            'adresse' => 'Bamako, Mali',
            'role' => 1,
        ]);

        // admin
        User::create([
            'name' => 'Seydou',
            'surname' => 'Ndiaye',
            'email' => 'seydou@gmail.com',
            'password' => Hash::make('Seydoundiaye@123'),
            'telephone' => '+22379578636',
            'adresse' => 'Bamako, Mali',
            'role' => 0,
        ]);

        // client
        User::create([
            'name' => 'Aminata',
            'surname' => 'Traoré',
            'email' => 'aminata@gmail.com',
            'password' => Hash::make('Aminatatraore@123'),
            'telephone' => '+22372202009',
            'adresse' => 'Bamako, Mali',
            'role' => 2,
        ]);
    }
}
