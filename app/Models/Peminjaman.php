<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'anggota_id',
        'komik_id',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'status',
    ];
    // Transaksi menunjuk ke satu anggota...
    public function anggota(): BelongsTo
    {
        return $this->belongsTo(Anggota::class);
    }
    // ...dan satu komik
    public function komik(): BelongsTo
    {
        return $this->belongsTo(Komik::class);
    }
}
