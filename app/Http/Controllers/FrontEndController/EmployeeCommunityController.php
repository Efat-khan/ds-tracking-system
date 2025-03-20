<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeCommunityController extends Controller
{
    public function index(){
        $todays_ds = DailySummary::where('user_id', Auth::id())
            ->where('date', Carbon::today()->toDateString()) // Use today's date
            ->first();
        $all_users_todays_details = DailySummary::where('date',Carbon::today()->toDateString())->where('user_id','!=',Auth::user()->id)->get();
        // dd($all_users_todays_details);
        return view('frontEnd.community',compact('all_users_todays_details','todays_ds'));
    }
}
