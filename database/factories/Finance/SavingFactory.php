<?php

namespace Database\Factories\Finance;

use App\Models\Finance\Currency;
use App\Models\Finance\Saving;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Saving>
 */
class SavingFactory extends Factory
{

    protected $model = Saving::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $type = $this->faker->randomElement(['deposit', 'investment', 'cash', 'other']);

        $isFinancialProduct = in_array($type, ['deposit', 'investment']);

        return [
            'user_id' => User::factory(), // Створить нового користувача, якщо не передано існуючий
            'currency_id' => Currency::inRandomOrder()->first()?->currency_id ?? Currency::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 50000), // Сума від 10 до 50,000
            'saving_type' => $type,
            'saving_date' => $this->faker->date(),
            'description' => $this->faker->optional(0.7)->sentence(), // 70% шансу, що буде опис
            'interest_rate' => $isFinancialProduct ? $this->faker->randomFloat(2, 1, 15) : 0,
            'maturity_date' => $isFinancialProduct ? $this->faker->dateTimeBetween('+1 month', '+5 years')->format('Y-m-d') : null,
        ];
    }

    /**
     * Стан для Депозиту (Зручно використовувати у сідерах)
     */
    public function deposit(): static
    {
        return $this->state(fn (array $attributes) => [
            'saving_type' => 'deposit',
            'interest_rate' => $this->faker->randomFloat(2, 2, 18), // наприклад, від 2% до 18%
            'maturity_date' => $this->faker->dateTimeBetween('+3 months', '+2 years')->format('Y-m-d'),
        ]);
    }

    /**
     * Стан для Готівки
     */
    public function cash(): static
    {
        return $this->state(fn (array $attributes) => [
            'saving_type' => 'cash',
            'interest_rate' => 0,
            'maturity_date' => null,
        ]);
    }
}
