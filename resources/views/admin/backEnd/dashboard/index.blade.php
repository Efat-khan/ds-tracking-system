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
          <div class="col-md-2 mb-3">
            <label class="form-label">Current Date:</label>
            <input type="date" name="current_date" class="form-control" value="{{ $current_date ?? \Carbon\Carbon::now()->format('Y-m-d') }}">
          </div>
          <div class="col-md-6">
            <select name="user_ids[]" id="user_ids" class="form-control select2" multiple required>
              <option value="">Select Employee</option>
              @foreach (App\Models\User::all() as $user)
              <option value="{{$user->id}}" {{ in_array($user->id, $userIds ?? []) ? 'selected' : '' }}>
                {{$user->name}}
              </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2" style="padding-top: 29px;">
            <button type="submit" class="btn btn-primary  w-100">Search standup note</button>
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