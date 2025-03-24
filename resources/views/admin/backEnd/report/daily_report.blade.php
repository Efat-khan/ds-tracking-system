@extends('admin.backEnd.layouts.master')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Daily Report</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Employees daily report</li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <a href="" class="btn btn-primary">Search standup</a>
        </div>
      </div>
    </div>
  </div>
  <div class="card mx-4">
    <div class="card-body">
      <form action="{{route('admin.dailyReport.search')}}" method="POST">
        @csrf
        <div class="row">

          <div class="col-md-5 mb-3">
            <label class="form-label">Current Date:</label>
            <input type="date" name="current_date" class="form-control" value="{{ $current_date ?? \Carbon\Carbon::now()->format('Y-m-d') }}">
          </div>
          <div class="col-md-5 mb-3">
            <label class="form-label">Previous Date:</label>
            <input type="date" name="previous_date" class="form-control" value="{{ $previous_date ?? \Carbon\Carbon::yesterday()->format('Y-m-d') }}">
          </div>
          <div class="col-md-2" style="padding-top: 29px;">
            <button type="submit" class="btn btn-primary  w-100">Search standup</button>
          </div>
          <div class="col-md-12">
            <select name="user_ids[]" id="user_ids" class="form-control select2" multiple>
              <option value="">Select Employee</option>
              @foreach (App\Models\User::all() as $user)
              <option value="{{$user->id}}" {{ in_array($user->id, $userIds ?? []) ? 'selected' : '' }}>
                {{$user->name}}
              </option>
              @endforeach
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card m-4">
    <div class="row">
      <div class="col-md-6" style="padding-right: 0px;">
        <table class="table table-striped table-bordered">
          @if (!empty($current_day_reports))
            @foreach ($current_day_reports as $current_day_report)
            <thead class="table-light">
              <tr>
                <th colspan="6">Current Date of Standup:{{ $current_day_report->date }} </th>
              </tr>
              <tr>
                <th>Employee Name</th>
                <th>Task Name</th>
                <th>Estimated Time</th>
                <th>Spent Time</th>
                <th>Learning Time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($current_day_report['details'] as $key=>$detail)
              <tr>
                <td>{{$current_day_report['users']->name}}</td>
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
            </tbody>
            <thead class="table-light">
              <tr>
                <th></th>
                <th>Total</th>
                <th>{{ number_format($current_day_report->total_estimated_time / 60, 2) }}h</th>
                <th>{{ number_format($current_day_report->total_spent_time / 60, 2) }}h</th>
                <th>{{ number_format($current_day_report->total_learning_time / 60, 2) }}h</th>
                <th></th>
              </tr>
            </thead>
            @endforeach
          @endif
        </table>
      </div>
      <!-- Previous Day's Reports -->
      <div class="col-md-6" style="padding-left: 0px;">
        <table class="table table-striped table-bordered">
          @if (!empty($previous_day_reports))
            @foreach ($previous_day_reports as $previous_day_report)
            <thead class="table-light">
              <tr>
                <th colspan="6">Previous Date of Standup:{{ $previous_day_report->date }} </th>
              </tr>
              <tr>
                <th>Employee Name</th>
                <th>Task Name</th>
                <th>Estimated Time</th>
                <th>Spent Time</th>
                <th>Learning Time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($previous_day_report['details'] as $key=>$detail)
              <tr>
                <td>{{$previous_day_report['users']->name}}</td>
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
            </tbody>
            <thead class="table-light">
              <tr>
                <th></th>
                <th>Total</th>
                <th>{{ number_format($previous_day_report->total_estimated_time / 60, 2) }}h</th>
                <th>{{ number_format($previous_day_report->total_spent_time / 60, 2) }}h</th>
                <th>{{ number_format($previous_day_report->total_learning_time / 60, 2) }}h</th>
                <th></th>
              </tr>
            </thead>
            @endforeach
          @endif
        </table>
      </div>
    </div>
  </div>
</div>
</div>






@endsection

@section('custom-js-section')
<script>
  $(document).ready(function() {
    $('#user_ids').select2({
      placeholder: "Select Employees",
      allowClear: true
    });
  });
</script>
@endsection