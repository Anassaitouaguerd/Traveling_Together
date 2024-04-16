<?php

namespace App\Http\Requests\Back_office\Voyages;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoyageRequest extends FormRequest
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
            'prix' => 'required|numeric',
            'gare_depart' => 'required',
            'gare_arrivee' => 'required',
            'date_depart' => 'required',
            'date_arrivee' => 'required'
        ];
    }
}