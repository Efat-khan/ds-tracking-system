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
  <div class="max-width-container">
    @if (count($todays_ds_to_do_work) == 0 && count($todays_ds_in_progress_work) == 0 && count($todays_ds_complete_work) == 0)
    <div class="no-ds-message">
      <p>No DS is added Today.</p>
    </div>
    @endif
    <!-- board view -->
    <div id="board-view" class="board-view ">
      <!-- list -->
      @if (count($todays_ds_to_do_work) != 0)
      <div>
        <h2 class="list-header">
          <span class="circle pink-background"></span><span class="text">To do</span>
        </h2>
        <ul class="tasks-list pink">
          @foreach ($todays_ds_to_do_work as $key=>$value)

          <li class="task-item">
            <form method="POST" action="{{ route('employee.ds.work.status.update') }}">
              @csrf
              <input type="hidden" name="task_id" value="{{ $value->id }}">
              <div class="task-button">
                <div>
                  <!-- Delete Task Btn -->
                  <div style="display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  padding-bottom: 10px;">

                    <p class="task-name" style="flex-grow: 1; margin: 0;">
                      {{ $value->name }}
                    </p>

                    <div class="text-center">
                      <a href="{{route('employee.ds.work.delete',$value->id)}}"
                        class="button regular-button pink-background cta-button"
                        title="Add this to my task.">
                        X
                      </a>
                    </div>
                  </div>
                  <!-- Dropdown moved below the task name -->
                  <select name="task_status" class="status-dropdown white-background" onchange="this.form.submit()">
                    <option value="to_do" class="pink-background" {{ $value->task_status == 'to_do' ? 'selected' : '' }}>To do</option>
                    <option value="in_progress" class="pink-background" {{ $value->task_status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="complete" class="green-background" {{ $value->task_status == 'complete' ? 'selected' : '' }}>Done</option>
                    <option value="not_done" class="blue-background" {{ $value->task_status == 'not_done' ? 'selected' : '' }}>Not Done</option>
                  </select>
                </div>
                <!-- Arrow icon (optional, if needed) -->
                <a href="{{route('employee.ds.work.edit',$value->id)}}">
                  <iconify-icon
                    icon="material-symbols:arrow-back-ios-rounded"
                    style="color: black"
                    width="18"
                    height="18"
                    class="arrow-icon">
                  </iconify-icon>
                </a>
              </div>
            </form>
          </li>

          @endforeach
        </ul>
      </div>
      @endif
      <!-- list -->
      @if (count($todays_ds_in_progress_work) != 0)
      <div>
        <h2 class="list-header">
          <span class="circle blue-background"></span><span class="text">In Progress</span>
        </h2>
        <ul class="tasks-list blue">
          @foreach ($todays_ds_in_progress_work as $key=>$value)
          <li class="task-item">
            <form method="POST" action="{{ route('employee.ds.work.status.update') }}">
              @csrf
              <input type="hidden" name="task_id" value="{{ $value->id }}">

              <div class="task-button">

                <div>
                  <p class="task-name">{{ $value->name }}</p>
                  <!-- Dropdown moved below the task name -->
                  <select name="task_status" class="status-dropdown white-background" onchange="this.form.submit()">
                    <option value="to_do" class="pink-background" {{ $value->task_status == 'to_do' ? 'selected' : '' }}>To do</option>
                    <option value="in_progress" class="pink-background" {{ $value->task_status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="complete" class="green-background" {{ $value->task_status == 'complete' ? 'selected' : '' }}>Done</option>
                    <option value="not_done" class="blue-background" {{ $value->task_status == 'not_done' ? 'selected' : '' }}>Not Done</option>
                  </select>
                </div>
                <!-- Arrow icon (optional, if needed) -->
                <a href="{{route('employee.ds.work.edit',$value->id)}}">
                  <iconify-icon
                    icon="material-symbols:arrow-back-ios-rounded"
                    style="color: black"
                    width="18"
                    height="18"
                    class="arrow-icon">
                  </iconify-icon>
                </a>
              </div>
            </form>
          </li>
          @endforeach
        </ul>
      </div>
      @endif
      <!-- list -->
      @if (count($todays_ds_complete_work) != 0)
      <div>
        <h2 class="list-header">
          <span class="circle green-background"></span><span class="text">Done</span>
        </h2>
        <ul class="tasks-list green">
          @foreach ($todays_ds_complete_work as $key=>$value)
          <li class="task-item">
            <form method="POST" action="{{ route('employee.ds.work.status.update') }}">
              @csrf
              <input type="hidden" name="task_id" value="{{ $value->id }}">

              <div class="task-button">

                <div>
                  <p class="task-name">{{ $value->name }}</p>
                  <!-- Dropdown moved below the task name -->
                  <select name="task_status" class="status-dropdown white-background" onchange="this.form.submit()">
                    <option value="to_do" class="pink-background" {{ $value->task_status == 'to_do' ? 'selected' : '' }}>To do</option>
                    <option value="in_progress" class="pink-background" {{ $value->task_status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="complete" class="green-background" {{ $value->task_status == 'complete' ? 'selected' : '' }}>Done</option>
                    <option value="not_done" class="blue-background" {{ $value->task_status == 'not_done' ? 'selected' : '' }}>Not Done</option>
                  </select>
                </div>
                <!-- Arrow icon (optional, if needed) -->
                <a href="{{route('employee.ds.work.edit',$value->id)}}">
                  <iconify-icon
                    icon="material-symbols:arrow-back-ios-rounded"
                    style="color: black"
                    width="18"
                    height="18"
                    class="arrow-icon">
                  </iconify-icon>
                </a>
              </div>
            </form>
          </li>
          @endforeach

        </ul>
      </div>
      @endif
    </div>

  </div>
</div>

@endsection
@section('customeJS')

@endsection