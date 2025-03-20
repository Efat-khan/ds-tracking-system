<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySummaryDetail extends Model
{
    use HasFactory;
    protected $table='daily_summary_details';
    protected $fillable = [
        'ds_id',          // Foreign key to the daily_summaries table
        'name',           // Name of the task
        'estimated_time', // Estimated time in minutes
        'spent_time',     // Spent time in minutes
        'learning_time',  // Learning time in minutes
        'task_status',    // Status of the task
    ];
    public function dailySummary()
    {
        return $this->belongsTo(DailySummary::class, 'ds_id');
    }
}
