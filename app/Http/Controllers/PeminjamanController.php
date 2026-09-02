<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Http\Resources\PeminjamanResource;
use App\Services\PeminjamanService;
use App\Traits\ApiResponse;
use DomainException;
use RuntimeException;

class PeminjamanController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected PeminjamanService $peminjamanService) {}
    public function index()
    {
        $peminjaman = $this->peminjamanService->index();
        return $this->success(PeminjamanResource::collection($peminjaman), "Daftar peminjaman berhasil diambil", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeminjamanRequest $request)
    {
        try {
            $peminjaman = $this->peminjamanService->store($request->validated());
        } catch (RuntimeException $e) {
            return $this->error($e->getMessage(), 400);
        }

        return $this->success(
            new PeminjamanResource($peminjaman),
            "Peminjaman berhasil dibuat",
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = $this->peminjamanService->show($id);
        return $this->success(new PeminjamanResource($peminjaman), "Detail peminjaman berhasil diambil");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, string $id)
    {
        $peminjaman = $this->peminjamanService->update($id, $request->validated());
        return $this->success(new PeminjamanResource($peminjaman), "Peminjaman berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->peminjamanService->destroy($id);
        return $this->success(null, "Peminjaman berhasil dihapus");
    }

    // Aksi bisnis khusus: pengembalian komik
    public function kembali(string $id)
    {
        try {
            $peminjaman = $this->peminjamanService->kembali($id);
        } catch (DomainException $e) {
            // Sudah dikembalikan sebelumnya
            return $this->error($e->getMessage(), 400);
        }
        return $this->success(
            new PeminjamanResource($peminjaman),
            'Pengembalian komik berhasil.'
        );
    }
}
