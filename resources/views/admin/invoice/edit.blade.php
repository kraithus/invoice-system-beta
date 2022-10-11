<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{ config('app.name') }} | {{ $title }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
	<!-- MAIN NAV -->
	<x-admin.nav />
	<!-- MAIN NAV -->
	<div class="container-fluid">
		<div class="row">

			<!---SIDE BAR--->
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" aria-label="">
				<div class="sidebar-sticky pt-3">
					<ul class="side_nav list-unstyled flex-column px-3 pt-2 pb-4">
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="cpanel"><span class="la la-home"></span> Home</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/notification/create"><span class="la la-bullhorn"></span> Send Notification</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/jobs-done"><span class="la la-briefcase"></span> View Jobs</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/invoice"><span class="la la-file-invoice"></span> Invoices</a></li>
						<li class="active"><a class="text-decoration-none px-3 py-2 d-block" href="export-data"><span class="la la-database"></span> Export Data</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/register"><span class="la la-address-book"></span> Register Technician</a></li>
					</ul>
				</div>
			</nav>
			<!---SIDE BAR--->

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<!---Pangani div apapa---->
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><span class="la la-home"></span> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Overview</li>
							</ol>
						</nav>
					</div>
					@if(session()->has('message'))<span class="la la-calendar"></span>
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session()->get('message') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  </div>
					</div>
					@endif
					<div class="col-md-">
						<div class="box">
							<h4 class="block-title">Generate Receipt <span class="la la-calendar"></span></h4>
							<div class="title-border"></div>
							<div class="media">
								<div class="media-body">
                                    <form method="POST" action="/receipt">
                                    @csrf        
									<div class="form-group">
										<label for="month">Select Payment Method</label>	
											<select class="form-control all_forms" name="payment_method">
											</select>				
									</div>		
									<button class="generate_btn" type="submit"><span class="la la-file-alt"></span> Generate Receipt</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>    