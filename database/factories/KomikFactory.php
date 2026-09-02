<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Komik>
 */
class KomikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'penulis' => $this->faker->name(),
            // Rentang 1-5 mengikuti jumlah kategori yang di-seed KategoriSeeder
            'kategori_id' => $this->faker->numberBetween(1, 5),
            'stok' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            // 50% dummy komik punya file_pdf, sisanya null
            'file_pdf' => $this->faker->optional(0.5)->passthrough($this->faker->word() . '.pdf'),
        ];
    }
}
