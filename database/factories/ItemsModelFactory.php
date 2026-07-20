<?php

namespace Database\Factories;

use App\Models\ItemsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ItemsModel>
 */
class ItemsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement([
                'available',
                'unavailable'
            ]),
        ];
    }
}
