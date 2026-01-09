<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model
{
    /** @use HasFactory<\Database\Factories\WorkoutExerciseFactory> */
    use HasFactory;

    protected $fillable = [
        'workout_id',
        'exercise_id',
        'order_index',
        'notes',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function sets()
    {
        return $this->hasMany(Set::class);
    }
}
