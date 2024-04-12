<?php

namespace App\Http\Requests\Back_office\Users;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required|min:4',
            'email' => 'email|required|min:4',
            'tele' => 'regex:/^\+?[0-9]{10,13}$/',
            'password' => 'required|min:6|max:16|confirmed',
        ];
    }
}