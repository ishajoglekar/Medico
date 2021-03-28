@extends('doctor.dashboard.layout')
@section('title','Practo | Doctor Dashboard')
@section('dashboard-title','Education Qualification')
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
.back{
    transform:translateY(-70px);
}
</style>
@endsection
@section('main-content')
    <form action="{{route('doctor.establishment')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" >
                    <div class="form-group col-md-12">
                            <label for="degree_id">Degree<span>*<span></label>
                            <select name="degree_id" id="degree_id" class="form-control" select>
                                @foreach($degrees as $degree)
                                <option value="{{$degree->id}}" {{($doctor!=NULL) ? ($doctor->degree_id  == $degree->id ? 'selected' : ( old('degree_id',session('degree_id')) == $degree->id ? 'selected' : '')):''}}>
                                    {{$degree->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="college_id">College/Institute<span>*<span></label>
                            <select name="college_id" id="college_id" class="form-control" select>
                                @foreach($colleges as $college)
                                <option value="{{$college->id}}"
                                {{($doctor!=NULL) ? ($doctor->college_id  == $college->id ? 'selected' : ( old('college_id',session('college_id')) == $college->id ? 'selected' : '')):''}}>
                                    {{$college->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="years_of_exp">Years of Experience<span>*<span></label>
                            <input type="number" required
                            class="form-control" value="{{($doctor!=NULL) ? $doctor->years_of_exp : old('years_of_exp',session('years_of_exp')) }}"
                            name="years_of_exp" id="years_of_exp">
                        </div>
                        <div class="col-md-12 form-group"></div>
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
