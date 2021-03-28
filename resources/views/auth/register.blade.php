@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/doctor/register.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endsection


@section('content')
<div class="container mt-5">
        <div class="register-div">
            <div class="row border-bottom">
                <div class="col-md-12 d-flex justify-content-center">
                    <h4 class="register-label text-primary font-weight-normal">Register</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 illustration  d-flex justify-content-center">
                    <img src="{{asset('assets/images/doctors/registration/1.jpg')}}" alt="">
                </div>

                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-around bg-white mt-2 mt-2">
                        @if(!(session()->get('role') == 'user'))
                            <p>Join 125,000+ doctors</p>
                            <a href="{{route('home.registerUser')}}">Not a Doctor?</a>
                        @else
                             <p>Join 5M+ users</p>
                             <a href="{{route('home.registerDoctor')}}">Not a User?</a>
                        @endif
                        </div>
                        <div class="card-body">
                            <form action="{{route('sendotpForuser')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',session('name')) }}" autocomplete="name" autofocus placeholder="Enter Your Name">

                                        @error('name')
                                            <p class="text-danger font-weight-light">{{$errors->first('name')}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-12 col-form-label">Phone Number</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="phone" value="{{old('phone',session('phone'))}}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your Phone Number">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @error('phone_no')
                                        <p class="text-danger font-weight-light">{{$errors->first('phone_no')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group row d-flex justify-content-between m-2">
                                    <button class="btn btn-primary" type="submit">Get OTP</button>
                                    <a href ="{{ url('/resendotp') }}" class="btn btn-secondary {{ session('phone') ? ' ' :'disabled' }}" type="submit">Resend OTP</a>
                                </div>
                            </form>

                            <form action="{{route('verifyotp')}}" method="POST">
                                @csrf
                                <label for="phone" class="col-form-label">OTP</label>
                                <input type="number" class="form-control" name="otp" placeholder="Enter OTP">
                                <input type="submit" class="btn btn-success mt-3" value="Submit for Verification">
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
