<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Untuk update, semua field opsional (pakai sometimes ) supaya bisa update sebagian:
            "anggota_id" => ["sometimes", "integer", "exists:anggota,id"],
            "komik_id" => ["sometimes", "integer", "exists:komik,id"],
            "tanggal_pinjam" => ["sometimes", "date"],
            "tanggal_kembali" => ["nullable", "date"],
            "status" => ["sometimes", "in:dipinjam,dikembalikan,telat"],
        ];
    }
}
