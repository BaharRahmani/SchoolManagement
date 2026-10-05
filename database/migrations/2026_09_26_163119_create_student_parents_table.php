<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone');
            $table->string('second_phone')->nullable();
            $table->string('relationship')->nullable();
            $table->string('occupation')->nullable();
            $table->text('address')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};