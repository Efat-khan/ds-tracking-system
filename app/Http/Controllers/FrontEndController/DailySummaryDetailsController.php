<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use App\Models\DailySummaryDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DailySummaryDetailsController extends Controller
{
    public function index()
    {
        $todays_ds = DailySummary::where('user_id', Auth::id())
            ->where('date', Carbon::today()->toDateString()) // Use today's date
            ->first();
        $previous_ds = DailySummary::where('user_id', Auth::id())
        ->whereDate('created_at', '<', Carbon::today()->toDateString()) // Filter for dates before today
        ->orderBy('created_at', 'desc') // Sort to get the most recent previous day's DS
        ->first();
        // dd($previous_ds);
        if ($previous_ds) {
            $previous_ds_to_do_work = DailySummaryDetail::where('daily_summary_id', $previous_ds->id)->where('task_status', 'to_do')->get();
            $previous_ds_in_progress_work = DailySummaryDetail::where('daily_summary_id', $previous_ds->id)->where('task_status', 'in_progress')->get();
            $previous_ds_complete_work = DailySummaryDetail::where('daily_summary_id', $previous_ds->id)->where('task_status', 'complete')->get();
        }else{
            $previous_ds_to_do_work = $previous_ds_in_progress_work =$previous_ds_complete_work = [];
        }
        return view('frontEnd.dailySummaryDetail.index', compact('todays_ds','previous_ds','previous_ds_to_do_work','previous_ds_in_progress_work','previous_ds_complete_work'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'daily_summary_id' => 'required|exists:daily_summaries,id',
            'name' => 'required|string',
            'estimated_time' => 'required|numeric|min:1',
            'spent_time' => 'nullable|numeric|min:0',
            'learning_time' => 'nullable|numeric|min:0',
            'task_status' => 'required|in:in_progress,to_do,complete,not_done',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new Work entry
        $work = new DailySummaryDetail();
        $work->daily_summary_id = $request->daily_summary_id;
        $work->name = $request->name;
        $work->estimated_time = $request->estimated_time;
        $work->spent_time = $request->spent_time ?? 0;
        $work->learning_time = $request->learning_time ?? 0;
        $work->task_status = $request->task_status;
        $work->save();

        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Work added successfully!');
    }
    public function edit($id)
    {
        $daily_summary_detail = DailySummaryDetail::find($id);
        $daily_summary = DailySummary::find($daily_summary_detail->daily_summary_id);
        // $todays_daily_summary_detail = DailySummaryDetail::where('daily_summary_id',$daily_summary->id)->get();
        if($daily_summary) {
            $today_ds_to_do_work = DailySummaryDetail::where('daily_summary_id', $daily_summary->id)->where('task_status', 'to_do')->get();
            $today_ds_in_progress_work = DailySummaryDetail::where('daily_summary_id', $daily_summary->id)->where('task_status', 'in_progress')->get();
            $today_ds_complete_work = DailySummaryDetail::where('daily_summary_id', $daily_summary->id)->where('task_status', 'complete')->get();
        }
        return view('frontEnd.dailySummaryDetail.edit', compact('daily_summary_detail','daily_summary','today_ds_to_do_work','today_ds_in_progress_work','today_ds_complete_work'));
    }
    public function update(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|string',
            'estimated_time' => 'required|numeric|min:1',
            'spent_time' => 'nullable|numeric|min:0',
            'learning_time' => 'nullable|numeric|min:0',
            'task_status' => 'required|in:in_progress,to_do,complete,not_done',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $daily_summary_detail = DailySummaryDetail::findOrFail($request->id);
        $daily_summary_detail->name = $request->name;
        $daily_summary_detail->estimated_time = $request->estimated_time;
        $daily_summary_detail->spent_time = $request->spent_time ?? 0;
        $daily_summary_detail->learning_time = $request->learning_time ?? 0;
        $daily_summary_detail->task_status = $request->task_status;
        $daily_summary_detail->save();
        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }


}
