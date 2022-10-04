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

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('User successfully registered, a verification email has been sent.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="form-group">
                        {{ __('A new verification link has been sent to the users email address you provided during the users registration.') }}
                    </div>
                @endif

                <div class="form-group">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button type="submit" class="all_btn">Resend Verification Email</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="all_btn">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    <a href="/">Back to home</a>
            </div>
            </div>
        </div>
    </div>            

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>