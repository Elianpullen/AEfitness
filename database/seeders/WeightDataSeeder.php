<?php

namespace Database\Seeders;

use App\Models\weightData;
use Illuminate\Database\Seeder;

class WeightDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        weightData::truncate();
        $csvFile = fopen(base_path("database/weightDataBackup.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                weightData::create([
                    "user_id" => $data['1'],
                    "date" => $data['2'],
                    "weight" => $data['3'],
                    "bodyfat" => $data['4'],
                    "created_at" => $data['5'],
                    "updated_at" => $data['6']]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
