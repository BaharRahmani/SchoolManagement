<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();

            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnDelete();

            $table->foreignId('branch_id')
                ->constrained('branches')
                ->cascadeOnDelete();

            $table->foreignId('class_id')
                ->constrained('school_classes')
                ->cascadeOnDelete();

            $table->string('name');

            $table->enum('exam_type', [
                'monthly',
                'midterm',
                'final',
                'quiz',
                'other'
            ])->default('monthly');

            $table->date('start_date');

            $table->date('end_date')->nullable();

            $table->text('description')->nullable();

            $table->enum('status', [
                'planned',
                'active',
                'completed',
                'cancelled'
            ])->default('planned');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};