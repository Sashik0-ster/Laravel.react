<?php

namespace Database\Seeders;

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
            FinanceSeeder::class,
            IncomeSourceSeeder::class,
            CategorySeeder::class,
        ]);
        Saving::factory()->count(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
