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
        Schema::create('daily_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('date');
            $table->integer('total_estimated_time')->default(0)->comment('Time in minutes'); // Store duration in minutes
            $table->integer('total_spent_time')->default(0)->comment('Time in minutes'); // Store duration in minutes
            $table->boolean('is_physical_office')->default(false); // Use boolean instead of enum
            $table->time('office_start_time')->nullable();
            $table->time('office_end_time')->nullable();
            $table->integer('office_break_time')->nullable()->comment('Time in minutes');
            $table->text('description')->nullable();
            $table->string('git_url')->nullable(); 

            // Add unique constraint to prevent duplicate entries for the same user and date
            $table->unique(['user_id', 'date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_summaries');
    }
};
