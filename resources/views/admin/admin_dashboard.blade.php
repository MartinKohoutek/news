<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}" />

	<link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<script src="https://cdn.tiny.cloud/1/i1sr52wto9c0w6rx51se5ohgpmvtyf14twa9tru9i2mur9lv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('admin')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('admin.body.footer')
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
	<script src="{{ asset('backend/assets/js/index2.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('backend/assets/js/code.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	@if (Session::has('message'))
	<script>
		var type = "{{ Session::get('alert-type', 'info') }}";
		toastr.options.closeButton = true;
		switch (type) {
			case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;
			case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;
			case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;
			case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
		}
	</script>
	@endif

	<script>
		tinymce.init({
			selector: 'textarea#tinymce',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
		});
	</script>
</body>

</html>