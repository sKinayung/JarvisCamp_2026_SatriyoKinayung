<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use App\Services\KomikService;
use App\Traits\ApiResponse;

class KomikController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected KomikService $komikService) {}
    public function index()
    {
        $komik = $this->komikService->index();
        return $this->success(
            KomikResource::collection($komik),
            "Daftar komik berhasil diambil"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKomikRequest $request)
    {
        // safe()->except(): ambil semua field valid kecuali file_pdf (di-handle terpi sah)
        $data = $request->safe()->except('file_pdf');
        // Simpan file ke storage/app/public/komiks — yang disimpan di DB hanyalah path-nya
        if ($request->hasFile("file_pdf")) {
            $data['file_pdf'] = $request->file("file_pdf")->store("komik", "public");
        }

        $komik = $this->komikService->store($data);
        return $this->success(new KomikResource($komik), "Komik berhasil ditambahkan", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $komik = $this->komikService->show($id);
        return $this->success(new KomikResource($komik), "Data komik berhasil diambil");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKomikRequest $request, string $id)
    {
        // safe()->except(): ambil semua field valid kecuali file_pdf (di-handle terpi sah)
        $data = $request->safe()->except('file_pdf');
        // Simpan file ke storage/app/public/komiks — yang disimpan di DB hanyalah path-nya
        if ($request->hasFile("file_pdf")) {
            $data['file_pdf'] = $request->file("file_pdf")->store("komik", "public");
        }

        $komik = $this->komikService->update($id, $data);
        return $this->success(new KomikResource($komik), "Komik berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->komikService->destroy($id);
        return $this->success(null, "Komik berhasil dihapus");
    }
}
