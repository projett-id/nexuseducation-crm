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
       Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('family_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('country_of_birth');
            $table->string('native_language')->nullable();
            $table->string('passport_name')->nullable();
            $table->string('passport_issue_location')->nullable();
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
