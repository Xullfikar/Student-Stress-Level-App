<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(
                table: 'users', indexName: 'users-student-id'
            );
            $table->string('class');
            $table->decimal('study_hours_per_day', total: 4, places: 2);
            $table->decimal('sleep_hours_per_day', total: 4, places: 2);
            $table->decimal('extracurricular_hours', total: 4, places: 2);
            $table->decimal('physical_activity_hours', total: 4, places: 2);
            $table->decimal('social_activity_hours', total: 4, places: 2);
            $table->decimal('gpa', 3, 2)->check('gpa <= 4.00');
            $table->string('stress_level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
