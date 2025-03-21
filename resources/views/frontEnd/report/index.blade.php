@extends('frontEnd.layouts.master')
@section('content')
<style>
    .no-ds-message {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        /* Adjust height as needed */
        text-align: center;
        font-size: 24px;
        /* Make the text large */
        font-weight: bold;
        color: #333;
        /* Darker color for emphasis */
    }

    .status-dropdown {
        border: none;
        padding: 8px;
        font-size: 16px;
        cursor: pointer;
        outline: none;
        width: 100%;
    }

    .status-dropdown option {
        padding: 10px;
    }

    /* Background Colors for Each Option */
    .status-dropdown option[value="To do"] {
        background-color: #ffccd5;
        /* Pink */
    }

    .status-dropdown option[value="Doing"] {
        background-color: #cce5ff;
        /* Blue */
    }

    .status-dropdown option[value="Done"] {
        background-color: #d4edda;
        /* Green */
    }
</style>
<div class="content-container">
    @include('frontEnd.layouts.menue')

    <!-- tasks -->
    <div class="px-5 py-5">
        <form action="{{ route('employee.report.search') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-5">
                    <label for="current-date" class="form-label">Current Date:</label>
                    <input type="date" id="current-date" class="form-control" name="current_date" value="{{ $current_date ??\Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
                <div class="col-md-5">
                    <label for="previous-date" class="form-label">Previous Date:</label>
                    <input type="date" id="previous-date" class="form-control" name="previous_date"
                        value="{{ $previous_date ?? \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="button regular-button blue-background w-100"
                        style="padding-top:0px;text-decoration:none; color:black;">Search Standup</button>
                </div>
            </div>
        </form>

        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th colspan="5" class="text-center">{{ Auth::user()->name }} ({{ Auth::user()->email }}) Standup Report</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- Report Table -->
        <div class="row">
            <div class="col-md-6" style="padding-right: 0px;">
                <table class="table table-striped table-bordered">
                    @foreach ($reports as $report)
                    <thead class="table-light">
                        <tr>
                            <th colspan="5">Current Date of Standup: {{ $report->date ?? 'N/A' }}</th>
                        </tr>
                        <tr>
                            <th>Task Name</th>
                            <th>Estimated Time</th>
                            <th>Spent Time</th>
                            <th>Learning Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report->details as $key=>$detail)
                        <tr>
                            <td>{{ $detail->name ?? 'N/A' }}</td>
                            <td>{{ number_format($detail->estimated_time / 60, 2) }}h</td>
                            <td>{{ number_format($detail->spent_time / 60, 2) }}h</td>
                            <td>{{ number_format($detail->learning_time / 60, 2) }}h</td>
                            <td>
                                @if($detail->task_status == 'to_do')
                                <span class="badge bg-warning text-dark">Assigned</span>
                                @elseif($detail->task_status == 'in_progress')
                                <span class="badge bg-info text-dark">In Progress</span>
                                @elseif($detail->task_status == 'complete')
                                <span class="badge bg-success text-dark">Complete</span>
                                @endif
                            </td>
                        </tr>

                        @endforeach
                        @if ($key< 3)
                            <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            @endif
                    </tbody>
                    <thead class="table-light">
                        <tr>
                            <th>Total</th>
                            <th>{{ number_format($report->total_estimated_time / 60, 2) }}h</th>
                            <th>{{ number_format($report->total_spent_time / 60, 2) }}h</th>
                            <th>{{ number_format($report->total_learning_time / 60, 2) }}h</th>
                            <th></th>
                        </tr>
                    </thead>
                    @endforeach
                </table>
            </div>

            <!-- Previous Day's Reports -->
            <div class="col-md-6" style="padding-left: 0px;">
                <table class="table table-striped table-bordered">
                    @foreach ($reports as $report)
                    @if ($report->previous_day_report)
                    <thead class="table-light">
                        <tr>
                            <th colspan="5">Previous Date of Standup: {{ $report->previous_day_report->date ?? 'N/A' }}</th>
                        </tr>
                        <tr>
                            <th>Task Name</th>
                            <th>Estimated Time</th>
                            <th>Spent Time</th>
                            <th>Learning Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report->previous_day_report->details as $key=>$detail)
                        <tr>
                            <td>{{ $detail->name ?? 'N/A' }}</td>
                            <td>{{ number_format($detail->estimated_time / 60, 2) }}h</td>
                            <td>{{ number_format($detail->spent_time / 60, 2) }}h</td>
                            <td>{{ number_format($detail->learning_time / 60, 2) }}h</td>
                            <td>
                                @if($detail->task_status == 'to_do')
                                <span class="badge bg-warning text-dark">Assigned</span>
                                @elseif($detail->task_status == 'in_progress')
                                <span class="badge bg-info text-dark">In Progress</span>
                                @elseif($detail->task_status == 'complete')
                                <span class="badge bg-success text-dark">Complete</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @if ($key< 3)
                            <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            </tr><tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            </tr>
                            @endif
                    </tbody>
                    <thead class="table-light">
                        <tr>
                            <th>Total</th>
                            <th>{{ number_format($report->previous_day_report->total_estimated_time / 60, 2) }}h</th>
                            <th>{{ number_format($report->previous_day_report->total_spent_time / 60, 2) }}h</th>
                            <th>{{ number_format($report->previous_day_report->total_learning_time / 60, 2) }}h</th>
                            <th></th>
                        </tr>
                    </thead>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Export Buttons -->
        <div class="row g-3">
            <div class="col-md-6">
                <form action="{{ route('employee.report.export.csv') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_date" value="{{ $current_date ??\Carbon\Carbon::now()->format('Y-m-d')}}">
                    <input type="hidden" name="previous_date" value="{{ $previous_date ??\Carbon\Carbon::now()->format('Y-m-d')}}">
                    <button type="submit" class="button regular-button blue-background w-100"
                        style="padding-top:0px;text-decoration:none; color:black;">Export Total Report (CSV)</button>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <form action="{{ route('employee.report.export.excel') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_date" value="{{ $current_date ??\Carbon\Carbon::now()->format('Y-m-d')}}">
                    <input type="hidden" name="previous_date" value="{{ $previous_date ??\Carbon\Carbon::now()->format('Y-m-d')}}">
                    <button type="submit" class="button regular-button blue-background w-100"
                        style="padding-top:0px;text-decoration:none; color:black;">Export Total Report (Excel)</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
@section('customeJS')

@endsection