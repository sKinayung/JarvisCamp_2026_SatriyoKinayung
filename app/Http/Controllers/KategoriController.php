<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Http\Resources\KategoriResource;
use App\Services\KategoriService;
use App\Traits\ApiResponse;

class KategoriController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */

    public function __construct(protected KategoriService $kategoriService) {}
    public function index()
    {
        $kategori = $this->kategoriService->index();
        return $this->success(
            KategoriResource::collection($kategori),
            "Daftar komik berhasil diambil"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        //validated(): hanya field yang lolos Form Request (aman dari mass-assignment)

        $kategori = $this->kategoriService->store($request->validated());
        return $this->success(new KategoriResource($kategori), "Kategori berhasil ditambahkan", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = $this->kategoriService->show($id);

        return $this->success(new KategoriResource($kategori), "Detail berhasil diambil");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, string $id)
    {
        $kategori = $this->kategoriService->update($id, $request->validated());

        return $this->success(new KategoriResource($kategori), "Kategori berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->kategoriService->destroy($id);
        return $this->success(null, "Kategori berhasil dihapus");
    }
}
