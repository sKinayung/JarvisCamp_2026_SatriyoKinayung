<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
// Endpoint publik untuk mendapatkan token — dipakai sebelum akses endpoint terproteksi
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Semua route di dalam grup ini WAJIB Bearer Token valid di header Authorization
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // apiResource = 5 route CRUD sekaligus (index, store, show, update, destroy)
    Route::apiResource('kategori', KategoriController::class);
    Route::apiResource('komik', KomikController::class);
    Route::apiResource('anggota', AnggotaController::class);
    Route::apiResource('peminjaman', PeminjamanController::class);
    // Endpoint tambahan di luar CRUD standar: aksi pengembalian komik
    Route::put('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali']);
});
