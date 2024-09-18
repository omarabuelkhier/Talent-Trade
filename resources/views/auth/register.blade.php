{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
    <!doctype html>
<html lang="en">
<head>
    <title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset("/loginAssets/css/style.css")}}">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url(loginAssets/images/login.png);height: 300px"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Register</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="{{route('auth.github')}}" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-github"></span></a>
                                </p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3">
                                <input id="email" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  >
                                <label class="form-control-placeholder" for="Email">Username</label>
                            </div>
                            @error('name')
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col alert alert-danger mt-2 ms-5">{{ $message }}</div>
                                <div class="col-1"></div>
                            </div>
                            @enderror

                            <div class="form-group mt-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  >
                                <label class="form-control-placeholder" for="Email">Email</label>
                            </div>
                            @error('email')
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col alert alert-danger mt-2 ms-5">{{ $message }}</div>
                                <div class="col-1"></div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <input id="password" type="password" class="form-control " name="password"  >
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @error('password')
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col alert alert-danger mt-2 ms-5">{{ $message }}</div>
                                <div class="col-1"></div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
                                <label class="form-control-placeholder" for="password_confirmation">Confirm Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @error('password_confirmation')
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col alert alert-danger mt-2 ms-5">{{ $message }}</div>
                                <div class="col-1"></div>
                            </div>
                            @enderror
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image">
                                <label class="input-group-text"  for="inputGroupFile02">Image</label>
                            </div>
                            @error('image')
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col alert alert-danger mt-2 ms-5">{{ $message }}</div>
                                <div class="col-1"></div>
                            </div>
                            @enderror

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">Are You a member? <a  href="{{ __('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{URL::asset("/loginAssets/js/jquery.min.js")}}"></script>
<script src="{{URL::asset("/loginAssets/js/popper.js")}}"></script>
<script src="{{URL::asset("/loginAssets/js/bootstrap.min.js")}}"></script>
<script src="{{URL::asset("/loginAssets/js/main.js")}}"></script>

</body>
</html>
