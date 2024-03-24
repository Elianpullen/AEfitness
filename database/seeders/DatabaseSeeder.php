<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gerjan',
            'email' => 'gerjan@gerjan.nl',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Arnout',
            'email' => 'arnout@arnout.nl',
            'password' => Hash::make('password'),
        ]);
        ($this->call(WeightDataSeeder::class));
    }
}
