<?php

namespace Database\Seeders;

use App\Models\Excul;
use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['nama' => 'Pendidikan Agama Islam', 'code' => 'PAI'],
            ['nama' => 'Aqidah Akhlaq', 'code' => 'AQA'],
            ['nama' => "Qur'an Hadits", 'code' => 'QRA'],
            ['nama' => 'Fiqih', 'code' => 'FQH'],
            ['nama' => 'Sejarah Kebudayaan Islam', 'code' => 'SKI'],
            ['nama' => 'Bahasa Arab', 'code' => 'BAR'],
            ['nama' => 'Aswaja', 'code' => 'AWJ'],
            ['nama' => 'Pembiasaan', 'code' => 'PBS'],
            ['nama' => 'Pendidikan Pancasila', 'code' => 'PKN'],
            ['nama' => 'Matematika', 'code' => 'MTK'],
            ['nama' => 'Ilmu Pengetahuan Alam', 'code' => 'IPA'],
            ['nama' => 'Ilmu Pengetahuan Sosial', 'code' => 'IPS'],
            ['nama' => 'Bahasa Indonesia', 'code' => 'BIN'],
            ['nama' => 'Bahasa Inggris', 'code' => 'BIG'],
            ['nama' => 'Pendidikan Jasmani & Orkes', 'code' => 'PJOK'],
            ['nama' => 'Informatika', 'code' => 'TIK'],
            ['nama' => 'Seni', 'code' => 'SBK'],
            ['nama' => 'Bahasa Daerah', 'code' => 'BDR'],
            ['nama' => 'Pendidikan Lingkungan Hidup', 'code' => 'PLH']
        ])->each(fn($mapel) => Mapel::create($mapel));

        collect([
            ['nama' => 'Al-Banjari', 'code' => 'ABJ'],
            ['nama' => 'Pencak Silat', 'code' => 'PST'],
            ['nama' => 'Futsal', 'code' => 'FTS']
        ])->each(fn($excul) => Excul::create($excul));
    }
}
