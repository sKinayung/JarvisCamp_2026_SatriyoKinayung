<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<KategoriModel>
 */
class KategoriModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->randomElement([
                'Action',
                'Adventure',
                'Comedy',
                'Drama',
                'Fantasy',
                'Horror',
                'Mystery',
                'Romance',
                'Sci-Fi',
                'Slice of Life',
                'Sports',
                'Thriller'
            ])
        ];
    }
}
