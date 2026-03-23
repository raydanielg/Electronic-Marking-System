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
            $table->string('prem_number')->unique()->nullable();
            $table->string('cert_entry_number')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('full_name'); // Computed or stored for easy searching
            $table->enum('sex', ['Male', 'Female']);
            $table->date('date_of_birth')->nullable();
            
            // Admission Info
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('admission_number')->nullable();
            $table->date('admission_date')->nullable();
            $table->integer('current_level')->nullable(); // e.g., Form 1, Standard 1
            $table->string('current_class')->nullable(); // e.g., A, B, Stream 1
            
            // Status: Not Admitted, Admitted, Graduated, Transferred, Dropped
            $table->string('status')->default('Not Admitted');
            
            // Parent/Guardian Info
            $table->string('parent_name')->nullable();
            $table->string('parent_phone')->nullable();
            
            $table->boolean('is_active')->default(true);
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
