<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Email atau Password salah', 401);
        }

        $user = Auth::user();
        $token = $user->createToken('admin-token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ], 'Login berhasil !');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return $this->success('Logout berhasil', [
            'user' => $user,
            'token' => $token
        ]);
    }
}
