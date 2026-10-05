<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('fee_id')
                ->constrained('fees')
                ->cascadeOnDelete();

            $table->decimal('amount', 12, 2);

            $table->date('payment_date');

            $table->enum('payment_method', [
                'cash',
                'bank',
                'online'
            ])->default('cash');

            $table->string('receipt_number')->unique();

            $table->string('received_by')->nullable();

            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};