<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class ClassroomMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::get();
        foreach ($students as $student) {
            $student->classrooms()->attach(1);
        }
    }
}
