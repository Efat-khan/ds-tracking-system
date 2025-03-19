<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeCommunityController extends Controller
{
    public function index(){
        $all_users_todays_details = DailySummary::where('date',Carbon::today()->toDateString())->get();
        // dd($all_users_todays_details);
        return view('frontEnd.community',compact('all_users_todays_details'));
    }
}
