<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Elian',
            'email' => 'elian@elian.nl',
            'password' => Hash::make('password'),
        ]);

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
        User::factory()
            ->count(7)
            ->create();
    }
}
