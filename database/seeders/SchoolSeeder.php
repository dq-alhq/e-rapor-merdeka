<?php

namespace Database\Seeders;

use App\Enums\Level;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'nama' => 'SMP Maarif Miftahul Ulum',
            'jenjang' => Level::SMP->value,
            'npsn' => '20537004',
            'nss' => '204050115072',
            'nds' => 'E.01152004',
            'nis' => '200460',
            'alamat' => 'Jl. Raya Melirang No.29',
            'village_id' => 3525122004,
            'kode_pos' => '61152',
            'telepon' => '031-3944761',
            'kepsek_id' => Teacher::all()->random()->id,
        ]);
    }
}
