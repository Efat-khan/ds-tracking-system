<!-- HEADER -->
@include('admin.backEnd.layouts.header')

<body>
    <!-- NOTIFICATION MESSAGE -->
    @include('sweetalert::alert')
    @if (session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'success',
            title: "{{ session('success')['title'] }}",
        })
        
    </script>
    @endif
    @if (session('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'error',
            title: "{{ session('error')['title'] }}",
        })
        
    </script>
    @endif
    @if (session('warning'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'warning',
            title: "{{ session('warning')['title'] }}",
        })
       
    </script>
    @endif
    @if (session('info'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'info',
            title: "{{ session('info')['title'] }}",
        })
     
    </script>
    @endif
    @if (session('question'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'question',
            title: "{{ session('question')['title'] }}",
        })
    </script>
    @endif
	 
	<!--wrapper-->
	<div   div class="wrapper">
        <!-- MENUE -->
		@include('admin.backEnd.layouts.menue')



		<!--start page wrapper -->
		@yield('content')
		<!--end page wrapper -->




		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> 
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{ !empty($layout_data->copyright_text)?$layout_data->copyright_text:'' }}. All Rights Reserved.<a href="{{ !empty($layout_data->developer_link)?$layout_data->developer_link:'https://www.linkedin.com/in/efat-khan/' }}" target="_blank"> Developed By Efat Khan</a></p>
		</footer>
	</div>
	<!--end wrapper-->
<!-- ALL MODELS -->
	@include('admin.backEnd.layouts.models')



	<!--start switcher-->
	<div class="switcher-wrapper" hidden>
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	
	<!--plugins-->
	<script src="{{asset('back-end-assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('back-end-assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('back-end-assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('back-end-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!-- data table -->
	<script src="{{asset('back-end-assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('back-end-assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<!-- Vector map JavaScript -->
	<script src="{{asset('back-end-assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{asset('back-end-assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<!-- highcharts js -->
	<script src="{{asset('back-end-assets/plugins/highcharts/js/highcharts.js')}}"></script>
	<script src="{{asset('back-end-assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{asset('back-end-assets/js/index2.js')}}"></script>
	<!-- Select2 CDN -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<!-- Bootstrap JS -->
    <script src="{{asset('back-end-assets/js/bootstrap.bundle.min.js')}}"></script> 
	<!-- CSRF TOKEN FOR AJAX -->
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			}
		});
	</script>
    <!-- CUSTOM JS -->
		<script>
	$(document).ready(function() {
		var table = $('#example2').DataTable({
			lengthChange: false,
			buttons: ['copy', 'excel', 'pdf', 'print']
		});

		table.buttons().container()
			.appendTo('#example2_wrapper .col-md-6:eq(0)');
	});
</script>
     @yield('custom-js-section')
	<!--app JS-->
	<script src="{{asset('back-end-assets/js/app.js')}}"></script>
</body>


</html>