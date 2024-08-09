<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'nis' => $nis = fake()->unique()->randomNumber(5),
            'nisn' => fake()->unique()->randomNumber(9),
            'nik' => fake()->unique()->randomNumber(9),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'agama' => fake()->numberBetween(1, 6),
            'alamat' => fake()->streetName(),
            'village_id' => 3525122004,
            'anak_ke' => fake()->numberBetween(1, 4),
            'status_anak' => 1,
            'telepon' => fake()->phoneNumber(),
            'ayah' => $father = fake()->name('male'),
            'pekerjaan_ayah' => fake()->numberBetween(1, 12),
            'ibu' => fake()->name('female'),
            'pekerjaan_ibu' => fake()->numberBetween(1, 12),
            'wali' => $father,
            'pekerjaan_wali' => fake()->numberBetween(1, 12),
            'tahun_masuk' => fake()->year(),
            'asal_sekolah' => fake()->company()
        ];
    }
}
