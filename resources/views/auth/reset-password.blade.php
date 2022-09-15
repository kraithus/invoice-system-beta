<!doctype html>
<html lang="en">

<head>
	<title>iquote | Login </title>
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
                    <form action="{{ route('password.update') }}" method="POST">
                    @csrf    

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" :value="__('Email')">Email:</label>
                        <input type="email" class="form-control all_forms" name="email" id="email" :value="old('email', $request->email)" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" :value="__('Password')">New Password</label>
                        <input type="password" id="password" name="password" class="form-control all_forms" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control all_forms" required>
                    </div>

                    <button type="submit" class="all_btn">Reset Password</button>
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