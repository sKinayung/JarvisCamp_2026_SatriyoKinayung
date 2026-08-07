<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AnggotaSource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nama" => $this->nama,
            "no_hp" => Str::mask($this->no_hp, '*', 4, -4),
            "alamat" => $this->alamat,
            "tanggal_daftar" => $this->tanggal_daftar,

            "created_at" => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
