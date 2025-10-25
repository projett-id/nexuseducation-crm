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
        Schema::create('master_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_name');
            $table->enum('document_type', ['Mandatory', 'Additional']);
            $table->text('description')->nullable();
            $table->string('allowed_file_type');
            $table->integer('max_file_size');
            $table->integer('max_number_of_documents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_documents');
    }
};
