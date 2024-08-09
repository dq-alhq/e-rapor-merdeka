<?php

namespace Database\Seeders;

use App\Models\Tapel;
use Illuminate\Database\Seeder;

class TapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tapel::create([
            'tapel' => 2024,
            'semester' => '1',
            'tanggal_rapor' => now(),
            'tempat_rapor' => 'Melirang',
        ]);

        Tapel::create([
            'tapel' => 2024,
            'semester' => '2',
            'tanggal_rapor' => now(),
            'tempat_rapor' => 'Melirang',
        ]);
    }
}
