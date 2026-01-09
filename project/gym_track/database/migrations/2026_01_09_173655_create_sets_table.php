<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_exercise_id')->constrained()->onDelete('cascade');
            $table->integer('set_number');
            $table->enum('type', ['normal', 'warmup', 'drop_set', 'failure']);
            $table->integer('reps');
            $table->decimal('weight_value', 8, 2);
            $table->enum('weight_unit', ['kg', 'lbs']);
            $table->decimal('weight_kg_normalized', 8, 2);
            $table->tinyInteger('rpe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
