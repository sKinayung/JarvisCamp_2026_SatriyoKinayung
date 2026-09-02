<?php

namespace App\Traits;

trait ApiResponse
{
    // Standar respon sukses: { succes: true, message: "...", data: {...} }

    protected function success(mixed $data = null, string $message = "Berhasil", int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    // Standar response gagal: { success: false, message, data: null }
    protected function error(string $message = "Terjadi Kesalahan", int $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
        ], $status);
    }
}
