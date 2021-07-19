@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="text-center" style="margin-top: 100px; margin-bottom: 30px; font-weight:bold; font-family: cursive">
        Strathmore Communities 
    </h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-bottom: 100px;">
                <div class="card-header" 
                        style="text-align: center; font-weight:bold; font-size:18px; background-color: #d5d5d5">
                    {{ __('Reset Password') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
