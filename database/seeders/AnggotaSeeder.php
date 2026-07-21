<?php

namespace Database\Seeders;

use App\Models\AnggotaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnggotaModel::factory()->count(15)->create();
    }
}
