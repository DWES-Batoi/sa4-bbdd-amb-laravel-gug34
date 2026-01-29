<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regles de validació per a actualitzar un equip.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|min:3|unique:equips,nom,' . $this->route('equip')->id,
            'estadi_id' => 'required|integer|exists:estadis,id',
            'titols' => 'required|integer|min:0',
            'escut' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}