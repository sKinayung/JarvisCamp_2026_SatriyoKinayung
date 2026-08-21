<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use App\Traits\ApiResponse;

class KomikController extends Controller
{
    use ApiResponse;

    public function __construct(protected KomikService $komikService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(KomikResource::collection($this->komikService->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKomikRequest $request)
    {
        $komik = Komik::create($request->validate());

        return $this->success(new KomikResource($komik), 'Komik Berhasil Ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->success(new KomikResource($this->komikService->getById($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKomikRequest $request, string $id)
    {
        $komik = Komik::findOrFail($id);

        $komik->update($request->validated());

        return $this->success(new KomikResource($komik), 'Komik Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Komik::findOrFail($id)->delete();

        return $this->success(null, 'Komik Berhasil Dihapus');
    }
}
