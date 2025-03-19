<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use App\Models\DailySummaryDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeDashboardController extends Controller
{
    public function index() {
        
        $todays_ds = DailySummary::where('user_id', Auth::id())
            ->where('date', Carbon::today()->toDateString()) // Use today's date
            ->first();
        if($todays_ds){
            $todays_ds_to_do_work = DailySummaryDetail::where('daily_summary_id', $todays_ds->id)->where('task_status', 'to_do')->get();
            $todays_ds_in_progress_work = DailySummaryDetail::where('daily_summary_id', $todays_ds->id)->where('task_status', 'in_progress')->get();
            $todays_ds_complete_work = DailySummaryDetail::where('daily_summary_id', $todays_ds->id)->where('task_status', 'complete')->get();
        }else{
            $todays_ds_to_do_work = $todays_ds_in_progress_work = $todays_ds_complete_work = [];
        }
        // dd(count($todays_ds_to_do_work) == 0 && count($todays_ds_in_progress_work) == 0 && count($todays_ds_complete_work) == 0);
        return view('frontEnd.dashboard',compact('todays_ds','todays_ds_to_do_work','todays_ds_in_progress_work','todays_ds_complete_work'));
    }

    public function updateDsWorkStatus(Request $request){
        // dd($request->all());
        $request->validate([
            'task_id' => 'required|exists:daily_summary_details,id',
            'task_status' => 'required|in:to_do,in_progress,complete,not_done'
        ]);
    
        $task = DailySummaryDetail::findOrFail($request->task_id);
        $task->task_status = $request->task_status;
        $task->save();
    
        return redirect()->back()->with('success', 'Task status updated successfully.');
    }
}
