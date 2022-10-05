<!doctype html>
<html lang="en">

<head>
	<title>Change Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Scripts -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/la/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
	<!---MAIN NAV--->
	<x-technician.nav />
	<!---MAIN NAV--->    

    <div class="container">
        <div class="row position-relative d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="box">
                    <x-session-message />
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('update-password') }}" method="POST">
                    @method('PATCH')    
                    @csrf    
                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="">Currrent Password:</label>
                            <input type="password" name="current_password" class="form-control all_forms" required>
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label for="">New Password:</label>
                            <input type="password" name="new_password" class="form-control all_forms" required>
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label for="">Confirm New Password:</label>
                            <input type="password" name="new_password_confirmation" class="form-control all_forms" required>
                        </div>

                        <button type="submit" class="all_btn">Change</button>

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