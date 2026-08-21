<?php

namespace App\Http\Controllers;

use App\Services\PeminjamanService;
use App\services\PeminjamanServices;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected PeminjamanServices $peminjamanServices) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "anggota_id" => "required|exists:anggota,id",
            "komik_id" => "required|exists:komik,id",
        ]);
        $peminjaman = $this->peminjamanServices->pinjam($request->all());

        return response()->json([
            "message" => 'Peminjaman berhasil dibuat',
            "data" => $peminjaman
        ], 201);
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
