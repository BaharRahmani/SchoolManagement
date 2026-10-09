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
        Schema::create('student_promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();
            $table->foreignId('section_id')
                ->constrained('sections')
                ->restrictOnDelete();
            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->restrictOnDelete();
            $table->unsignedInteger('roll_no');
            $table->enum('status', [
                'active',
                'graduated',
                'dropped',
                'transferred',
            ])->default('active');
            $table->timestamps();

            $table->unique(
                ['student_id', 'academic_year_id'],
                'promotion_student_year_unique'
            );
            $table->unique(
                ['section_id', 'academic_year_id', 'roll_no'],
                'promotion_section_year_roll_unique'
            );
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_promotions');
    }
};
