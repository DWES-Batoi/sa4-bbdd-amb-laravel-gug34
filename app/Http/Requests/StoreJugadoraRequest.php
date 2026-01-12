<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJugadoraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'equip_id' => 'required|integer|exists:equips,id',
            'data_naixement' => 'required|date|before:-16 years',
            'dorsal' => 'required|integer|min:1|max:99',
            'foto' => 'nullable|image|mimes:png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'data_naixement.before' => 'La jugadora ha de tindre almenys 16 anys.',
            'foto.mimes' => 'La foto ha de ser un fitxer de tipus .png',
        ];
    }
}
