<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKomikRequest extends FormRequest
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
            "judul" => ["required", "string", "max:255"],
            "penulis" => ["required", "string", "max:255"],
            "kategori_id" => ["required", "integer", "exists:kategori,id"],
            "stok" => ["required", "integer", "min:0"],
            // opsional, wajib PDF, maksimal 2 MB
            'file_pdf' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        ];
    }
}
