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
        Schema::table('academic_levels', function (Blueprint $table) {
            $table->string('education_type')->after('name')->default('Primary');
            $table->dropUnique(['name']);
            $table->unique(['name', 'education_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_levels', function (Blueprint $table) {
            $table->dropUnique(['name', 'education_type']);
            $table->dropColumn('education_type');
            $table->unique('name');
        });
    }
};
