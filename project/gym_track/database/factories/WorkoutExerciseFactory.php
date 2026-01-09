<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkoutExercise>
 */
class WorkoutExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'workout_id' => \App\Models\Workout::factory(),
            'exercise_id' => \App\Models\Exercise::factory(),
            'order_index' => fake()->numberBetween(1, 10),
            'notes' => fake()->sentence(),
        ];
    }
}
