<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} | New Job</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="{{ asset('bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap-multiselect/css/bootstrap-multiselect.css') }}" type="text/css"/>
</head>

<body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#customerSearch').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle form-control all_forms" data-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
                popupContainer: '<div class="multiselect-container dropdown-menu"></div>',
                filter: '<div class="multiselect-filter d-flex align-items-center"><i class="fas fa-sm fa-search text-muted"></i><input type="search" class="multiselect-search form-control" /></div>',
                buttonGroup: '<div class="multiselect-buttons btn-group" style="display:flex;"></div>',
                buttonGroupReset: '<button type="button" class="multiselect-reset btn btn-secondary btn-block"></button>',
                option: '<button type="button" class="multiselect-option form-control all_forms dropdown-item"></button>',
                divider: '<div class="dropdown-divider"></div>',
                optionGroup: '<button type="button" class="multiselect-group dropdown-item"></button>',
                resetButton: '<div class="multiselect-reset text-center p-2"><button type="button" class="btn btn-sm btn-block btn-outline-secondary"></button></div>'    
            }
        });
    });
</script>
	<!-- MAIN NAV -->
    <x-technician.nav />
	<!-- MAIN NAV -->

    <div class="container-fluid">
        <div class="row">

            <!---SIDE BAR--->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" aria-label="">
                <div class="sidebar-sticky pt-3">
                    <ul class="side_nav list-unstyled flex-column px-3 pt-2 pb-4">
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/dashboard"><span
                                    class="la la-home"></span> Home</a></li>
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/customer/create"><span
                                    class="la la-user-plus"></span> Add Customer</a></li>
                        <li class="active"><a class="text-decoration-none px-3 py-2 d-block" href="/job/create"><span
                                    class="la la-briefcase"></span> New Job</a></li>
                        <li class=""><a class="text-decoration-none px-3 py-2 d-block" href="/quotation"><span
                                    class="la la-th-list"></span> Quotations</a></li>
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
                                <li class="breadcrumb-item"><a href="/dashboard"><span class="la la-home"></span> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Job</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-12">
                        <div class="box">
                            <h4 class="block-title">New Job <span class="la la-plus-circle"></span></h4>
                            <div class="title-border"></div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/job" method="POST" class="col-md-9">
                            @csrf    
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="name" class="all_forms_label"><span class="la la-"></span>Job Name:</label>
                                        <input type="text" class="form-control all_forms" name="name" placeholder="Consultancy" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-select col-md-6">
                                        <label for="customer">Select Customer</label></br>
                                        <select id="customerSearch" class="form-control all_forms" name="customer_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id}}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price"><span class="la la-"></span>Price:</label>
                                        <input class="form-control all_forms" type="number" name="price" value="{{ old('price') }}">
                                    </div>
                                </div>
                                <button class="all_btn" type="submit">Save</button>
                            </form>
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