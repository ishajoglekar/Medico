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
                        @auth
                            @if (auth()->user()->role == "user")
                                <div class="card-body">
                                    @if ($user->role == "temp_manufacturer")
                                        <div class="text-align">Your request is under process</div>
                                        <a href="/" class="btn btn-primary mt-3">Home</a>
                                    @else
                                        <form action="{{route('manufacturer.storeManufacturer')}}" method="POST">
                                            @csrf
                                            <div class="col-md-6 ml-0 pl-0">
                                                <label for="company_name" class="col-form-label">Company Name*</label>
                                                <input id="company_name" type="text" class="ml-0 pl-0 col-md-12 form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name" autofocus placeholder="Enter Your Company Name">
                                                @error('company_name')
                                                    <span class="text-danger">Name is required</span>
                                                @enderror
                                            </div>
                                            <input type="submit" class="btn btn-success mt-3" value="submit">
                                        </form>
                                    @endif
                                </div>
                            @else
                                <div style="padding: 1rem">
                                    <div class="text-align">You cannot register</div>
                                    <a href="/" class="btn btn-primary mt-3" style="width: 5rem">Home</a>
                                </div>
                            @endif
                        @endauth
                        @guest
                            <div class="card-body">
                                <form action="{{route('register.sendotp')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="ml-0 pl-0 col-md-6">
                                                <label for="name" class="ml-0 pl-0 col-md-12 col-form-label">{{ __('Name') }}*</label>
                                                <input id="name" type="text" class="ml-0 pl-0 col-md-12 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',session('name')) }}" placeholder="Enter Your Name">
                                                @error('name')
                                                    <span class="text-danger">Name is required</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 ml-0 pl-0">
                                                <label for="email" class="col-form-label">Email*</label>
                                                <input id="email" type="email" class="ml-0 pl-0 col-md-12 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',session('email')) }}" autocomplete="email" autofocus placeholder="Enter Your Email">
                                                @error('email')
                                                    <span class="text-danger">Email is required</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 ml-0 pl-0">
                                                <label for="gender" class="col-form-label">Gender*</label>
                                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">--SELECT--</option>
                                                    <option value="male" {{(session()->has('gender') ? (session()->get('gender')=='male' ? 'selected' : '') : '')}}>Male</option>
                                                    <option value="female" {{(session()->has('gender') ? (session()->get('gender')=='female' ? 'selected' : '') : '')}}>Female</option>
                                                    <option value="other" {{(session()->has('gender') ? (session()->get('gender')=='other' ? 'selected' : '') : '')}}>Other</option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">Gender is required</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 ml-0 pl-0">
                                                <label for="age" class="col-form-label">Age*</label>

                                                <div class="">
                                                    <input id="age" type="number" value="{{old('age',session('age'))}}" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Enter your Age">
                                                </div>
                                                @error('age')
                                                    <span class="text-danger">Age required</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 ml-0 pl-0">
                                                <label for="company_name" class="col-form-label">Company Name*</label>
                                                <input id="company_name" type="text" class="ml-0 pl-0 col-md-12 form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name',session('company_name')) }}" autocomplete="company_name" autofocus placeholder="Enter Your Company Name">
                                                @error('company_name')
                                                    <span class="text-danger">{{$errors->first('company_name')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-12 col-form-label">Phone Number*</label>
                                        <div class="col-md-12">
                                            <input id="phone_no" type="phone_no" value="{{old('phone',session('phone'))}}" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" placeholder="Enter your Phone Number">
                                            @error('phone_no')
                                                <span class="text-danger">{{$errors->first('phone_no')}}</span>
                                            @enderror
                                        </div>
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
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
