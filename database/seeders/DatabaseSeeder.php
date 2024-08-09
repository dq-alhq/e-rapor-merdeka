<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@teerakat.in',
            'password' => bcrypt('password'),
        ]);

        // $this->call(LocationSeeder::class);
        // Dev Only
        \App\Models\Location\Province::create(['id' => 1, 'name' => 'Jawa Timur']);
        \App\Models\Location\Regency::create(['province_id' => 1, 'id' => 1, 'name' => 'Gresik']);
        \App\Models\Location\District::create(['regency_id' => 1, 'id' => 1, 'name' => 'Bungah']);
        \App\Models\Location\Village::create(['district_id' => 1, 'id' => 3525122004, 'name' => 'Melirang']);

        \App\Models\Student::factory(20)->create();
        \App\Models\Teacher::factory(20)->create();

        $this->call([
            SchoolSeeder::class,
            TapelSeeder::class,
            ClassroomSeeder::class,
            MapelSeeder::class,
            ClassroomMemberSeeder::class,
            ProjectSeeder::class
        ]);
    }
}
