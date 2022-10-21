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
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/jobs-done"><span class="la la-briefcase"></span> Jobs</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/invoice"><span class="la la-file-invoice"></span> Invoices</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/export-data"><span class="la la-database"></span> Export Data</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/register"><span class="la la-address-book"></span> Register Technician</a></li>
						<x-admin.reports-dropdown />	
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

					<div class="col-md-12">
						<div class="box">
							<h4 class="block-title">Today<span class="la la-calendar"></span></h4>
							<div class="title-border"></div>
							<div class="row">
								<div class="col-md-4 mb-5">
									<div class="media">
										<span class="la la-briefcase mr-4 over_customer" alt="..."></span>
										<div class="media-body">
											<h4 class="mt-0">New Jobs</h4>
											<h5><a href=""><span class="la la-arrow-right"></span> {{ $jobCount }}</a></h5>
										</div>
									</div>
								</div>
								<div class="col-md-4 mb-5">
									<div class="media">
										<span class="la la-check-square mr-4 over_customer" alt="..."></span>
										<div class="media-body">
											<h4 class="mt-0">Jobs Done</h4>
											<h5><a href=""><span class="la la-arrow-right"></span> {{ $jobsDone }}</a></h5>
										</div>
									</div>
								</div>
								<div class="col-md-4 mb-5">
									<div class="media">
										<span class="la la-wallet mr-4 over_customer" alt="..."></span>
										<div class="media-body">
											<h4 class="mt-0">Sum of Quotations</h4>
											<h5><a href=""><span class="la la-arrow-right"></span> MWK {{ number_format($priceSum) }}</a></h5>
										</div>
									</div>
									
								</div>
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