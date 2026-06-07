<?php

namespace App\Http\Requests\Finances;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
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
            'goal_name' => ['required','max:20','min:3'],
            'target_amount' => ['required','numeric','min:1'],
            'current_amount' => ['required','numeric','min:1'],
            'currency' => ['required', 'exists:currencies,currency_id'],
            'deadline' => ['required', 'date'],
            'priority' => ['required', 'in:low,medium,high'],
            'pic_url' => '',
        ];
    }
}
