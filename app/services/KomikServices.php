<?php

namespace App\Services;

use App\Models\Komik;

class KomikService
{
    public function getAll()
    {
        return Komik::with("kategori")->get();
    }

    public function getById(string $id)
    {
        return Komik::with("kategori")->findOrFail($id);
    }
}
