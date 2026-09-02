<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
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
            // exists: anggota_id/komik_id harus benar-benar ada di DB
            "anggota_id" => ['required', "integer", "exists:anggota,id"],
            "komik_id" => ['required', "integer", "exists:komik,id"],
            "tanggal_peminjaman" => ["required", "date"],
        ];
    }
}
