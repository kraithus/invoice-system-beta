<!doctype html>
<html lang="en">

<head>
    <title>iquote | Quotation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-uppercase font-weight-bold mt-5 mb-5">Quotation</h4>
            </div>
            <div class="col-md-12 mb-4">
                <ul class="qt_list">
                    <li><span class="font-weight-bold">Order Number :</span> 63633737</li>
                    <li><span class="font-weight-bold">Order Date :</span> 17 Sept 2022</li>
                </ul>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered" aria-describedby="">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">From:</th>
                            <th scope="col">To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <ul class="client_addy list-unstyled">
                                        <li><span class="la la-user"></span> Gabriel Munthali</li>
                                        <li><span class="la la-building"></span> MassPlug Magazine</li>
                                        <li><span class="la la-address-card"></span> P.O Box 000</li>
                                        <li><span class="la la-city"></span> Mzuzu</li>
                                        <li><span class="la la-phone"></span> 0993 996 717</li>
                                        <li><span class="la la-envelope"></span> gabmunthali@gmail.com</li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <ul class="client_addy list-unstyled">
                                        <li><span class="la la-user"></span> {{ $customerName }}</li>
                                        <li><span class="la la-building"></span> MassPlug Magazine</li>
                                        <li><span class="la la-address-card"></span> P.O Box 000</li>
                                        <li><span class="la la-city"></span> Mzuzu</li>
                                        <li><span class="la la-phone"></span> 0993 996 717</li>
                                        <li><span class="la la-envelope"></span> gabmunthali@gmail.com</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" aria-describedby="">
                    <tbody>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold table_h">Product name</h4>
                            </td>
                            <td>
                                <h4 class="table_h">Web application</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold table_h">Duration</h4>
                            </td>
                            <td>
                                <h4 class="table_h">3 weeks</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 mb-4">
                <ul class="qt_list float-right">
                    <li><span class="font-weight-bold">Subtotal :</span> k100, 00</li>
                    <li><span class="font-weight-bold">Total Amount :</span> 17 Sept 2022</li>
                </ul>
            </div>
        </div>
    </div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>