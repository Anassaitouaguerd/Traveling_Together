<?php

namespace App\Http\Requests\Back_office\Gares;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGaresRequest extends FormRequest
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
            'name' => 'required',
            'ville_id' => 'required',
            'date_depart' => 'required',
            'date_arrivee' => 'required',
        ];
    }
}