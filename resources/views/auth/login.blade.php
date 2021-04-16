@extends('frontend.master')

@section('content')
   <!-- .breadcumb-area start -->
   <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Account</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Login</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p> Email Address *</p>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p>Password *</p>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row">
                            <div class="col-lg-6">
                                <input id="password" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="password" >Remember Me</label>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="#">Forget Your Password?</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-danger"><a href="{{ route('redirectToProvider') }}">Login With <i class="fa fa-github"></i></a></button>
                            </div>
                            <div class="col-lg-6 text-right">
                            <button class="btn btn-info"><a href="">Login With <i class="fa fa-google"></i></a></button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                        </button>
                        <div class="text-center">
                            <a href="{{ route('register') }}">Or Creat an Account</a>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->]
@endsection

    