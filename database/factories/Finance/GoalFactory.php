<?php

namespace Database\Factories\Finance;

use App\Models\Finance\Currency;
use App\Models\Finance\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Goal>
 */
class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'goal_name' => $this->faker->words('5', true),
            'target_amount' => $this->faker->randomFloat(2, 10, 100),
            'current_amount' => $this->faker->randomFloat(2, 10, 100),
            'currency_id' => Currency::inRandomOrder()->first()?->currency_id ?? Currency::factory(),
            'deadline' => $this->faker->date(),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'status' => $this->faker->randomElement(['active', 'completed', 'archived']),
            'pic_url' => $this->faker->imageUrl(),

        ];
    }
}
