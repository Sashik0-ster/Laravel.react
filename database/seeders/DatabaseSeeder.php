<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'sashik0mmm@gmail.com'],
            [
                'name' => 'Sashik0ster',
                'password' => bcrypt('111111111'),
            ]
        );
    }
}
