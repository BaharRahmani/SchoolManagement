<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('branch_id')
                ->constrained('branches')
                ->cascadeOnDelete();

            $table->string('teacher_code')->unique();
            $table->string('name');
            $table->string('father_name')->nullable();

            $table->enum('gender', ['male', 'female'])
                ->nullable();

            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('address')->nullable();

            $table->string('qualification')->nullable();
            $table->string('specialization')->nullable();

            $table->date('hire_date')->nullable();

            $table->decimal('salary', 12, 2)->nullable();

            $table->string('photo')->nullable();

            $table->enum('status', ['active', 'inactive'])
                ->default('active');

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};