<?php
namespace Database\Seeders;

use App\Models\Finance\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $currencies = [
            ['code' => 'USD', 'currency_name' => 'US Dollar', 'symbol' => '$', 'is_active' => true],
            ['code' => 'EUR', 'currency_name' => 'Euro', 'symbol' => '€', 'is_active' => true],
            ['code' => 'UAH', 'currency_name' => 'Ukrainian Hryvnia', 'symbol' => '₴', 'is_active' => true],
            ['code' => 'PLN', 'currency_name' => 'Polish Zloty', 'symbol' => 'zł', 'is_active' => true],
        ];

        $currency = fake()->unique()->randomElement($currencies);

        foreach ($currencies as $currency) {
            Currency::firstOrCreate(
                ['code' => $currency['code']],
                $currency
            );
        }
    }
}
