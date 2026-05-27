<?php

namespace Database\Factories\Finance;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory


        public function definition(): array
{
    return [
        'user_id' => User::factory(),
        'name_category' => $this->faker->randomElement([
            'Оренда офісу',
            'Комунальні послуги',
            'Інтернет та звʼязок',
            'Закупівля товарів',
            'Маркетинг та реклама',
            'Транспортні витрати',
            'Канцелярія',
            'Податки',
        ]),
        'type' => $this->faker->randomElement(['regular', 'no_regular']),
    ];

    }
}
