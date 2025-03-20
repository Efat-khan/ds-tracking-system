<?php

namespace App\Http\Controllers\FrontEndController;

use App\Http\Controllers\Controller;
use App\Models\DailySummary;
// use App\Helpers\SimpleXLSX;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shuchkin\SimpleXLSX;

class FileImportController extends Controller
{
    public function import(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'daily_summary_id' => 'required',
            'file' => 'required|mimes:csv,txt,xlsx|max:2048'
        ]);

        $file = $request->file('file');

        // Check file extension
        if ($file->getClientOriginalExtension() == 'csv') {
            return $this->importCSV($file, $request->daily_summary_id);
        } elseif ($file->getClientOriginalExtension() == 'xlsx') {
            return $this->importExcel($file, $request->daily_summary_id);
        }

        return back()->with('error', 'Unsupported file format.');
    }

    private function importCSV($file, $daily_summary_id)
    {
        $handle = fopen($file->getPathname(), 'r');
        $header = fgetcsv($handle); // Read and ignore the first row (header)

        $data = [];
        $daily_summary = DailySummary::find($daily_summary_id);
        while ($row = fgetcsv($handle)) {
            if (!empty($row[4])) { // Skip rows where task_status is empty
                $data[] = [
                    'daily_summary_id' => $daily_summary_id,
                    'name'             => isset($row[0]) ? $row[0] : 'Not Set',
                    'estimated_time'   => isset($row[1]) ? (float) $row[1]*60 : 0,
                    'spent_time'       => isset($row[2]) ? (float) $row[2]*60 : 0,
                    'learning_time'    => isset($row[3]) ? (float) $row[3]*60 : 0,
                    'task_status'      => ($row[4] == 'To Do') ? 'to_do' : ($row[4] == 'In Progress' ? 'in_progress' : 'complete')
                ];
                // upadte daily_summaries table 
                $daily_summary->total_estimated_time += isset($row[1]) ? (float) $row[1] * 60 : 0;
                $daily_summary->total_spent_time += isset($row[2]) ? (float) $row[2] * 60 : 0;
                $daily_summary->total_learning_time += isset($row[3]) ? (float) $row[3] * 60 : 0;
            }
        }
        $daily_summary->save();
        fclose($handle);
        if (!empty($data)) {
            DB::table('daily_summary_details')->insert($data);
        }

        return back()->with('success', 'CSV file imported successfully.');
    }

    private function importExcel($file, $daily_summary_id)
    {
        require_once app_path('Helpers/SimpleXLSX.php');

        $xlsx = SimpleXLSX::parse($file->getPathname());

        if (!$xlsx) {
            return back()->with('error', 'Failed to read Excel file.');
        }

        $rows = $xlsx->rows();
        array_shift($rows); // Remove the header row

        $data = [];
        $daily_summary = DailySummary::find($daily_summary_id);
        foreach ($rows as $row) {
            if (!empty($row[4])) { // Skip rows where task_status is empty
                $data[] = [
                    'daily_summary_id' => $daily_summary_id,
                    'name'             => isset($row[0]) ? $row[0] : 'Not Set',
                    'estimated_time'   => isset($row[1]) ? (float) $row[1]*60 : 0,
                    'spent_time'       => isset($row[2]) ? (float) $row[2]*60 : 0,
                    'learning_time'    => isset($row[3]) ? (float) $row[3]*60 : 0,
                    'task_status'      => ($row[4] == 'To Do') ? 'to_do' : ($row[4] == 'In Progress' ? 'in_progress' : 'complete')
                ];
                // upadte daily_summaries table 
                $daily_summary->total_estimated_time += isset($row[1]) ? (float) $row[1] * 60 : 0;
                $daily_summary->total_spent_time += isset($row[2]) ? (float) $row[2] * 60 : 0;
                $daily_summary->total_learning_time += isset($row[3]) ? (float) $row[3] * 60 : 0;
            }
        }
        $daily_summary->save();

        if (!empty($data)) {
            DB::table('daily_summary_details')->insert($data);
        }

        return back()->with('success', 'Excel file imported successfully.');
    }
}
