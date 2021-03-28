@extends('user.dashboard.layout')
@section('title','Practo | User')
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
@section('dashboard-title'.'My profile')
@section('main-content')
    <form action="{{route('user.updateData')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" style="border-right:solid 1px #51328C">
                        <div class="form-group col-md-6">
                            <label for="name">Name<span>*<span></label>
                            <input type="text"
                            value="{{$user->name}}"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" id="name">
                            @error('name')
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="age">Age<span>*<span></label>
                            <input type="number"
                            value="{{$user->age}}"
                            class="form-control @error('age') is-invalid @enderror"
                            name="age" id="age">
                            @error('age')
                                <span class="text-danger">{{$errors->first('age')}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email<span>*<span></label>
                            <input type="email"
                            value="{{$user->email}}"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" id="email">
                            @error('email')
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="password">Password<span>*<span></label>
                            <input type="password"
                            class="form-control @error('password') is-invalid @enderror" value=""
                            name="password" id="password">
                            @error('password')
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_no">Phone Number<span>*<span></label>
                            <input type="number"
                            value="{{$user->phone_no}}"
                            class="form-control @error('phone_no') is-invalid @enderror"
                            name="phone_no" id="phone_no">
                            @error('phone_no')
                                <span class="text-danger">{{$errors->first('phone_no')}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender<span>*<span></label>
                            <select name="gender" id="gender" class="form-control">
                                <option class="form-control" value="male" {{($user->gender==null) ? '' : (($user->gender=='male') ? 'selected' : '')}}>Male</option>
                                <option class="form-control" value="female" {{($user->gender==null) ? '' : (($user->gender=='female') ? 'selected' : '')}}>Female</option>
                                <option class="form-control" value="other" {{($user->gender==null) ? '' : (($user->gender=='other') ? 'selected' : '')}}>Other</option>
                            </select>
                            @error('password')
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
