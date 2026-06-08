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
//        dd($this->all());
        return
            [
                'goal_name' => ['required', 'max:20', 'min:3'],
                'target_amount' => ['required', 'numeric', 'min:1'],
                'current_amount' => ['required', 'numeric', 'min:0', 'lte:target_amount'],
                'currency' => ['required', 'exists:currencies,currency_id'],
                'deadline' => ['required', 'date', 'after_or_equal:today'],
                'priority' => ['required'],
                'pic_url' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ];
    }

    public function messages(): array
    {
        return [

            'goal_name.required' => 'Будь ласка, вкажіть назву фінансової цілі.',
            'goal_name.min' => 'Назва цілі має містити щонайменше :min символів.',
            'goal_name.max' => 'Назва цілі не повинна перевищувати :max символів.',

            'target_amount.required' => 'Вкажіть суму, яку ви плануєте зібрати.',
            'target_amount.min' => 'Цільова сума повинна бути більшою за :min.',

            'current_amount.required' => 'Вкажіть поточну зібрану суму (якщо немає, введіть 0).',
            'current_amount.min' => 'Зібрана сума не може бути меншою за :min.',
            'current_amount.lte' => 'Зібрана сума не може перевищувати цільову суму.',

            'currency.required' => 'Будь ласка, виберіть валюту для вашої цілі.',
            'currency.exists' => 'Обрана валюта не підтримується системою або є недійсною.',

            'deadline.required' => 'Вкажіть кінцеву дату (дедлайн) для досягнення цілі.',
            'deadline.date' => 'Введіть коректний формат дати.',
            'deadline.after_or_equal' => 'Дедлайн не може бути в минулому.',

            'priority.required' => 'Будь ласка, оберіть пріоритет для цієї цілі.',
        ];
    }
}
