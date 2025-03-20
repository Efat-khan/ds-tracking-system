<!-- header -->
<div class="max-width-container">
    <div class="header flex items-center justify-between">
        <h1 class="title">{{ Auth::user()->name }}'s Daily Standup</h1>
        <div class="buttons-container">
            @if (!empty($todays_ds))
            <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="daily_summary_id" value="{{$todays_ds->id}}"  hidden>
                <input type="file" name="file" id="add-task-cta"
                class="button regular-button blue-background"
                style="padding-top:6px;"  required>
                <button type="submit" id="add-task-cta"
                class="button regular-button blue-background"
                style="padding-top:0px;">Upload</button>
            </form>
            <a href="{{route('employee.ds.work.index')}}"
                id="add-task-cta"
                class="button regular-button blue-background"
                style="padding-top:9px;">
                Add Todays Task
            </a>
            @endif
            <a href="{{route('employee.ds.index')}}"
                id="add-task-cta"
                class="button regular-button blue-background"
                style="padding-top:9px;">
                Add DS
            </a>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
            </form>

            <button class="sign-out-cta" onclick="document.getElementById('logout-form').submit();">
                Sign out
            </button>

        </div>
    </div>
</div>
<!-- Menu bar -->
<div class="radio-buttons-container">
    <div class="max-width-container flex">
        <div class="radio-container">
            <a href="{{route('dashboard')}}" class="radio-label {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <iconify-icon
                    icon="material-symbols:format-list-bulleted-rounded"
                    style="color: black"
                    width="30"
                    height="24"></iconify-icon>
                <span>Todays Task</span>
            </a>
        </div>
        <div class="radio-container">
            <a href="{{route('employee.community')}}" class="radio-label {{ request()->routeIs('employee.community') ? 'active' : '' }}">
                <iconify-icon
                    icon="ic:round-grid-view"
                    style="color: black"
                    width="24"
                    height="24"></iconify-icon>
                <span>Community</span>
            </a>
        </div>
        <div class="radio-container">
            <a href="{{route('employee.report')}}" class="radio-label {{ request()->routeIs('employee.community') ? 'active' : '' }}">
                <iconify-icon
                    icon="ic:round-grid-view"
                    style="color: black"
                    width="24"
                    height="24"></iconify-icon>
                <span>Report</span>
            </a>
        </div>
    </div>
</div>