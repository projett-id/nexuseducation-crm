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
        Schema::create('student_academic_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('country');
            $table->string('institution_name');
            $table->string('course_of_study');
            $table->string('level_of_study');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('shift', ['Full-time', 'Part-time']);
            $table->string('grading_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_academic_histories');
    }
};
