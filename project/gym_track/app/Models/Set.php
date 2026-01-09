<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    /** @use HasFactory<\Database\Factories\SetFactory> */
    use HasFactory;

    protected $fillable = [
        'workout_exercise_id',
        'set_number',
        'type',
        'reps',
        'weight_value',
        'weight_unit',
        'weight_kg_normalized',
        'rpe',
    ];

    public function workoutExercise()
    {
        return $this->belongsTo(WorkoutExercise::class);
    }
}
