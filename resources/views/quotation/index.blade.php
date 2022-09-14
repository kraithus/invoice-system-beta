<!DOCTYPE html>
<html lang="en">
<head>
	<title> {{ $title }} </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<!-- DataTable Scripts -->
	<!-- DataTables CSS -->
	<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
</head>		
<body>
	<!-- dataTables JS -->
	<script>
    $(document).ready( function () {
        $('#customerTable').DataTable();
        $(".dataTables_wrapper").addClass("");
        $(".dataTables_length").addClass("");
        $(".dataTables_filter").addClass("");
        $(".dataTables_length select").addClass("form-control");
        $(".dataTables_filter input").addClass("form-control")
    } ); 
    </script>  
    <!---MAIN NAV--->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <h2>ORG</h2>
        </a>

        <ul class="nav_tool ml-auto">
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="imgs/usr.png" width="25" height="25" class="rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"
                    aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"><span class="la la-user-edit"></span> Edit Profile</a>
                    <a class="dropdown-item" href="#"><span class="la la-door-open"></span> Log Out</a>
                </div>
            </li>
            <li>
                <a href=""><span class="la la-envelope"><span class="badge badge-light">1</span></span></a>
            </li>
            <li>
                <a href=""><span class="la la-bell-o"><span class="badge badge-light">0</span></span></a>
            </li>

        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="la la-bars"></span>
        </button>
    </nav>
    <!---MAIN NAV--->

    <div class="container-fluid">
        <div class="row">

            <!---SIDE BAR--->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" aria-label="">
                <div class="sidebar-sticky pt-3">
                    <ul class="side_nav list-unstyled flex-column px-3 pt-2 pb-4">
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/dashboard"><span
                                    class="la la-home"></span> Home</a></li>
                        <li class="active"><a class="text-decoration-none px-3 py-2 d-block" href="/customer/create"><span
                                    class="la la-user-plus"></span> Add Customer</a></li>
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/job/create"><span
                                    class="la la-briefcase"></span> New Job</a></li>
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/quotation"><span
                                    class="la la-th-list"></span> Quotations</a></li>
                    </ul>
                </div>
            </nav>
            <!---SIDE BAR--->

			<!-- Main -->
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
				<div class="row">
						<div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><span class="la la-home"></span> Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Your Quotations</li>
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
                                <h4 class="block-title">Quotations <span class="la la-th-list"></span></h4>
                                <div class="title-border"></div>
                                <div class="table-reponsive">
                                    <table id="customerTable" class="table table-striped" aria-labelledby="">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Job</th>
                                                <th>Customer Name</th>
                                                <th>Price</th>
                                                <th>Email Quotation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->name }}</td>
                                            <td>{{ $job->customer->name }}</td>
                                            <td>{{ $job->quotation->price }}</td>
                                            <td>
                                            <a href="{{ route('email-quotation', $job->id) }}"><button>Send Email</button></a>
                                            <a href="{{ route('quotation-pdf', $job->id) }}" target="_blank"><button>View PDF</button></a>
                                            </td>
                                        </tr>    
                                        @endforeach     
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
						</div>	
				</div>			
			</main>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
	</body>     
</html>