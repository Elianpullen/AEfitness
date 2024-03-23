<?php

namespace Database\Seeders;

use App\Models\weightData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeightDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        weightData::factory()->create([
            'weight' => 69,
            'bodyfat' => 22,
            'date' => new \DateTime('01-01-2024'),
        ]);
    }
}
