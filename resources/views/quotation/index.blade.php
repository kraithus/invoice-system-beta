<!DOCTYPE html>
<html lang="en">
<head>
	<title> {{ $title }} </title>
	@extends('layouts.css-scripts')
	<link href="cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>		
<body>
	<!---MAIN NAV--->
	<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<h2>iQuoteYou</h2>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"
			aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link active" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control all_forms mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-search my-2 my-sm-0" type="submit"><span class="la la-search"></span></button>
			</form>
		</div>
	</nav>
	<!---MAIN NAV--->

@if(session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                @endif
<p>List of your quotations:</p>
<table style="border: 1px solid black;">
    <thead>
        <tr>
            <th>Job</th>
            <th>Customer Name</th>
            <th>Price</th>
        </tr>   
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->name }}</td>
            <td>{{ $job->customer->name }}</td>
            <td>{{ $job->customer->quotation->price }}</td>
            <td></td>
        @endforeach  
        
        
            <tr>
                <td></td>
            </tr>    
        

    </thead>    
</table>
@extends('layouts.js-scripts')        
<script src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</html>