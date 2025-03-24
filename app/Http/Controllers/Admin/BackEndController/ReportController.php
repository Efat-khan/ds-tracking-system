<?php

namespace App\Http\Controllers\Admin\BackEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use App\Models\DailySummaryDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Csv\Writer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function dailyReportIndex()
    {
        $users = User::all();

        return view('admin.backEnd.report.daily_report', compact('users'));
    }

    public function dailyReportSearch(Request $request)
    {
        // Use null coalescing operator to set defaults
        $current_date = $request->current_date ?? $request->previous_date ?? Carbon::today()->toDateString();
        $previous_date = $request->previous_date ?? $request->current_date ?? Carbon::today()->toDateString();

        // Ensure user_ids exist and are an array
        $userIds = is_array($request->user_ids) ? $request->user_ids : [$request->user_ids];

        // Fetch reports for all selected users, grouped by user_id
        $current_day_reports = DailySummary::where('date', $current_date)
            ->whereIn('user_id', $userIds)
            ->orderBy('date', 'desc')
            ->get();
        // ->groupBy('user_id'); // Group by user ID
        $previous_day_reports = DailySummary::where('date', $previous_date)
            ->whereIn('user_id', $userIds)
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.backEnd.report.daily_report', compact('current_day_reports', 'previous_day_reports', 'current_date', 'previous_date','userIds'));
    }
    public function dateRangeReportIndex()
    {
        $users = User::all();

        return view('admin.backEnd.report.date_range_report', compact('users'));
    }
    public function dateRangeReportSearch(Request $request)
    {
        // Use null coalescing operator to set defaults
        $current_date = $request->current_date ?? $request->previous_date ?? Carbon::today()->toDateString();
        $previous_date = $request->previous_date ?? $request->current_date ?? Carbon::today()->toDateString();

        // Ensure user_ids exist and are an array
        $userIds = is_array($request->user_ids) ? $request->user_ids : [$request->user_ids];
        $reports = DailySummary::whereIn('user_id', $userIds)->whereBetween('date', [$previous_date, $current_date])->orderBy('date', 'desc')->get()->groupBy('user_id');
        // foreach ($reports as $user_reports) {
        //     foreach ($user_reports as $user_report) {
        //         foreach($user_report['details'] as $user_report_details){
        //             dd($user_report_details);
        //         }
        //     }
        // }
        // dd($userIds);


        return view('admin.backEnd.report.date_range_report', compact('reports', 'userIds', 'current_date', 'previous_date'));
    }
    // Generate the Excel file
    public function dateRangeReportExportExcel(Request $request)
    {
        $current_date = $request->current_date ?? $request->previous_date ?? Carbon::today()->toDateString();
        $previous_date = $request->previous_date ?? $request->current_date ?? Carbon::today()->toDateString();

        // Ensure user_ids exist and are always an array
        $userIds = is_array($request->user_ids) ? $request->user_ids : [$request->user_ids];

        // Fetch reports based on user IDs and date range
        $reports = DailySummary::whereIn('user_id', $userIds)
            ->whereBetween('date', [$previous_date, $current_date])
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('user_id');

        // Create a new spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Add report heading
        $sheet->mergeCells('A1:K2'); // Merge first two rows
        $sheet->setCellValue('A1', 'Employee Daily Standup Report');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Add report date range below heading
        $sheet->mergeCells('A3:K3'); // Merge row 3
        $sheet->setCellValue('A3', "Date Range: $previous_date to $current_date");
        $sheet->getStyle('A3')->getFont()->setItalic(true);
        $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Add report date range below heading
        // Retrieve user names from user IDs
        $userNames = User::whereIn('id', $userIds)->pluck('name')->toArray();
        // Convert array to a comma-separated string
        $userNamesString = implode(', ', $userNames);
        $sheet->mergeCells('A4:K4'); // Merge row 3
        $sheet->setCellValue('A4', "Employee(s): " . $userNamesString);
        $sheet->getStyle('A4')->getFont()->setItalic(true);
        $sheet->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Add headers
        $headers = [
            'A5' => 'Employee Name',
            'B5' => 'Task Name',
            'C5' => 'Estimated Time (hrs)',
            'D5' => 'Spent Time (hrs)',
            'E5' => 'Learning Time (hrs)',
            'F5' => 'Status',
            'G5' => 'Physical Office',
            'H5' => 'Office Start',
            'I5' => 'Office End',
            'J5' => 'Git URL',
            'K5' => 'DS Date'
        ];


        foreach ($headers as $cell => $value) {
            $sheet->setCellValue($cell, $value);
        }

        // Style the headers
        $headerRange = 'A5:K5';
        $sheet->getStyle($headerRange)->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
        $sheet->getStyle($headerRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('4CAF50');

        $row = 6; // Start from row 5

        // Initialize total counters
        $grand_total_estimated_time = 0;
        $grand_total_spent_time = 0;
        $grand_total_learning_time = 0;

        foreach ($reports as $user_id => $reportGroup) {
            $total_estimated_time = $total_spent_time = $total_learning_time = 0;
            foreach ($reportGroup as $report) {
        if ($report->total_estimated_time > 0){

                foreach ($report->details ?? [] as $detail) {
                    $sheet->setCellValue('A' . $row, $report['users']->name ?? 'N/A')
                        ->setCellValue('B' . $row, $detail->name ?? 'N/A')
                        ->setCellValue('C' . $row, round(($detail->estimated_time ?? 0) / 60, 2))
                        ->setCellValue('D' . $row, round(($detail->spent_time ?? 0) / 60, 2))
                        ->setCellValue('E' . $row, round(($detail->learning_time ?? 0) / 60, 2))
                        ->setCellValue('F' . $row, $this->getStatusText($detail->task_status))
                        ->setCellValue('G' . $row, $report->is_physical_office ? 'Yes' : 'No')
                        ->setCellValue('H' . $row, $report->office_start_time ? Carbon::parse($report->office_start_time)->format('h:i A') : 'N/A')
                        ->setCellValue('I' . $row, $report->office_end_time ? Carbon::parse($report->office_end_time)->format('h:i A') : 'N/A')
                        ->setCellValue('J' . $row, $report->git_url ?? 'N/A')
                        ->setCellValue('K' . $row, $report->date);

                    $row++;
                }

                // Add individual report totals
                $sheet->setCellValue('A' . $row, 'Total')
                    ->setCellValue('C' . $row, round($report->total_estimated_time / 60, 2))
                    ->setCellValue('D' . $row, round($report->total_spent_time / 60, 2))
                    ->setCellValue('E' . $row, round($report->total_learning_time / 60, 2));

                // Style total row
                $totalRange = 'A' . $row . ':K' . $row;
                $sheet->getStyle($totalRange)->getFont()->setBold(true);
                $sheet->getStyle($totalRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFC107');

                // Update grand totals
                $grand_total_estimated_time += $report->total_estimated_time;
                $grand_total_spent_time += $report->total_spent_time;
                $grand_total_learning_time += $report->total_learning_time;
                
        }else{
            // Add individual report totals
            $sheet->setCellValue('A' . $row, 'Total')
            ->setCellValue('C' . $row, round($report->total_estimated_time / 60, 2))
            ->setCellValue('D' . $row, round($report->total_spent_time / 60, 2))
            ->setCellValue('E' . $row, round($report->total_learning_time / 60, 2));

        // Style total row
        $totalRange = 'A' . $row . ':K' . $row;
        $sheet->getStyle($totalRange)->getFont()->setBold(true);
        $sheet->getStyle($totalRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFC107');
        }
                $row++;
            }
        }

        // Insert grand total row
        $sheet->setCellValue('A' . $row, 'Grand Total')
            ->setCellValue('C' . $row, round($grand_total_estimated_time / 60, 2))
            ->setCellValue('D' . $row, round($grand_total_spent_time / 60, 2))
            ->setCellValue('E' . $row, round($grand_total_learning_time / 60, 2));

        // Apply grand total styling
        $grandTotalRange = 'A' . $row . ':K' . $row;
        $sheet->getStyle($grandTotalRange)->getFont()->setBold(true);
        $sheet->getStyle($grandTotalRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('4CAF50');

        // Generate a filename based on user name
        $filename = Str::slug(Auth::user()->name) . '_total_report_' . Carbon::now()->toDateString() . '.xlsx';

        // Output the Excel file for download
        $writer = new Xlsx($spreadsheet);
        return response()->stream(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    // Helper function to get the status text
    private function getStatusText($status)
    {
        switch ($status) {
            case 'to_do':
                return 'Assigned';
            case 'in_progress':
                return 'In Progress';
            case 'complete':
                return 'Complete';
            default:
                return 'N/A';
        }
    }
}
