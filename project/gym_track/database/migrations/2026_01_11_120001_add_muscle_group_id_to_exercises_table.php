<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->foreignId('muscle_group_id')->nullable()->constrained('muscle_groups')->onDelete('cascade')->after('name');
            $table->dropColumn('muscle_group'); // Remove the old string column
        });
    }

    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->string('muscle_group', 100)->after('name');
            $table->dropForeign(['muscle_group_id']);
            $table->dropColumn('muscle_group_id');
        });
    }
};
