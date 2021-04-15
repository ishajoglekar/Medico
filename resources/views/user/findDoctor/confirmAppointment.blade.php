@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/css/user/findDoctor/confirmAppointment.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 " id="appointment-details">
                <div class="bg-white details">
                    {{-- {{$slot->types[0]}} --}}
                    <h3 class="appointment-type"><i class="fa fa-hospital-o"></i> {{$type}} appointment</h3>
                    <div class="d-flex time justify-content-between">
                        <p class="m-0 d-inline-block"><i class="fa fa-calendar"></i>&nbsp;On <span class="date">{{date('y-m-d', strtotime($slot->start_time))}}</span></p>
                        <p class="m-0 d-inline-block"><i class="fa fa-clock-o"></i>&nbsp;At <span class="date">{{date('h:i a', strtotime($slot->start_time))}}</span></p>
                    </div>
                    <div class="">
                        <p class="change-date-time">Change Date Time</p>
                    </div>
                    <div class="doctor-detail" style="width: 50%">
                        <div class="d-flex">
                            @if($doctor->image != NULL)
                            <img data-qa-id="doctor-profile-image"
                            class="c-profile__image"
                            src="{{asset('storage/'.$doctor->image)}}"/>
                        @else
                            <img data-qa-id="doctor-profile-image"
                            class="c-profile__image"
                            src="{{auth()->user()::getAvatarAttribute($doctor->fullname,90)}} "/>
                        @endif                            <div class="doctor-info">
                                <p class="doctor-name m-0">{{$doctor->fullname}}</p>
                                <p class="doctor-degree m-0">{{$degree[0]->name}}</p>
                                <p class="doctor-specialization m-0">{{$speciality[0]->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="patient-info">
                <h3 class="patient-details">Patient Details</h3>
                <p class="info">This is {{$type}} appointment for:</p>

                <div class="checkbox">
                    <div class="form-check cb">
                        <input type="checkbox" checked class="form-check-input user roundedd" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">User</label>
                    </div>
                    <div class="form-check cb1">
                        <input type="checkbox"  class="form-check-input patient roundedd" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Someone Else</label>
                    </div>
                </div>
                    <div class="personal-info">
                        <form action="{{route('doctors.bookPersonalAppointment',[$doctor->id,$slot->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="type_id" value="{{$type == 'clinic' ? 3: 1}}">
                            <p class="mb-1 info">Please provide the following information about user:</p>
                            <div class="form-group m-1">
                                <label for="inputAddress">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your Name" value="{{auth()->user()->name}}">
                                @error('name')
                                    <p class="text-danger font-weight-light">{{$errors->first('name')}}</p>
                                @enderror
                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Phone No</label>
                                <input type="tel" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone no."  value="{{auth()->user()->phone_no}}">
                                @error('phone')
                                    <p class="text-danger font-weight-light">{{$errors->first('phone')}}</p>
                                @enderror

                            </div>


                            <div class="form-group m-1">
                                <label for="inputAddress">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email (optional)" value="{{auth()->user()->email}}">
                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Reason for appointment</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="reason" name="reason" placeholder="Enter your reason">
                                @error('reason')
                                    <p class="text-danger font-weight-light">{{$errors->first('reason')}}</p>
                                @enderror
                            </div>
                            <div class="">
                                <button type="submit" class="btn-confirm text-center">Confirm</button>
                            </div>
                            <p class="tnc">By Booking this appointment you agree to Medico's Terms and condition</p>
                        </form>

                    </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $(".user").click(function(){
            $(".patient").prop("checked",false);

            $(".personal-info").html(`
            <form action="{{route('doctors.bookPersonalAppointment',[$doctor->id,$slot->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="type_id" value="{{$type == "clinic" ? 3: 1}}">

                            <p class="mb-1 info">Please provide the following information about user:</p>
                            <div class="form-group m-1">
                                <label for="inputAddress">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your Name">
                                @error('name')
                                    <p class="text-danger font-weight-light">{{$errors->first('name')}}</p>
                                @enderror
                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Phone No</label>
                                <input type="tel" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone no." value="8850554504">
                                @error('phone')
                                    <p class="text-danger font-weight-light">{{$errors->first('phone')}}</p>
                                @enderror

                            </div>

                            <div class="form-group m-1">
                                <label for="inputAddress">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email (optional)">
                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Reason for appointment</label>
                                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" placeholder="Enter your reason">
                                @error('reason')
                                    <p class="text-danger font-weight-light">{{$errors->first('reason')}}</p>
                                @enderror
                            </div>

                            <div class="">
                                <button type="submit" class="btn-confirm text-center">Confirm</button>
                            </div>
                            <p class="tnc">By Booking this appointment you agree to Medico's Terms and condition</p>
                        </form>
                        `
        );
    });


        $(".patient").click(function(){
            $(".user").prop("checked",false);
            $(".personal-info").html(`
            <form action="{{route('doctors.bookOthersAppointment',[$doctor->id,$slot->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="type_id" value="{{$type == "clinic" ? 3: 1}}">

                            <p class="mb-1 info">Please provide the following information about user:</p>
                            <div class="form-group m-1">
                                <label for="inputAddress">Patient's Name</label>
                                <input type="text" class="form-control  @error('patient_name') is-invalid @enderror" id="patient_name" name="patient_name" placeholder="Enter patients Name">
                                @error('patient_name')
                                    <p class="text-danger font-weight-light">{{$errors->first('patient_name')}}</p>
                                @enderror

                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Phone No</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone no." value="8850554504">
                                @error('phone')
                                    <p class="text-danger font-weight-light">{{$errors->first('phone')}}</p>
                                @enderror

                            </div>

                            <div class="form-group m-1">
                                <label for="inputAddress">Patient's Phone No</label>
                                <input type="phone" class="form-control @error('patient_no') is-invalid @enderror" id="patient_no" name="patient_no" placeholder="Enter your patient's phone no." value="">
                                @error('patient_no')
                                    <p class="text-danger font-weight-light">{{$errors->first('patient_no')}}</p>
                                @enderror

                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email (optional)">
                            </div>
                            <div class="form-group m-1">
                                <label for="inputAddress">Reason for appointment</label>
                                <input type="text" class="form-control @error('patient_reason') is-invalid @enderror" id="patient_reason" name="patient_reason" placeholder="Enter your reason">
                                @error('patient_reason')
                                    <p class="text-danger font-weight-light">{{$errors->first('patient_reason')}}</p>
                                @enderror
                            </div>

                            <div class="">
                                <button type="submit" class="btn-confirm text-center">Confirm</button>
                            </div>
                            <p class="tnc">By Booking this appointment you agree to Medico's Terms and condition</p>
                        </form>
                        `
                    );
        });

    </script>
@endsection
