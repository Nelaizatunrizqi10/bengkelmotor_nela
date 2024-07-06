<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Login</title>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('Template/img/favicon.jpg') }}">

<link rel="stylesheet" href="{{ asset('Template/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
</head>
<body class="account-page">

<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="{{ asset('Template/img/logologin.jpg') }}" alt="img">
                    </div>
                    <div class="login-userheading">
                        <h3>Sign In</h3>
                        <h4>Please login to your account</h4>
                    </div>
                    <div class="form-login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label>Email</label>
                            <div class="form-addons">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email address">
                                <img src="{{ asset('Template/img/icons/mail.svg') }}" alt="img">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Password</label>
                            <div class="pass-group">
                                <input id="password" type="password" class="pass-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-login">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center" style="flex: 1;">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width: 20px; height: 20px;">
                                        <label class="form-check-label" for="remember" style="margin-left: 5px;">
                                            {{ __('Ingat Saya') }}
                                        </label>
                                    </div>
                                    <div>
                                        <h7><a href="{{ route('password.request') }}" class="hover-a">Forgot Password?</a></h7>
                                    </div>
                                </div>
                            </div>


                            <div class="form-login">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="signinform text-center">
                        <h4>Don’t have an account? <a href="{{ route('register') }}" class="hover-a">Sign Up</a></h4>
                    </div>
                    <div class="form-setlogin">
                        <h4>Or sign up with</h4>
                    </div>
                    <div class="form-sociallink">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('Template/img/icons/google.png') }}" class="me-2" alt="google">
                                    Sign Up using Google
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('Template/img/icons/facebook.png') }}" class="me-2" alt="google">
                                    Sign Up using Facebook
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="login-img">
                <img src="{{ asset('Template/img/login.png') }}" alt="img">
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('Template/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('Template/js/feather.min.js') }}"></script>
<script src="{{ asset('Template/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Template/js/script.js') }}"></script>
</body>
</html>
