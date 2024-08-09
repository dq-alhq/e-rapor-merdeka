<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/locations/provinces.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 555, ';')) !== false) {
            if (! $firstline) {
                \App\Models\Location\Province::create([
                    'id' => $data['0'],
                    'name' => $data['1'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        // Regency Seeder
        $csvFile = fopen(base_path('database/locations/regencies.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 555, ';')) !== false) {
            if (! $firstline) {
                \App\Models\Location\Regency::create([
                    'id' => $data['0'],
                    'province_id' => $data['1'],
                    'name' => $data['2'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        // District Seeder
        $csvFile = fopen(base_path('database/locations/districts.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 555, ';')) !== false) {
            if (! $firstline) {
                \App\Models\Location\District::create([
                    'id' => $data['0'],
                    'regency_id' => $data['1'],
                    'name' => $data['2'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        // Village Seeder
        $csvFile = fopen(base_path('database/locations/villages.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 555, ';')) !== false) {
            if (! $firstline) {
                \App\Models\Location\Village::create([
                    'id' => $data['0'],
                    'district_id' => $data['1'],
                    'name' => $data['2'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
