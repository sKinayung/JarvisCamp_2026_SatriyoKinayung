<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // FK + constraint di level DB. cascadeOnDelete: kalau anggota/komik dihapus,
            // baris peminjaman terkait ikut terhapus otomatis.
            $table->foreignId('anggota_id')->constrained('anggota')->cascadeOnDelete();
            $table->foreignId('komik_id')->constrained('komik')->cascadeOnDelete();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali')->nullable();
            $table->string('status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
