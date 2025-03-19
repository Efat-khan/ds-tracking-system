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
</style>
<div class="content-container">
  @include('frontEnd.layouts.menue')
</div>

<!-- add DS -->
<div id="set-task-overlay" class="overlay set-task-overlay">
  <div class="overlay-content pink-background">
    <!-- close button -->
<a href="{{route('dashboard')}}"
      class="button circle-button blue-background flex justify-center items-center close-button">
      <iconify-icon
        icon="material-symbols:close-rounded"
        style="color: black"
        width="26"
        height="26"></iconify-icon>
    </a>
    <h1 class="header">Add Daily Summary</h1>
    <form class="form" autocomplete="off" method="POST" action="{{route('employee.ds.store')}}">
      @csrf
      <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
      <input type="text" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="input white-background" readonly>
      @error('date') <p class="text-dark">{{ $message }}</p> @enderror
      <label for="name" class="label">Physical Office</label>
      <div class="status-select white-background flex items-center justify-between cursor-pointer">
        <select id="status-select" name="is_physical_office" class="status-dropdown white-background">
          <option value="0" {{!empty($data->is_physical_office)?($data->is_physical_office == 0 ? 'selected':''):''}} class="pink-background">No</option>
          <option value="1" {{!empty($data->is_physical_office)?($data->is_physical_office == 1 ? 'selected':''):''}} class="blue-background">Yes</option>
        </select>
      </div>
      <div class="time-picker-container flex items-center" style="margin-top: 8px;">
        <!-- Office Start Time -->
        <div class="time-input">
          <label for="office_start_time" class="label">Office Start Time</label>
          <input
            type="time"
            name="office_start_time"
            id="office_start_time"
            class="input white-background"
            value="{{!empty($data->office_start_time)?$data->office_start_time:old('office_start_time')}}"
            >
            @error('office_start_time') <p class="text-dark">{{ $message }}</p> @enderror
        </div>

        <!-- Office End Time -->
        <div class="time-input">
          <label for="office_end_time" class="label">Office End Time</label>
          <input
            type="time"
            name="office_end_time"
            id="office_end_time"
            class="input white-background"
            value="{{!empty($data->office_end_time)?$data->office_end_time:old('office_end_time')}}"
            >
            @error('office_end_time') <p class="text-dark">{{ $message }}</p> @enderror
        </div>
      </div>

      <label for="description" class="label">Git URL</label>
      <textarea
        name="git_url"
        id="git_url"
        rows="8"
        class="textarea-input white-background"
        value=""
        >{{!empty($data->git_url)?$data->git_url:old('git_url')}}</textarea>
        @error('git_url') <p class="text-dark">{{ $message }}</p> @enderror
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