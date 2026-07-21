<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\KategoriModel;
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
            'judul' => $this->faker->sentence(),
            'penulis' => $this->faker->name(),
            'kategori_id' => Kategori::inRandomOrder()->first()?->id ?? Kategori::factory(),
            'stok' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'file_pdf' => $this->faker->optional()->filePath(),
        ];
    }
}
