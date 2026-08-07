<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|starts_with:08|min:10|max:13',
            'alamat' => 'sometimes|required|string',
            'tanggal_daftar' => 'sometimes|required|date|before_or_equal:today',
        ];
    }
}
