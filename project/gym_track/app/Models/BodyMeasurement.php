<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyMeasurement extends Model
{
    /** @use HasFactory<\Database\Factories\BodyMeasurementFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'weight_value',
        'unit',
        'height_cm',
        'measured_at',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
