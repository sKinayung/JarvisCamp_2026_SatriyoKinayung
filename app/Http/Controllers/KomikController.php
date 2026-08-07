<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;

class KomikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Komik::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKomikRequest $request)
    {
        $komik = Komik::create($request->all());

        return response()->json([
            'message' => "Komik berhasil ditambahkan",
            'data' => new KomikResource($komik)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new KomikResource(Komik::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKomikRequest $request, string $id)
    {
        $komik = Komik::findOrFail($id);

        $komik->update($request->all());

        return response()->json([
            'message' => 'Komik berhasil di update',
            'data' => new KomikResource($komik)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Komik::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Komik berhasil di hapus',
        ]);
    }
}
