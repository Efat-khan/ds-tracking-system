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

    @if (count($all_users_todays_details) != 0)
    <!-- board view -->
    <div id="board-view" class="board-view">
      <!-- list -->
      <div>
        <h2 class="list-header">
          <span class="circle green-background"></span><span class="text">Community Ds</span>
        </h2>
        <ul class="tasks-list green">
          @foreach ($all_users_todays_details as $key=>$value)
          <li class="task-item">
            <div class="task-button">
              <div>
                <div style="display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px; padding-bottom:10px">
                  <p class="task-name">{{ $value['users']->name }}</p>
                  <div class="text-center" style="padding-top: 0;">
                    <a href="{{$value->git_url??'#'}}"
                      target="_blank"
                      class="button regular-button green-background cta-button" title="Add this to my task.">
                      Git URL
                    </a>
                  </div>
                </div>
                @if (count($value['details'])>0)
                @foreach ($value['details'] as $key=>$value)
                <div style="display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px; padding-bottom:10px">
                  <p class="task-due-date" style="flex-grow: 1;">{{ $key+1 }}. {{$value->name}} - {{($value->task_status === 'to_do')?'TO DO':($value->task_status === 'in_progress'?'In Progress':'Complete')}} - ET {{$value->estimated_time}}h</p>
                  <form method="POST" action="{{ route('employee.ds.work.store') }}" style="display: flex;
  align-items: center;">
                    @csrf
                    <input type="text" name="daily_summary_id" value="{{ $todays_ds->id }}" hidden>
                    <input type="text" name="name" value="{{ $value->name }}" hidden>

                    <input type="number" name="estimated_time" value="{{ $value->estimated_time }}" hidden>
                    <input type="text" name="task_status" value="to_do" hidden>

                    <div class="text-center">
                      <button
                        type="submit"
                        class="button regular-button green-background cta-button" title="Add this to my task.">
                        +
                      </button>
                    </div>
                  </form>
                </div>
                @endforeach
                @else
                <p class="task-due-date"> No Task Added Today.</p>
                @endif
                <!-- Dropdown moved below the task name -->

              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    @else

    <div class="no-ds-message">
      <p>No DS is added Today.</p>
    </div>
    @endif
  </div>
</div>

@endsection
@section('customeJS')

@endsection