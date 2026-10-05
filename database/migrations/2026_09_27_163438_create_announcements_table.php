<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('branch_id')
                ->nullable()
                ->constrained('branches')
                ->nullOnDelete();

            $table->string('title');

            $table->text('content');

            $table->date('publish_date');

            $table->date('expire_date')->nullable();

            $table->enum('target', [
                'all',
                'teachers',
                'students',
                'parents',
                'staff'
            ])->default('all');

            $table->enum('status', [
                'draft',
                'published',
                'expired'
            ])->default('draft');

            $table->string('created_by')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};