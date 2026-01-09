<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Set>
 */
class SetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'workout_exercise_id' => \App\Models\WorkoutExercise::factory(),
            'set_number' => fake()->numberBetween(1, 5),
            'type' => fake()->randomElement(['normal', 'warmup', 'drop_set', 'failure']),
            'reps' => fake()->numberBetween(1, 15),
            'weight_value' => fake()->randomFloat(2, 10, 100),
            'weight_unit' => 'kg',
            'weight_kg_normalized' => fake()->randomFloat(2, 10, 100),
            'rpe' => fake()->numberBetween(1, 10),
        ];
    }
}
