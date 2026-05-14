<?php

namespace App\Http\Requests\Finances;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:50'],
            'balance' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'exists:currencies,currency_id'],
            'type' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Назва рахунку обов’язкова для заповнення.',
            'name.min' => 'Назва рахунку має містити мінімум 3 символи.',
            'name.max' => 'Назва рахунку має містити максимум 100 символів.',
            'currency.required' => 'Виберіть валюту для гаманця',
            'type.required' => 'Виберіть спосіб зберігання грошей ',
        ];
    }
}
