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
        Schema::create('visa_forms', function (Blueprint $table) {
            $table->id();

            // Personal Data
            $table->string('name');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email')->nullable();

            // Employment
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_province')->nullable();
            $table->string('company_postal_code')->nullable();
            $table->string('company_phone')->nullable();
            $table->date('employment_start')->nullable();
            $table->string('job_position')->nullable();

            // Emergency Contact (Coworker)
            $table->string('coworker_name')->nullable();
            $table->string('coworker_phone')->nullable();

            // Education
            $table->string('education_school')->nullable();
            $table->string('education_major')->nullable();

            // Family
            $table->string('spouse_name')->nullable();
            $table->date('spouse_birth_date')->nullable();
            $table->string('father_name')->nullable();
            $table->date('father_birth_date')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('mother_birth_date')->nullable();
            $table->string('child_name')->nullable();
            $table->date('child_birth_date')->nullable();

            // Relative Not Joining Tour
            $table->string('relative_name')->nullable();
            $table->string('relative_relationship')->nullable();
            $table->string('relative_phone')->nullable();
            $table->string('relative_email')->nullable();

            // Visa Info
            $table->text('active_visa')->nullable();
            $table->string('visa_rejected')->nullable();
            $table->text('visa_reject_reason')->nullable();
            $table->text('travel_history')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_forms');
    }
};
