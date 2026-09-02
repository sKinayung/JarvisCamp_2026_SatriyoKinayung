<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komik extends Model
{
    use HasFactory;
    protected $table = 'komik';

    protected $fillable = [
        'judul',
        'penulis',
        'kategori_id',
        'stok',
        'status',
        'file_pdf'
    ];

    // Setiap komik dimiliki oleh satu kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    // 1 komik bisa dipinjam berkali-kali (di waktu berbeda)
    public function peminjama(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
}
