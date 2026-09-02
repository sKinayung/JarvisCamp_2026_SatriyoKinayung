<?php

namespace App\Services;

use App\Models\Komik;
use Illuminate\Database\Eloquent\Collection;

class KomikService
{
    // Selalu eager-load relasi kategori supaya KomikResource bisa menampilkan nama_kategori tanpa memicu query N+1

    public function index(): Collection
    {
        return Komik::with('kategori')->get();
    }

    // refresh(): ambil ulang dari DB (dapat default 'status' & timestamps).
    // load('kategori'): pasang relasi supaya bisa dibaca resource

    public function store(array $data): Komik
    {
        return Komik::create($data)->refresh()->load('kategori');
    }

    public function show(int|string $id): Komik
    {
        return Komik::with("kategori")->findOrFail($id);
    }

    public function update(int|string $id, array $data): Komik
    {
        $komik = Komik::findOrFail($id);
        $komik->update($data);
        // fresh('kategori'): reload dari DB + eager load relasi sekaligus
        return $komik->fresh('kategori');
    }

    public function destroy(int|string $id): void
    {
        Komik::findOrFail($id)->delete();
    }
}
