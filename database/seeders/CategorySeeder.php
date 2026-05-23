<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Finance\Category;
use Database\Factories\Finance\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1. Тимчасово вимикаємо перевірку зовнішніх ключів (щоб база дозволила очищення)
        Schema::disableForeignKeyConstraints();

        // 2. Очищаємо таблицю та скидаємо автоінкремент
        Category::truncate();

        // 3. Вмикаємо перевірку назад
        Schema::enableForeignKeyConstraints();


        $users = User::all();

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


        foreach ($users as $user) {
            Category::factory()
                ->count(count($expenseNames))
                ->sequence(fn($sequence) => ['name_category' => $expenseNames[$sequence->index]])
                ->create([
                    'user_id' => $user->id,
                ]);
        }
    }
}
