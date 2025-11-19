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
        Schema::create('student_application_history', function (Blueprint $table) {
            // Field ID
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('status', 255);
            $table->string('attachment')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('application_id')->references('id')->on('student_applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_application_history');
    }
};
