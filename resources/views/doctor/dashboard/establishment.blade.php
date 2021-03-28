@extends('doctor.dashboard.layout')
@section('title','Practo | Doctor Dashboard')
@section('dashboard-title','Establishment Details')
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
    <form action="{{route('doctor.completed')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" >
                        <div class="form-group col-md-12">
                            <label for="establishment_name">Establishment Name<span>*<span></label>
                            <input type="text" required
                            value="{{($doctor!=NULL) ? $doctor->establishment_name : old('establishment_name',session('establishment_name')) }}"
                            class="form-control"
                            name="establishment_name" id="establishment_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="establishment_city_id">City<span>*<span></label>
                            <select name="establishment_city_id" id="establishment_city_id" class="form-control" select>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" {{($doctor!=NULL) ? ($doctor->establishment_city_id  == $city->id ? 'selected' : ( old('establishment_city_id',session('establishment_city_id')) == $city->id ? 'selected' : '')):''}}>
                                    {{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="establishment_pincode">PinCode<span>*<span></label>
                            <input type="number" required
                            value="{{($doctor!=NULL)  ? $doctor->establishment_pincode : old('establishment_pincode',session('establishment_pincode'))}}"
                            class="form-control"
                            name="establishment_pincode" id="establishment_pincode">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="establishment_address">Establishment Address<span>*<span></label>
                            <textarea class="form-control"
                                    name="establishment_address" id="establishment_address" rows="4">{{($doctor!=NULL) ? $doctor->establishment_address : old('establishment_address',session('establishment_address'))}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
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
