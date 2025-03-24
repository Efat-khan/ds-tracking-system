<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DailySummaryController extends Controller
{
    public function index()
    {
        $todays_ds = DailySummary::where('date',Carbon::now()->format('Y-m-d'))->where('user_id',Auth::user()->id)->first();
        if($todays_ds){
            $data = $todays_ds;
        }else{
        $yesterday_ds = DailySummary::where('date','<',Carbon::now()->format('Y-m-d'))->where('user_id',Auth::user()->id)->orderBy('date','desc')->first();
        $data = $yesterday_ds;
        }
        // dd($yesterday_ds->git_url);
        return view('frontEnd.dailySummary.index',compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'is_physical_office' => 'required|boolean',
            'office_start_time' => 'required',
            'office_end_time' => 'required|after:office_start_time',
            'git_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Send errors to the session
                ->withInput(); // Keep old input data
        } else {
            // Check if the record already exists for the given user_id and date
            $existingSummary = DailySummary::where('user_id', Auth::id())
                ->where('date', $request->date)
                ->first();

            if ($existingSummary) {
                // Optionally, you could update the existing record instead of inserting a new one
                $existingSummary->is_physical_office = $request->is_physical_office;
                $existingSummary->office_start_time = $request->office_start_time;
                $existingSummary->office_end_time = $request->office_end_time;
                $existingSummary->git_url = $request->git_url;
                $existingSummary->save();

                return redirect()->route('dashboard')->with('success', 'Daily status updated successfully!');
            } else {
                // Create a new record if no existing one is found
                $dailySummary = new DailySummary();
                $dailySummary->user_id = Auth::id();
                $dailySummary->date = $request->date;
                $dailySummary->is_physical_office = $request->is_physical_office;
                $dailySummary->office_start_time = $request->office_start_time;
                $dailySummary->office_end_time = $request->office_end_time;
                $dailySummary->git_url = $request->git_url;
                $dailySummary->save();
                session()->flash('success', [
                    'icon' => 'success',
                    'title' => 'Daily status submitted successfully!'
                ]);
                return redirect()->route('dashboard')->with('success', 'Daily status submitted successfully!');
            }
        }
    }
}
