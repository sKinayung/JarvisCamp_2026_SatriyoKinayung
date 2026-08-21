<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json([
        'message' => 'Hello World - API is working',
    ]);
});

Route::post('/peminjaman', [PeminjamanController::class, 'store']);

Route::apiResource('items', ItemController::class);
Route::apiResource('kategori', KategoriController::class);
Route::apiResource('komik', KomikController::class);
Route::apiResource('anggota', AnggotaController::class);
