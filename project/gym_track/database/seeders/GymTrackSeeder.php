<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\BodyMeasurement;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\WorkoutExercise;
use App\Models\Set;

class GymTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Global Exercises (System default)
        $globalExercises = Exercise::factory(10)->create(['user_id' => null]);

        // Create Users
        $users = User::factory(5)->create();

        $users->each(function ($user) use ($globalExercises) {
            // Profile
            UserProfile::factory()->create(['user_id' => $user->id]);

            // Body Measurements
            BodyMeasurement::factory(3)->create(['user_id' => $user->id]);

            // User specific exercises
            $userExercises = Exercise::factory(3)->create(['user_id' => $user->id]);
            $allExercises = $globalExercises->merge($userExercises);

            // Workouts
            Workout::factory(3)->create(['user_id' => $user->id])->each(function ($workout) use ($allExercises) {
                // Workout Exercises
                // We create 3 exercises per workout
                $exercisesForWorkout = $allExercises->random(3);

                $orderIndex = 1;
                foreach ($exercisesForWorkout as $exercise) {
                    $workoutExercise = WorkoutExercise::factory()->create([
                        'workout_id' => $workout->id,
                        'exercise_id' => $exercise->id,
                        'order_index' => $orderIndex++,
                    ]);

                    // Sets
                    Set::factory(3)->create([
                        'workout_exercise_id' => $workoutExercise->id
                    ]);
                }
            });
        });
    }
}
