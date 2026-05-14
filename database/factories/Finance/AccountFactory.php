<?php

namespace Database\Factories\Finance;

use App\Models\Finance\Account;
use App\Models\Finance\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->randomElement(['Основна картка', 'Готівка', 'Монобанк', 'Заощадження', 'Гаманець USD']),
            'balance' => $this->faker->randomFloat(2, 0, 10000),
            'currency_id' => Currency::query()->inRandomOrder()->first()?->id ?? Currency::factory(),
            'type' => fake()->randomElement(['card', 'cash', 'savings', 'crypto']),
        ];
    }
}
