<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Finance\Expense;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::all();

        foreach ($users as $user) {
            Expense::factory()
                ->count(rand(3, 7))
                ->create([
                    'user_id' => $user->id,
                ]);
        }
    }
}
