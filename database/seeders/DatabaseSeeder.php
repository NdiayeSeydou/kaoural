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
      
        // admin
         User::create([

            'name' => 'Mountaga',

            'surname' => 'Ndiaye',

            'email' => 'mountaga@gmail.com',

            'password' => Hash::make('Mountaga@76369679'),

            'telephone' => '+223 76 36 96 79',

            'adresse' => 'Bamako, Mali',

            'role' => 1,
        ]);

        // superadmin
        User::create([

            'name' => 'Seydou',

            'surname' => 'Ndiaye',

            'email' => 'ndiayeseydouyongui@gmail.com',

            'password' => Hash::make('Seydoundiaye@79578636'),

            'telephone' => '+223 79 57 86 36',

            'adresse' => 'Bamako, Mali',

            'role' => 0,
        ]);

        // client
        User::create([

            'name' => 'Salia',

            'surname' => 'Traoré',

            'email' => 'salia@gmail.com',

            'password' => Hash::make('Saliatraore@65026232'),

            'telephone' => '+223 65 02 62 32',

            'adresse' => 'Bamako, Mali',

            'role' => 2,
        ]);
    }
}
