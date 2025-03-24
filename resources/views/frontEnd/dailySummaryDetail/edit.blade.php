@extends('frontEnd.layouts.master')
@section('content')

<style>
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

  .container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
  }

  .previous-day-ds-container,
  .task-work-container {
    width: 48%;
    /* Adjust the width for both sections */
  }

  .previous-ds-list {
    list-style-type: none;
    padding: 0;
  }

  .ds-item {
    margin-bottom: 15px;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
  }

  /* Styling the List View */
  .list-view {
    margin-top: 20px;
  }

  .list-container {
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 5px;
  }

  .list-header {
    display: flex;
    align-items: center;
    font-size: 18px;
    margin-bottom: 15px;
  }

  .circle {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 10px;
  }

  .pink-background {
    background-color: #ffccd5;
  }

  .blue-background {
    background-color: #cce5ff;
  }

  .green-background {
    background-color: #d4edda;
  }

  .tasks-list {
    list-style-type: none;
    padding: 0;
  }

  .task-item {
    margin-bottom: 10px;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
  }

  .task-button {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: none;
    border: none;
    width: 100%;
    cursor: pointer;
  }

  .task-name {
    font-weight: bold;
  }

  .arrow-icon {
    margin-left: 10px;
  }
</style>

<div class="content-container">
  @include('frontEnd.layouts.menue')
</div>

<div class="container">
  <!-- Left Section: Previous Day DS -->
  <div class="previous-day-ds-container">
    <h2 class="header">Today's DS <strong style="font-size:1.5rem">
  ({{ \Carbon\Carbon::parse($daily_summary->date)->format('d M Y')}}
  )</strong></h2>
    <!-- List View for Previous Day DS -->
    <div id="list-view" class="list-view">
      <div class="list-container pink">
        <h2 class="list-header">
          <span class="circle pink-background"></span>
          <span class="text">To do</span>
        </h2>
        @if (count($today_ds_to_do_work) != 0)
        <ul class="tasks-list">
          @foreach($today_ds_to_do_work as $ds)
          <li class="task-item">
            <button class="task-button">
              <p class="task-name">{{ $ds->name }}</p>
              <p class="task-due-date">Due on {{ \Carbon\Carbon::parse($ds->created_at)->format('F j, Y') }}</p>
              <a href="{{route('employee.ds.work.edit',$ds->id)}}">
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"></iconify-icon>
                </a>
            </button>
          </li>
          @endforeach
        </ul>
        @else
        <p class="no-tasks">No tasks available</p>
        @endif
      </div>

      <div class="list-container blue">
        <h2 class="list-header">
          <span class="circle blue-background"></span>
          <span class="text">In Progress</span>
        </h2>
        @if (count($today_ds_in_progress_work) != 0)
        <ul class="tasks-list">
          @foreach($today_ds_in_progress_work as $ds)
          <li class="task-item">
            <button class="task-button">
              <p class="task-name">{{ $ds->name }}</p>
              <p class="task-due-date">Due on {{ \Carbon\Carbon::parse($ds->created_at)->format('F j, Y') }}</p>
              <a href="{{route('employee.ds.work.edit',$ds->id)}}">
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"></iconify-icon>
              </a>
            </button>
          </li>
          @endforeach
        </ul>
        @else
        <p class="no-tasks">No tasks available</p>
        @endif
      </div>

      <div class="list-container green">
        <h2 class="list-header">
          <span class="circle green-background"></span>
          <span class="text">Done</span>
        </h2>
        @if (count($today_ds_complete_work) != 0)
        <ul class="tasks-list">
          @foreach($today_ds_complete_work as $ds)
          <li class="task-item">
            <button class="task-button">
              <p class="task-name">{{ $ds->name }}</p>
              <p class="task-due-date">Due on {{ \Carbon\Carbon::parse($ds->created_at)->format('F j, Y') }}</p>
              <a href="{{route('employee.ds.work.edit',$ds->id)}}">
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"></iconify-icon>
              </a>
            </button>
          </li>
          @endforeach
        </ul>
        @else
        <p class="no-tasks">No tasks available</p>
        @endif
      </div>
    </div>
  </div>

  <!-- Right Section: Set Task Work Form -->
  <div class="overlay-content pink-background">
    <h1 class="header">Update DS Task</h1>
    <form class="form" autocomplete="off" method="POST" action="{{ route('employee.ds.work.update') }}" style="margin-top:0px;">
      @csrf
      <input type="text" name="id" value="{{ $daily_summary_detail->id }}" hidden>
      <input type="text" name="daily_summary_id" value="{{ $daily_summary_detail->daily_summary_id }}" hidden>

      <label for="name" class="label">Work</label>
      <textarea
        name="name"
        id="name"
        rows="5"
        class="textarea-input white-background"
        value="">{{ $daily_summary_detail->name ?? '' }}</textarea>
      @error('name') <p class="text-dark">{{ $message }}</p> @enderror

      <label for="estimated_time" class="label">Estimated Time(Hours)</label>
      <input type="number" name="estimated_time" value="{{ $daily_summary_detail->estimated_time/60 ?? '' }}" class="input white-background">
      @error('estimated_time') <p class="text-dark">{{ $message }}</p> @enderror

      <label for="spent_time" class="label">Spent Time(Hours)</label>
      <input type="number" name="spent_time" value="{{ $daily_summary_detail->spent_time/60 ?? '' }}" class="input white-background">

      <label for="learning_time" class="label">Learning Time(Hours)</label>
      <input type="number" name="learning_time" value="{{ $daily_summary_detail->learning_time/60 ?? '' }}" class="input white-background">

      <h2 class="label">Status</h2>
      <div class="status-select white-background flex items-center justify-between cursor-pointer">
        <select id="status-select" name="task_status" class="status-dropdown white-background">
          <option value="to_do" {{ $daily_summary_detail->task_status =='to_do'?'selected':'' }} class="pink-background">To do</option>
          <option value="in_progress" {{ $daily_summary_detail->task_status =='in_progress'?'selected':'' }} class="pink-background">In Progress</option>
          <option value="complete" {{ $daily_summary_detail->task_status =='complete'?'selected':'' }} class="green-background">Done</option>
          <option value="not_done" {{ $daily_summary_detail->task_status =='not_done'?'selected':'' }} class="blue-background">Not Done</option>
        </select>
      </div>
      <div class="text-center">
        <button
          type="submit"
          class="button regular-button green-background cta-button">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

@endsection

@section('customeJS')
@endsection