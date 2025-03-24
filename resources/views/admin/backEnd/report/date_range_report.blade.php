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
          <a href="{{route('admin.dateRangeReport')}}" class="btn btn-primary">Reload</a>
        </div>
      </div>
    </div>
  </div>
  <div class="card mx-4">
    <div class="card-body">
      <form action="{{route('admin.dateRangeReport.search')}}" method="POST">
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
          <div class="col-md-10">
            <select name="user_ids[]" id="user_ids" class="form-control select2" multiple required>
              <option value="">Select Employee</option>
              @foreach (App\Models\User::all() as $user)
              <option value="{{$user->id}}" {{ in_array($user->id, $userIds ?? []) ? 'selected' : '' }}>
                {{$user->name}}
              </option>
              @endforeach
            </select>
          </div>
      </form>
      <div class="col-md-2">
        <form action="{{route('admin.dateRangeReport.export.excel')}}" method="POST">
          @csrf
          <input type="date" name="current_date" class="form-control" value="{{ $current_date ?? \Carbon\Carbon::now()->format('Y-m-d') }}" hidden>
          <input type="date" name="previous_date" class="form-control" value="{{ $previous_date ?? \Carbon\Carbon::yesterday()->format('Y-m-d') }}" hidden>
          <select name="user_ids[]" id="user_ids" class="form-control select2" multiple required hidden>
            <option value="">Select Employee</option>
            @foreach (App\Models\User::all() as $user)
            <option value="{{$user->id}}" {{ in_array($user->id, $userIds ?? []) ? 'selected' : '' }}>
              {{$user->name}}
            </option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-success  w-100">Download Excel Doc</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--end breadcrumb-->
<div class="row m-3">
  <div class="col-md-12" style="padding-right: 0px;">
    <table class="table table-striped table-bordered">
      @if (!empty($reports))
      <thead class="table-light">
        <tr>
          <th>Employee Name</th>
          <th>Task Name</th>
          <th>Estimated Time</th>
          <th>Spent Time</th>
          <th>Learning Time</th>
          <th>Status</th>
          <th>Physical Office</th>
          <th>Office Start</th>
          <th>Office End</th>
          <th>Git URL</th>
          <th>DS Date</th>
        </tr>
      </thead>
      @foreach($reports as $user_reports)
      @foreach ($user_reports as $user_report)
      @if ($user_report->total_estimated_time > 0)

      <tbody>
        @foreach ($user_report['details'] as $key=>$detail)
        <tr>
          <td>{{$user_report['users']->name}}</td>
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
          <td>{{ $user_report->is_physical_office == 1 ?'Yes':'No' }}</td>
          <td>{{ \Carbon\Carbon::parse($user_report->office_start_time)->format('h:i A') }}</td>
          <td>{{ \Carbon\Carbon::parse($user_report->office_end_time)->format('h:i A') }}</td>
          <td>{{ $user_report->git_url }}</td>
          <td>{{ \Carbon\Carbon::parse($user_report->date)->format('d M Y') }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="table-light">
        <tr class="table-success text-center">
          <th></th>
          <th>Total</th>
          <th>{{ number_format($user_report->total_estimated_time / 60, 2) }}h</th>
          <th>{{ number_format($user_report->total_spent_time / 60, 2) }}h</th>
          <th>{{ number_format($user_report->total_learning_time / 60, 2) }}h</th>
          <th colspan="6"></th>
        </tr>
      </thead>
      @else
      <thead class="table-light">
        <tr class="table-danger text-center">
          <th class="text-start">{{ $user_report['users']->name }}</th>
          <th class="text-start">No Task Added.</th>
          <th>{{ number_format($user_report->total_estimated_time / 60, 2) }}h</th>
          <th>{{ number_format($user_report->total_spent_time / 60, 2) }}h</th>
          <th>{{ number_format($user_report->total_learning_time / 60, 2) }}h</th>
          <th colspan="6" class="text-end">{{ \Carbon\Carbon::parse($user_report->date)->format('d M Y') }}</th>
        </tr>
      </thead>
      @endif

      @endforeach
      @endforeach

      @endif
    </table>
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