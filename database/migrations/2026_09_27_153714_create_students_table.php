<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('branch_id')
                ->constrained('branches')
                ->cascadeOnDelete();

            $table->foreignId('student_parent_id')
                ->nullable()
                ->constrained('student_parents')
                ->nullOnDelete();

            $table->string('student_code')->unique();

            $table->string('name');

            $table->string('father_name');

            $table->string('grandfather_name')
                ->nullable();

            $table->enum('gender', [
                'male',
                'female'
            ]);

            $table->date('date_of_birth')
                ->nullable();

            $table->string('phone')
                ->nullable();

            $table->text('address')
                ->nullable();

            $table->string('photo')
                ->nullable();

            $table->date('admission_date')
                ->nullable();

            $table->enum('status', [
                'active',
                'inactive',
                'graduated',
                'left'
            ])->default('active');

            $table->text('description')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};