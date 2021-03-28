@extends('doctor.dashboard.layout')
@section('title','Practo | Doctor Dashboard')
@section('dashboard-title','Medical Registration')
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
    <form action="{{route('doctor.education')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" >
                        <div class="form-group col-md-12">
                            <label for="reg_no">Registration Number<span>*<span></label>
                            <input type="number" required
                            value="{{ ($doctor!=NULL) ? $doctor->reg_no : old('reg_no',session('reg_no'))}}"
                            class="form-control"
                            name="reg_no" id="reg_no">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="regcouncil_id">Registration Council<span>*<span></label>
                            <select name="regcouncil_id" id="regcouncil_id" class="form-control" select>
                                @foreach($regcouncils as $regcouncil)
                                <option value="{{$regcouncil->id}}"
                                    {{($doctor!=NULL) ? ($doctor->regcouncil_id  == $regcouncil->id ? 'selected' : ( old('regcouncil_id',session('regcouncil_id')) == $regcouncil->id ? 'selected' : '')):''}}>
                                    {{$regcouncil->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <a href="{{route('doctor.basic-details')}} " class="btn btn-warning pull-left">Back</a>
                            <div class="clear-fix"></div>
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
