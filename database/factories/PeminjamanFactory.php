<?php

namespace Database\Factories;

use App\Models\Peminjaman;
use App\Models\Komik;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Anggota::factory(): kalau seeder tidak mengoper anggota_id, factory otomatis
            // membuatkan anggota baru terlebih dulu. Sama untuk komik_id

            'anggota_id' => Anggota::factory(),
            'komik_id' => Komik::factory(),
            'tanggal_peminjaman' => fake()->date(),
            'tanggal_kembali' => fake()->optional()->date(),
            'status' => fake()->randomElement(['pending', 'approved', 'returned']),
        ];
    }
}
