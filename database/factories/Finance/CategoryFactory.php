<?php

namespace Database\Factories\Finance;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $types = [
            'regular' => 'Регулярний',
            'no_regular' => 'Не регулярний',
        ];

        $expenseNames = [
            'Оренда офісу',
            'Комунальні послуги',
            'Інтернет та звʼязок',
            'Закупівля товарів',
            'Маркетинг та реклама',
            'Транспортні витрати',
            'Канцелярія',
            'Податки',
        ];

        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'name_category'    => $this->faker->randomElement($expenseNames),
            'type' => $this->faker->randomElement(array_keys($types)),
        ];
    }
}
