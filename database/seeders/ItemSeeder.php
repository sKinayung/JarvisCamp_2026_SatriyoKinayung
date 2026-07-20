<?php

namespace Database\Seeders;

use App\Models\ItemsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemsModel::factory()->count(20)->create();
    }
}
