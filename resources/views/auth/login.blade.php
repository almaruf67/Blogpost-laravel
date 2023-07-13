@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="css/login.css">
@endsection
@section('content')
{{-- <div class="container bod">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <a href="/auth/google/redirect">
                    <div class="google-btn">
                        <div class="google-icon-wrapper">
                          <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                        </div>
                        <p class="btn-text"><b>Sign in with google</b></p>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container bod">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Login</h3>
                </div>
                <div class="panel-body p-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                       <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input id="email" type="text" placeholder="Username or Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 

                            </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                <span class="fas fa-lock px-2"></span>
                                <input placeholder="Enter your Password"  id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button class="btn bg-white text-muted">
                                    <span class="far fa-eye-slash"></span>
                                </button>
                            </div>
                        </div>
                        <div class="form-inline">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" class="text-muted">Remember me</label>
                            @if (Route::has('password.request'))
                            <a class="font-weight-bold d-flex justify-content-end" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                            {{-- <a href="#" id="forgot" class="font-weight-bold">Forgot password?</a> --}}
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            {{ __('Login') }}
                        </button>
                        <div class="text-center pt-4 text-muted">Don't have an account? <a href="#">Sign up</a>
                        </div>
                    </form>
                </div>
                <div class="mx-3 my-2 py-2 bordert">
                    <div class="text-center py-3">
                        <a href="#" target="_blank" class="px-2">
                            <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt="">
                        </a>
                        <a href="/auth/google/redirect" target="_blank" class="px-2">
                            <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png"
                                alt="">
                        </a>

                        <a href="/auth/github/redirect" target="_blank" class="px-2">
                            <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
