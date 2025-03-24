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
    <!-- list -->
    <div id="board-view" class="row board-view">
    @foreach ($all_users_todays_details as $key=>$value)
      <div class="col-md-12 tasks-list green ">
        <div class="task-item">
          <div class="">
            <div>
              <div class="row m-3">
                <div class="col-md-6 text-start" >
                  <p class="task-name">{{ $value['users']->name }}</p>
                </div>
                <div class="col-md-6 text-end">
                  <a href="{{$value->git_url??'#'}}"
                    target="_blank"
                    class="button regular-button green-background cta-button" style="text-decoration:none; color:black;" title="Add this to my task.">
                    Git URL
                  </a>
                </div>
              </div>
              @if (count($value['details'])>0)
              @foreach ($value['details'] as $key=>$value)
              <div class="row m-3">
                <div class="col-md-6 text-start">
                  <p class="task-due-date"><strong>{{ $key+1 }}.</strong> {{$value->name}} - {{($value->task_status === 'to_do')?'TO DO':($value->task_status === 'in_progress'?'In Progress':'Complete')}}<br><strong>ET-{{$value->estimated_time/60}}h</strong> </p>
                </div>
                <div class="col-md-6 text-end">
                  <form method="POST" action="{{ route('employee.ds.work.store') }}">
                    @csrf
                    <input type="text" name="daily_summary_id" value="{{ $todays_ds->id }}" hidden>
                    <input type="text" name="name" value="{{ $value->name }}" hidden>

                    <input type="number" name="estimated_time" value="{{ $value->estimated_time }}" hidden>
                    <input type="text" name="task_status" value="to_do" hidden>

                    <div class="text-end">
                      <button
                        type="submit"
                        class="button regular-button green-background cta-button" title="Add this to my task.">
                        +
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              @endforeach
              @else
              <div class="m-3">
                <p class="task-due-date"> No Task Added Today.</p>
              </div>
              @endif
              <!-- Dropdown moved below the task name -->

            </div>
          </div>
        </div>
      </div>
      @endforeach
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