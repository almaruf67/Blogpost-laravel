@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="css/login.css">
@endsection
@section('content')
<div class="container bod">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Register</h3>
                </div>
                <div class="panel-body p-3">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="fas fa-user p-2"></span>
                                <input id="name" type="text" placeholder="Full Name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group py-2">

                            <div class="input-field">
                                <span class="fas fa-image p-2"></span>
                                <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <div class="form-group py-2">
                            <div class="input-field">
                                <span class="fas fa-envelope p-2"></span>
                                <input id="email" type="text" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 

                            </div>
                        </div>
                        
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="fas fa-phone p-2"></span>
                                <input placeholder="Enter your Number"  id="phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                               
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="fas fa-lock p-2"></span>
                                <input placeholder="Enter your Password"  id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="fas fa-lock p-2"></span>
                                <input placeholder="Enter your Password" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center pt-4 text-muted">Already have an account? <a href=" {{ route('login') }}">Login</a>
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
                        @php $provider='github' @endphp
                        <a href="{{ '/auth'.'/'.$provider.'/redirect' }}" target="_blank" class="px-2">
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
