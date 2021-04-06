@extends('doctor.dashboard.layout')
@section('title','Medico | Doctor Dashboard')
@section('dashboard-title','Hello Doctor! Lets build your dedicated profile.')
@section('page-level-styles')
<style>
.card span{
 color:red;
 font-size:17px;
}
.btn{
    margin-top:1rem;
    padding:10px 45px;
    border-radius:0;
  }
</style>
@endsection
@section('main-content')
    <form action="{{route('doctor.medical-details')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" style="border-right:solid 1px #51328C">
                        <div class="form-group col-md-12">
                            <label for="fullname">Full Name<span>*<span></label>
                            <input type="text" required
                            value="{{ ($doctor!=NULL) ? $doctor->fullname : old('name',session('name'))}}"
                            class="form-control" disabled
                            name="fullname" id="fullname">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email<span>*<span></label>
                            <input type="email" required
                            value="{{ ($doctor!=NULL)  ? $doctor->email : old('name',session('email'))}}"
                            class="form-control"
                            name="email" id="email">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="password">Password<span>*<span></label>
                            <input type="password" required {{ (auth()->user()->doctor_id != NULL) ? 'disabled' : '' }}
                            class="form-control" value="{{($doctor!=NULL)  ? $doctor->password : old('password',session('password'))}}"
                            name="password" id="password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country_code">Country Code<span>*<span></label>
                            <input type="number" required
                            value="{{($doctor!=NULL)  ? $doctor->country_code : old('country_code',session('country_code'))}}"
                            class="form-control"
                            name="country_code" id="country_code">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_no">Phone Number<span>*<span></label>
                            <input type="number" disabled
                            value="{{($doctor!=NULL) ? $doctor->phone_no : old('phone',session('phone'))}}"
                            class="form-control"
                            name="phone_no" id="phone_no">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fees">Fees/hr<span>*<span></label>
                            <input type="number" required
                            class="form-control" value="{{($doctor!=NULL)  ? $doctor->fees : old('fees',session('fees'))}}"
                            name="fees" id="fees">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="slot_duration">Slot Duration In Mins<span>*<span></label>
                            <input type="number" required
                            class="form-control" value="{{($doctor!=NULL)  ? $doctor->slot_duration : old('slot_duration',session('slot_duration'))}}"
                            name="slot_duration" id="slot_duration">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender<span>*<span></label>
                            <select name="gender" id="gender" class="form-control" select>
                                <option value="male" {{($doctor!=NULL) ? ($doctor->gender  == "male" ? 'selected' : (old('gender',session('gender')) == "male" ? 'selected' : '')) : ''}} >Male</option>
                                <option value="female"{{($doctor!=NULL) ? ($doctor->gender  == "female" ? 'selected' : (old('gender',session('gender')) == "female" ? 'selected' : '')):''}}>Female</option>
                                <option value="other" {{($doctor!=NULL) ? ($doctor->gender  == "other" ? 'selected' : (old('gender',session('gender')) == "other" ? 'selected' : '')):''}}>Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city_id">City<span>*<span></label>
                            <select name="city_id" id="city_id" class="form-control" select>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}"
                                    {{($doctor!=NULL) ? ($doctor->city_id  == $city->id ? 'selected' : ( old('city_id',session('city_id')) == $city->id ? 'selected' : '')):''}}>{{$city->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div class="form-group col-md-12">
                            <label for="speciality_id">Speciality<span>*<span></label>
                            <select name="speciality_id" id="speciality_id" class="form-control" select>
                                @foreach($specialities as $speciality)
                                <option value="{{$speciality->id}}"
                                    {{($doctor!=NULL) ? ($doctor->speciality_id  == $speciality->id ? 'selected' :  (old('speciality_id',session('speciality_id')) == $speciality->id ? 'selected' : '')):''}}>{{$speciality->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control"
                                    name="description" id="description" rows="4">{{($doctor!=NULL) ? $doctor->description : old('description',session('description'))}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">Address<span>*<span></label>
                            <textarea class="form-control"
                                    name="address" id="address" rows="4">{{($doctor!=NULL) ? $doctor->address : old('address',session('address'))}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="image">Profile Image</label>
                            <input type="file"
                                    value=""
                                    class="form-control"
                                    name="image" id="image">
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit"
                                    class="btn btn-warning pull-right" value="Continue">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
