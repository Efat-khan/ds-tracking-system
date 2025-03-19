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
    <h2 class="header">Previous Day's DS <strong style="font-size:1.5rem">
        {{ !empty($previous_ds->date)?(\Carbon\Carbon::parse($previous_ds->date)->format('d M Y')):''}}
        </strong></h2>

    @if (count($previous_ds_to_do_work) == 0 && count($previous_ds_in_progress_work) == 0&& count($previous_ds_complete_work) == 0)
    <div class="no-ds-message">
      <p>No Previous DS Task Found.</p>
    </div>
    @else
    <!-- List View for Previous Day DS -->
    <div id="list-view" class="list-view">
      <div class="list-container pink">
        <h2 class="list-header">
          <span class="circle pink-background"></span>
          <span class="text">To do</span>
        </h2>
        @if (count($previous_ds_to_do_work) != 0)
        <ul class="tasks-list">
          @foreach($previous_ds_to_do_work as $ds)
          <li class="task-item">
            <button class="task-button">
              <div class="task-content">
                <p class="task-name">{{ $ds->name }}</p>
                <p class="task-time-details">
                  <span class="time-label">ET:</span> {{ $ds->estimated_time ?? 0 }}h,
                  <span class="time-label">ST:</span> {{ $ds->spent_time ?? 0 }}h,
                  <span class="time-label">LT:</span> {{ $ds->learning_time ?? 0 }}h
                </p>
              </div>
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"></iconify-icon>
            </button>
          </li>

          @endforeach
        </ul>
        @else
        <p class="no-task">No task available.</p>
        @endif
      </div>

      <div class="list-container blue">
        <h2 class="list-header">
          <span class="circle blue-background"></span>
          <span class="text">In Progress</span>
        </h2>
        @if (count($previous_ds_in_progress_work) != 0)
        <ul class="tasks-list">
          @foreach($previous_ds_in_progress_work as $ds)
          <li class="task-item">
            <button class="task-button">
              <p class="task-name">{{ $ds->name }}</p>
              <p class="task-time-details">
                  <span class="time-label">ET:</span> {{ $ds->estimated_time ?? 0 }}h,
                  <span class="time-label">ST:</span> {{ $ds->spent_time ?? 0 }}h,
                  <span class="time-label">LT:</span> {{ $ds->learning_time ?? 0 }}h
                </p>
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"></iconify-icon>
            </button>
          </li>
          @endforeach
        </ul>
        @else
        <p class="no-task">No task available.</p>
        @endif
      </div>

      <div class="list-container green">
        <h2 class="list-header">
          <span class="circle green-background"></span>
          <span class="text">Done</span>
        </h2>
        @if (count($previous_ds_complete_work) != 0)
        <ul class="tasks-list">
          @foreach($previous_ds_complete_work as $ds)
          <li class="task-item">
            <button class="task-button">
              <p class="task-name">{{ $ds->name }}</p>
              <p class="task-time-details">
                  <span class="time-label">ET:</span> {{ $ds->estimated_time ?? 0 }}h,
                  <span class="time-label">ST:</span> {{ $ds->spent_time ?? 0 }}h,
                  <span class="time-label">LT:</span> {{ $ds->learning_time ?? 0 }}h
                </p>
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"></iconify-icon>
            </button>
          </li>
          @endforeach
        </ul>
        @else
        <p class="no-task">No task available.</p>
        @endif
      </div>
    </div>
    @endif
  </div>

  <!-- Right Section: Set Task Work Form -->
  <div class="overlay-content pink-background">
    <h1 class="header">Add DS Task</h1>
    <form class="form" autocomplete="off" method="POST" action="{{ route('employee.ds.work.store') }}" style="margin-top:0px;">
      @csrf
      <input type="text" name="daily_summary_id" value="{{ $todays_ds->id }}" hidden>

      <label for="name" class="label">Work</label>
      <textarea
        name="name"
        id="name"
        rows="5"
        class="textarea-input white-background"
        value="{{ old('name') }}"></textarea>
      @error('name') <p class="text-dark">{{ $message }}</p> @enderror

      <label for="estimated_time" class="label">Estimated Time</label>
      <input type="number" name="estimated_time" value="{{ old('estimated_time') }}" class="input white-background">
      @error('estimated_time') <p class="text-dark">{{ $message }}</p> @enderror

      <label for="spent_time" class="label">Spent Time</label>
      <input type="number" name="spent_time" value="{{ old('spent_time') }}" class="input white-background">

      <label for="learning_time" class="label">Learning Time</label>
      <input type="number" name="learning_time" value="{{ old('learning_time') }}" class="input white-background">

      <h2 class="label">Status</h2>
      <div class="status-select white-background flex items-center justify-between cursor-pointer">
        <select id="status-select" name="task_status" class="status-dropdown white-background">
          <option value="to_do" class="pink-background">To do</option>
          <option value="in_progress" class="pink-background">In Progress</option>
          <option value="complete" class="green-background">Done</option>
          <option value="not_done" class="blue-background">Not Done</option>
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