<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => fake()->sentence(3),
            'started_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'ended_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'status' => fake()->randomElement(['in_progress', 'completed', 'discarded']),
        ];
    }
}
