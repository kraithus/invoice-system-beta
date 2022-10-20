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
	<!-- DataTables CSS -->
	<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
	<!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- Scripts for buttons and others -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</head>		
<body>
	<!-- dataTables JS -->
	<script>
    $(document).ready(function () {
        $('#jobTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1 , 2 ]
                    }
                }
            ]
        } );
        $(".dataTables_wrapper").addClass("");
        $(".dataTables_length").addClass("");
        $(".dataTables_filter").addClass("");
        $(".dataTables_length select").addClass("form-control");
        $(".dataTables_filter input").addClass("form-control");
    } ); 
    </script>  
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
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="notification/create"><span class="la la-bullhorn"></span> Send Notification</a></li>
						<li class=""><a class="text-decoration-none px-3 py-2 d-block" href="jobs-done"><span class="la la-briefcase"></span> Jobs</a></li>
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/invoice"><span class="la la-file-invoice"></span> Invoices</a></li>
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="export-data"><span class="la la-database"></span> Export Data</a></li>
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
								<li class="breadcrumb-item"><a href="dashboard"><span class="la la-home"></span> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Jobs</li>
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
                                    <table id="jobTable" class="table table-striped" aria-labelledby="">
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
                                            <a href="{{ route('email-quotation', $job->id) }}"><button class="all_btn_quote">Send Email <span class="la la-envelope-o"></span></button></a>
                                            <a href="{{ route('quotation-pdf', $job->id) }}" target="_blank"><button class="all_btn_quote">View PDF <span class="la la-eye"></span></button></a>
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
        </div>    
    </div>   
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>         