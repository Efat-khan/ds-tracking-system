<?php

namespace App\Http\Controllers\Admin\BackEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $daily_standups = DailySummary::where('date', Carbon::today()->format('Y-m-d'))->get();
        $previous_day_standups = DailySummary::where('date', '2025-03-22')->get();

        return view('admin.backend.dashboard.index',compact('daily_standups'));
    }
    public function filterIndex(Request $request)
    {
        $current_date = $request->current_date ?? Carbon::today()->toDateString();
        $userIds = is_array($request->user_ids) ? $request->user_ids : [$request->user_ids];
        $daily_standups = DailySummary::where('date', Carbon::parse($current_date)->format('Y-m-d'))->whereIn('user_id',$userIds)->get();
        // dd($daily_standups);
        return view('admin.backend.dashboard.index',compact('daily_standups','userIds','current_date'));
    }
}
