<?php

namespace Database\Seeders;

use App\Models\Finance\IncomeSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class IncomeSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Вимикаємо перевірку зовнішніх ключів
        Schema::disableForeignKeyConstraints();

        // Очищаємо таблицю
        \App\Models\Finance\IncomeSource::truncate();

        // Вмикаємо перевірку назад
        Schema::enableForeignKeyConstraints();

        IncomeSource::factory(7)->create();
    }
}
