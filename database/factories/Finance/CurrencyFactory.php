<?php

namespace Database\Factories\Finance;

use App\Models\Finance\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $currencies = [
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'],
            ['code' => 'UAH', 'name' => 'Ukrainian Hryvnia', 'symbol' => '₴'],
            ['code' => 'PLN', 'name' => 'Polish Zloty', 'symbol' => 'zł'],
        ];

        $currency = fake()->unique()->randomElement($currencies);

        return [
            'code' => $currency['code'],
            'currency_name' => $currency['name'],
            'symbol' => $currency['symbol'],
            'is_active' => fake()->boolean(80),
        ];
    }
}
