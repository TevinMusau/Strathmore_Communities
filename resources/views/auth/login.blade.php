@extends('layouts.app')

@section('content')

<head>
    <style>
        #Title{
            padding-top: 1%;
            margin-bottom: 30px; 
            font-weight:bold; 
            font-family: cursive;
        }
        #cardHead{
            text-align: center; 
            font-weight:bold; 
            font-size:18px; 
            background-color: #d5d5d5;
        }
    </style>
</head>

<div class="container">

    <h3 class="text-center" id="Title">
        Strathmore Communities 
    </h3>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card" style="margin-bottom: 100px;">
                <div class="card-header" id="cardHead">
                    Login
                </div>
                
                @include('inc.messages')
                {{-- <div style="background-image: url('/images/shattered.png');">@include('inc.messages')</div> --}}
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">                            
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2 text-center">
                                <button type="submit" class="btn btn-outline-success" style="width: 200px;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br><br>
                                
                                <p style="text-align: center"> New around here? <a href="{{ route('register') }}">Register</a> Here</p>
                                <br>
                                <p style="text-align: center"><a href="/admin/login" class="btn btn-link">Admin Side</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection