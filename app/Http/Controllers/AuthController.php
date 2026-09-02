<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
        // Validasi minimal untuk memastikan payload masuk akal
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string"],
        ]);

        // Cek user
        $user = User::where("email", $credentials["email"])->first();

        // Cek user ada + password cocok (bandingkan dengan hash di DB)
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                "email" => ["Email atau password salah"]
            ]);
        }

        // plainTextToken hanya muncul sekali di sini — client wajib menyimpan
        $token = $user->createToken("api-token")->plainTextToken;

        return $this->success([
            "user" => $user->only(["id", "name", "email"]),
            "token" => $token,
        ], "Login berhasil");
    }

    public function logout(Request $request)
    {
        // Hapus hanya token yang sedang dipakai — token lain milik user ini tetap valid
        $request->user()->currentAccessToken()->delete();

        return $this->success(null, "Logout berhasil");
    }
}
