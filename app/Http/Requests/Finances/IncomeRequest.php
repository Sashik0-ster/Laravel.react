<?php

namespace App\Http\Requests\Finances;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class IncomeRequest extends FormRequest
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
            'amount' => ['required', 'numeric'],
            'currency' => ['required', 'exists:currencies,currency_id'],
            'income_sources' => ['required', 'exists:income_sources,source_id'],
            'accounts' => [
                'required',
                Rule::exists('accounts', 'account_id')->where(function ($query) {
                    $query->where('user_id', auth()->id());
                }),
            ],
            'description' => ['nullable', 'min:5', 'max:100'],
            'is_recurring' => ['nullable'],
            'income_date' => ['date'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'Сума обов’язкова для заповнення.',
            'income_sources.required' => 'Оберіть джерело доходу зі списку.',
            'income_date.required' => 'Дата приходу є обов\’язковою.',
            'income_date.date' => 'Введіть коректну дату.',
            'accounts.required' => 'Оберіть Рахунок',
            'description.min' => 'Опис має містити мінімум 5 символів.',
            'description.max' => 'Опис має містити максимум 100 символів.',
        ];
    }
}
