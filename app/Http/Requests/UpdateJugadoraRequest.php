<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJugadoraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'equip_id' => 'required|integer|exists:equips,id',
            'data_naixement' => 'required|date|before:-16 years',
            'dorsal' => 'required|integer|min:1|max:99',
            'foto' => 'nullable|image|mimes:png|max:2048',
        ];
    }
}