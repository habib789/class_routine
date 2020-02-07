<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="LoginForm">
    <div class="container">
        <h1 class="form-heading">login Form</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    @if(session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <h2>Login</h2>
                    <p>Please enter your mobile, email and password</p>
                </div>
                <form id="Login" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="phone_no" value="{{ old('phone_no') }}" class="form-control @error('phone_no') is-invalid @enderror"  placeholder="Mobile no">
                        @error('phone_no')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" name="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" name="password"  value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror"" id="inputPassword" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                    <div class="forgot text-right">
                        <p>Not register yet? <a href="{{ route('register') }}">Sign up</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>
