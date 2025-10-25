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
        Schema::create('student_referees', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('position');
            $table->string('title')->nullable();
            $table->string('work_email');
            $table->string('duration')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('relationship');
            $table->string('institution_name');
            $table->string('institution_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_referees');
    }
};
