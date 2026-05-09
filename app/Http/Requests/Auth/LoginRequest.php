<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest

{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string',],
            'remember' => ['nullable', 'boolean'],
        ];
    }


    public function messages(): array
    {
        return [
            'email.required' => 'Поле обов’язкове до заповнення.',
            'email.email' => 'Адреса має містити символ "@".',
        ];
    }


}
