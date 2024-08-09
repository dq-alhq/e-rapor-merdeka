<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            7, 8, 9,
        ])->each(fn ($n) => Classroom::create(['tapel_id' => 1, 'tingkat' => $n]));
    }
}
