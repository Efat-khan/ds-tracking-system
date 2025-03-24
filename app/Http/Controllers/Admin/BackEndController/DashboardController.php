<?php

namespace App\Http\Controllers\Admin\BackEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $daily_standups = DailySummary::where('date',now())->get();
        return view('admin.backend.dashboard.index',compact('daily_standups'));
    }
}
