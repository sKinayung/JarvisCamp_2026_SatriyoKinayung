<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'tanggal_daftar',
    ];

    // Satu anggota memiliki banyak riwayat peminjaman
    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
}
