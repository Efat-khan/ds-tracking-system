<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Csv\Writer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use SplTempFileObject;

class ReportController extends Controller
{
    public function index()
    {
        $todays_ds = DailySummary::where('user_id', Auth::id())
            ->where('date', Carbon::today()->toDateString()) // Use today's date
            ->first();
        $reports = [];

        return view('frontEnd.report.index', compact('todays_ds', 'reports'));
    }
    public function search(Request $request)
    {
        // Use null coalescing operator to set defaults
        $current_date = $request->current_date ?? $request->previous_date ?? Carbon::today()->toDateString();
        $previous_date = $request->previous_date ?? $request->current_date ?? Carbon::today()->toDateString();

        // Fetch today's summary for the logged-in user
        $todays_ds = DailySummary::where('user_id', Auth::id())
            ->whereDate('date', Carbon::today()) // Ensures today's date
            ->first();

        // Fetch reports within the date range
        $reports = DailySummary::where('user_id', Auth::id())
            ->whereBetween('date', [$previous_date, $current_date])
            ->orderBy('date', 'desc')
            ->get();

        // Fetch previous days' reports in one query to avoid N+1 problem
        $previous_days_reports = DailySummary::where('user_id', Auth::id())
            ->whereDate('date', '<', $current_date)
            ->orderBy('date', 'desc')
            ->get()
            ->keyBy('date'); // Store reports in an associative array for quick lookup

        // Map previous day's report for each report
        $reports->map(function ($report) use ($previous_days_reports) {
            $report->previous_day_report = $previous_days_reports->where('date', '<', $report->date)->first();
            return $report;
        });

        return view('frontEnd.report.index', compact('todays_ds', 'previous_date', 'current_date', 'reports'));
    }

    public function exportCSV(Request $request)
    {
        // Get the data for the report
        $reports = DailySummary::where('user_id', Auth::id())
            ->whereBetween('date', [$request->previous_date, $request->current_date])
            ->get();

        // Create a CSV writer
        $csv = Writer::createFromFileObject(new SplTempFileObject(), 'w+');

        // Insert header row
        $csv->insertOne(['Employee Name', Auth::user()->name, 'Email', Auth::user()->email]);
        $csv->insertOne(['Task Name', 'Estimated Time (hrs)', 'Spent Time (hrs)', 'Learning Time (hrs)', 'Status']);

        // Loop through reports and add rows to CSV
        foreach ($reports as $report) {
            foreach ($report['details'] as $detail) {
                $csv->insertOne([
                    $detail->name ?? 'N/A',
                    $detail->estimated_time / 60 ?? 0 . 'h',
                    $detail->spent_time / 60 ?? 0 . 'h',
                    $detail->learning_time / 60 ?? 0 . 'h',
                    $this->getStatusText($detail->task_status),
                    Carbon::parse($report->date)->toDateString()
                ]);
            }

            // Add total row for each report (estimated and spent time totals)
            $csv->insertOne([
                'Total',
                $report->total_estimated_time / 60 ?? 0 . 'h',
                $report->total_spent_time / 60 ?? 0 . 'h',
                $report->total_learning_time / 60 ?? 0 . 'h',
                '',
            ]);
        }

        // Output the CSV file to browser for download
        return response((string) $csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="total_report.csv"');
    }
    // Generate the Excel file
    public function exportExcel(Request $request)
    {
        // Get the data for the report
        $reports = DailySummary::where('user_id', Auth::id())
            ->whereBetween('date', [$request->previous_date, $request->current_date])
            ->get();

        // Create a new spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header Row with Employee Info
        $sheet->setCellValue('A1', 'Employee Name: ' . Auth::user()->name)
            ->setCellValue('A2', 'Email: ' . Auth::user()->email)
            ->getStyle('A1:A2')->getFont()->setBold(true);

        // Add headers for task data
        $sheet->setCellValue('A4', 'Task Name')
            ->setCellValue('B4', 'Estimated Time (hrs)')
            ->setCellValue('C4', 'Spent Time (hrs)')
            ->setCellValue('D4', 'Learning Time (hrs)')
            ->setCellValue('E4', 'Status')
            ->setCellValue('F4', 'Date of Standup');

        // Apply header styling (background color, bold)
        $sheet->getStyle('A4:F4')->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
        $sheet->getStyle('A4:F4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('4CAF50');

        $row = 5;
        // Initialize grand total variables
        $grand_total_estimated_time = $grand_total_spent_time = $grand_total_learning_time = 0;
        // Loop through reports and fill data
        foreach ($reports as $report) {
            // Insert date of standup
            $sheet->setCellValue('F' . $row, $report->date);

            foreach ($report->details as $detail) {
                $sheet->setCellValue('A' . $row, $detail->name ?? 'N/A')
                    ->setCellValue('B' . $row, $detail->estimated_time / 60 ?? 0)
                    ->setCellValue('C' . $row, $detail->spent_time / 60 ?? 0)
                    ->setCellValue('D' . $row, $detail->learning_time / 60 ?? 0)
                    ->setCellValue('E' . $row, $this->getStatusText($detail->task_status));

                // Apply basic styling for total row
                $sheet->getStyle('A' . $row . ':F' . $row)->getFont()->setBold(true);

                $row++;
            }

            // Insert totals
            $sheet->setCellValue('A' . $row, 'Total')
                ->setCellValue('B' . $row, $report->total_estimated_time / 60 ?? 0)
                ->setCellValue('C' . $row, $report->total_spent_time / 60 ?? 0)
                ->setCellValue('D' . $row, $report->total_learning_time / 60 ?? 0);
            $grand_total_estimated_time += $report->total_estimated_time / 60;
            $grand_total_spent_time += $report->total_spent_time / 60;
            $grand_total_learning_time += $report->total_learning_time / 60;

            // Apply total row styling
            $sheet->getStyle('A' . $row . ':F' . $row)->getFont()->setBold(true);
            $sheet->getStyle('A' . $row . ':F' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFC107');

            $row++;
        }
        // Insert Grand totals
        $sheet->setCellValue('A' . $row, 'Total DS  Calculation')
            ->setCellValue('B' . $row, $grand_total_estimated_time ?? 0)
            ->setCellValue('C' . $row, $grand_total_spent_time ?? 0)
            ->setCellValue('D' . $row, $grand_total_learning_time ?? 0)->getStyle('A' . $row . ':F' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('4CAF50');

        // Create writer for Excel file
        $writer = new Xlsx($spreadsheet);

        // Output the Excel file to browser for download with the user's name as the filename
        $filename = Auth::user()->name . '_total_report_' . Carbon::now()->toDateString() . '.xlsx';
        return response()->stream(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment;filename="' . $filename . '"',
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
