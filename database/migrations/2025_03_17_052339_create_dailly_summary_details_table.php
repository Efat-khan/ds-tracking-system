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
        Schema::create('daily_summary_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_summary_id')->constrained('daily_summaries')->onDelete('cascade'); // Reference the correct table
            $table->string('name');
            $table->integer('estimated_time')->comment('Time in minutes');
            $table->integer('spent_time')->nullable()->comment('Time in minutes');
            $table->integer('learning_time')->nullable()->comment('Time in minutes');
            $table->enum('task_status', ['in_progress', 'to_do', 'complete', 'not_done'])->default('to_do'); // Updated default value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_summary_details');
    }
};
