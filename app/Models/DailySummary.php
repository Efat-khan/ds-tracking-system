<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySummary extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',              // Foreign key to the users table
        'date',                 // Date of the summary
        'total_estimated_time', // Total estimated time in minutes
        'total_spent_time',     // Total spent time in minutes
        'is_physical_office',   // Whether the user was in the physical office
        'office_start_time',    // Office start time
        'office_end_time',     // Office end time
        'office_break_time',   // Office break time
        'git_url',             // Git repository URL
    ];
    public function details()
    {
        return $this->hasMany(DailySummaryDetail::class, 'daily_summary_id');
    }
}
