<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AnggotaModel>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'no_hp' => $this->faker->numerify('08##########'),
            'alamat' => $this->faker->address(),
            'tanggal_daftar' => $this->faker->date(),
        ];
    }
}
