<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Resources\AnggotaSource;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AnggotaSource::collection(Anggota::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaRequest $request)
    {
        $anggota = Anggota::create($request->all());

        return response()->json([
            'message' => 'Anggota berhasil ditambahkan',
            'data' => new AnggotaSource($anggota)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new AnggotaSource(Anggota::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaRequest $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return response()->json([
            'message' => 'Anggota berhasil di update',
            'data' => new AnggotaSource($anggota)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Anggota berhasil dihapus'
        ]);
    }
}
