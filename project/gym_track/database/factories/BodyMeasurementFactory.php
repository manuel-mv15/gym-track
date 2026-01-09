<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BodyMeasurement>
 */
class BodyMeasurementFactory extends Factory
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
            'weight_value' => fake()->randomFloat(2, 50, 100),
            'unit' => fake()->randomElement(['kg', 'lbs']),
            'height_cm' => fake()->numberBetween(150, 200),
            'measured_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'notes' => fake()->sentence(),
        ];
    }
}
