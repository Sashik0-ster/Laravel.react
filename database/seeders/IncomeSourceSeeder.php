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
    if (IncomeSource::count() === 0) {
        IncomeSource::factory(7)->create();
    }
}
}
