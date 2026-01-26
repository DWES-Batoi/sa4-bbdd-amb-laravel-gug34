<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JugadoraRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'equip_id' => ['required', 'exists:equips,id'],
            'data_naixement' => ['required', 'date', 'before:-16 years'],
            'dorsal' => ['required', 'integer', 'min:1', 'max:99'],
        ];
    }
}
