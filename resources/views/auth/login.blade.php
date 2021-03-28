@extends('layouts.app')
@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/doctor/register.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

@endsection


@section('content')
<div class="container mt-5">
        <div class="register-div">
            <div class="row border-bottom">
                <div class="col-md-12 d-flex justify-content-center">
                    <h4 class="register-label text-primary font-weight-normal">Login</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 illustration  d-flex justify-content-center" style="margin-top:-8%;">
                    <img src="{{asset('assets/images/doctors/registration/1.jpg')}}" alt="">
                </div>

                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <div class="d-flex justify-content-between">
            
                                    @if (Route::has('password.request'))
                                        
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                        <a class="btn btn-outline-primary" href="{{ route('register') }}">
                                                Sign up
                                        </a>
                                </div>
                            </div>
                        </div>


                        
                    </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
