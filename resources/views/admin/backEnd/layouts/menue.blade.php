<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{asset('back-end-assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">Admin Dashboard</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="{{route('admin.dashboard')}}">
				<div class="parent-icon"><i class='bx bx-home-alt'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="menu-label">Report</li>
		<li>
			<a href="{{route('admin.dailyReport')}}">
				<div class="parent-icon"><i class='bx bx-file'></i>
				</div>
				<div class="menu-title">Daily Report</div>
			</a>
		</li>
		<li>
			<a href="{{route('admin.dateRangeReport')}}">
				<div class="parent-icon"><i class='bx bx-file'></i>
				</div>
				<div class="menu-title">Date Range Report</div>
			</a>
		</li>
		<!-- <li>
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-group'></i>
				</div>
				<div class="menu-title">Member</div>
			</a>
			<ul>
				<li> <a href=""><i class='bx bx-radio-circle'></i>All Member</a>
				</li>
				<li> <a href=""><i class='bx bx-radio-circle'></i>Create Member</a>
				</li>
			</ul>
		</li> -->
		
		<li class="menu-label">Setting</li>
		<li>
			<form method="POST" action="{{ route('admin.logout') }}">
				@csrf
				<a class="dropdown-item d-flex align-items-center" href="{{route('admin.logout')}}"
					onclick="event.preventDefault();
					this.closest('form').submit();">
					<div class="parent-icon"><i class="bx bx-log-out-circle fs-5"></i></div> 
					<div class="menu-title">Logout</div>
				</a>
			</form>
		</li

			</ul>
		<!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->
<header>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand gap-3">
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
			</div>
			<div class="top-menu ms-auto">
			</div>
			<div class="user-box dropdown px-3">
				<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<div class="user-info">
						<p class="user-name mb-0">{{Auth::user()->name}}</p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li><a class="dropdown-item d-flex align-items-center" href=""><i class="bx bx-user fs-5"></i><span>Profile</span></a>
					</li>
					<li>
						<div class="dropdown-divider mb-0"></div>
					</li>
					<li>
						<form method="POST" action="{{ route('admin.logout') }}">
							@csrf
							<a class="dropdown-item d-flex align-items-center" href="{{route('admin.logout')}}"
								onclick="event.preventDefault();
					this.closest('form').submit();">
								<i class="bx bx-log-out-circle fs-5"></i><span>Logout</span>
							</a>
						</form>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!--end header -->