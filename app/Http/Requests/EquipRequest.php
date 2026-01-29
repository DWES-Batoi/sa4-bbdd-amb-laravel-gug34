<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'min:3'],
            'estadi_id' => ['required', 'integer', 'exists:estadis,id'],
            'titols' => ['required', 'integer', 'min:0'],
            'escut' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }
}