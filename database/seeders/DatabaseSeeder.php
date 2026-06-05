<?php

namespace Database\Seeders;

use App\Models\Finance\Goal;
use App\Models\Finance\Saving;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'sashik0mmm@gmail.com'],
            [
                'name' => 'Sashik0ster',
                'password' => bcrypt('111111111'),
            ]
        );

        $this->call([
            CurrencySeeder::class,
            IncomeSourceSeeder::class,
            CategorySeeder::class,
        ]);
        Goal::factory()->count(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
