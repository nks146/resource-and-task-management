<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>{{config('app.name')}}{{ !empty($title) ? ' | '.$title : '' }}</title>
		<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('backend_assets/images/favicon-32x32.png') }}">
		<!-- Global stylesheets -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('backend_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('backend_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('backend_assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('backend_assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('backend_assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('backend_assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
		<!--<link href="{{ URL::asset('backend_assets/css/custom.css') }}" rel="stylesheet" type="text/css">-->
		<!-- /global stylesheets -->
		<style type="text/css">
			.navbar-brand.dashboard-logo img {height: 2rem;display: block;}
		</style>
		@yield('style')
		<!-- Core JS files -->
		<script src="{{ URL::asset('backend_assets/js/main/jquery.min.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/main/bootstrap.bundle.min.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/plugins/loaders/blockui.min.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/app.js')}}"></script>		
		<!-- /core JS files -->	

		<!-- Theme JS files -->
		<script src="{{ URL::asset('backend_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
		
		<script src="{{ URL::asset('backend_assets/js/demo_pages/dashboard.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/streamgraph.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/sparklines.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/lines.js')}}"></script> 
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/areas.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/donuts.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/bars.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/progress.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/heatmaps.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/pies.js')}}"></script>
		<script src="{{ URL::asset('backend_assets/js/demo_charts/pages/dashboard/dark/bullets.js')}}"></script>
		<!-- /theme JS files -->	
		<!--<script type="text/javascript"> var token = '{{ csrf_token() }}'; var SITE_URL = '<?php echo url('/') ?>';</script>-->
	</head>
	<body>
		<!-- Main navbar -->
		@include('backend.includes.navbar')
		<!-- /main navbar -->
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			@include('backend.includes.sidebar')
			<!-- Main sidebar -->
			<!-- /Main content -->
			<div class="content-wrapper">
				@yield('content')
				@include('backend.includes.footer')
			</div>
		</div>
		@yield('javascript')
	</body>
</html>
