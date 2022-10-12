<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{ config('app.name') }} | Admin Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</head>

<body>
	<!-- MAIN NAV -->
	<x-admin.nav />
	<!-- MAIN NAV -->

	<div class="container-fluid">
		<div class="row">

			<!---SIDE BAR -->
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" aria-label="">
				<div class="sidebar-sticky pt-3">
					<ul class="side_nav list-unstyled flex-column px-3 pt-2 pb-4">
						<li class="active"><a class="text-decoration-none px-3 py-2 d-block" href="/cpanel"><span class="la la-home"></span> Home</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="notification/create"><span class="la la-bullhorn"></span> Send Notification</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/jobs-done"><span class="la la-briefcase"></span> View Jobs</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/invoice"><span class="la la-file-invoice"></span> Invoices</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/export-data"><span class="la la-database"></span> Export Data</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/register"><span class="la la-address-book"></span> Register Technician</a></li>
						<li class="dropdown">
						<a class="dropdown-toggle text-decoration-none px-3 py-2 d-block" href="#" id="sidebarDropdownMenuLink" role="button" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><span class="la la-chart-line"></span> Reports</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"
							aria-labelledby="sidebarDropdownMenuLink">
							<a class="dropdown-item text-decoration-none px-3 py-2 d-block" href="/outstanding-invoices">Outstanding Invoices</a>
							<a class="dropdown-item text-decoration-none px-3 py-2 d-block" href="#">Quotations</a>
						</div>
					</li>
					</ul>
				</div>
			</nav>
			<!---SIDE BAR -->

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<!---Pangani div apapa---->
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/cpanel"><span class="la la-home"></span> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Overview</li>
							</ol>
						</nav>
					</div>
					@if(session()->has('message'))
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  </div>
					</div>
					@endif
					<div class="col-md-4">
						<div class="box">
							<h4 class="block-title">Today<span class="la la-calendar"></span></h4>
							<div class="title-border"></div>
							<div class="media">
								<div class="media-body">    
									<h5><strong>Jobs Done:</strong> {{ $jobCount }}</h5> 		
								</div>
							</div>	
							<div class="media">
								<div class="media-body">    
									<h5><strong>Sum of Quotations:</strong> MWK {{ number_format($priceSum) }}</h5> 		
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box">
							<h5 class="block-title">Jobs <span class="la la-briefcase"></span></h5>
							<div class="title-border"></div>
							<div>
								{!! $chart->container() !!}
							</div>
						</div>
					</div>	
					
				</div>
			</main>
		</div>
	</div>

	{!! $chart->script() !!}
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>