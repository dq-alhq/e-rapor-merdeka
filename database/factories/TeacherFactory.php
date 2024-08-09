<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gender' => $gender = fake()->randomElement(['L', 'P']),
            'nama' => $nama = fake()->name($gender == 'L' ? 'male' : 'female'),
            'kd' => $kd = fake()->unique()->userName(),
            'nip' => fake()->unique()->randomNumber(9),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'nuptk' => fake()->unique()->randomNumber(9),
            'nik' => fake()->unique()->randomNumber(9),
            'alamat' => fake()->streetName(),
            'village_id' => 3525122004,
        ];
    }
}
