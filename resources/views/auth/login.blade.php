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
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('login') }}" method="POST">
                    @csrf    

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control all_forms" name="email" id="" placeholder="exapmpleemail@gmail.com">
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" name="password" class="form-control all_forms" required autocomplete="current-password">
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <button type="submit" class="all_btn">Login</button>

                        <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        </div>
                    </form>
                    <h4 class="form_title">Dont have an account? <a href="/register">Sign Up</a></h4>
                </div>
            </div>
        </div>
    </div>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>