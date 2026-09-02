<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Bikin 1 admin default untuk testing login
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Urutan penting: kategori dulu (FK-nya dipakai komik),
        // lalu komik & anggota, terakhir peminjaman (butuh keduanya).

        $this->call([
            KategoriSeeder::class,
            KomikSeeder::class,
            AnggotaSeeder::class,
            PeminjamanSeeder::class,
        ]);
    }
}
