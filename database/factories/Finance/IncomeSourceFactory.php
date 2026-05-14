<?php

namespace Database\Factories\Finance;

use App\Models\Finance\IncomeSource;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeSourceFactory extends Factory
{
    public function definition(): array
    {
        return
            [
                'name' => fake()->unique()->randomElement([
                    'Зарплата',
                    'Фріланс',
                    'Продаж товарів',
                    'Дивіденди',
                    'Подарунок',
                    'Кешбек',
                    'Інше',
                ]),
            ];
    }
}
