<!doctype html>
<html lang="en">

<head>
	<title>iquote | Register </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

    <div class="container">
        <div class="row position-relative d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="box">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('register') }}" method="POST">
                    @csrf    

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input id="name" type="text" class="form-control all_forms" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" type="email" class="form-control all_forms" name="email" :value="old('email')">
                    </div>

                    <!-- Password -->
                        <input type="hidden" name="password" value="IlHDyl$orH" class="form-control all_forms" required>

                    <!-- Confirm Password -->
                        <input id="password_confirmation" type="hidden" name="password_confirmation" value="IlHDyl$orH" class="form-control all_forms" required>

                    <button type="submit" class="all_btn">Register User</button>
                </form>
                </div>
            </div>
        </div>
    </div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>