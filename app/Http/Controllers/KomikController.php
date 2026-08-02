<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $komik = Komik::create($request->all());

        return response()->json([
            'message' => "Komik berhasil ditambahkan",
            'data' => $komik
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Komik::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komik = Komik::findOrFail($id);

        $komik->update($request->all());

        return response()->json([
            'message' => 'Komik berhasil di update',
            'data' => $komik
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
