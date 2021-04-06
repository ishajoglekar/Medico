@extends('user.dashboard.layout')
@section('title','Medico | User')
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
@section('dashboard-title')
    <div class="col-md-12">
        <div class="col-md-10">My profile</div>
        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit / Add Data</a>
    </div>
@endsection
@section('main-content')
    <div class="col-md-12">
        <div class="card" style="box-shadow:none;margin-top:3rem">
            <div class="card-body">
                <div class="col-md-6" style="border-right:solid 1px #51328C">
                    <div class="form-group col-md-12">
                        <label for="fullname">Full Name<span>*<span></label>
                        <input type="text" required
                        value="{{$user->name}}"
                        class="form-control" disabled
                        name="fullname" id="fullname" disabled>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email<span>*<span></label>
                        <input type="email" required
                        value="{{$user->email}}"
                        class="form-control"
                        name="email" id="email" disabled>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Password<span>*<span></label>
                        <input type="password" required
                        class="form-control" value="{{ $user->password }}"
                        name="password" id="password" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone_no">Phone Number<span>*<span></label>
                        <input type="number" disabled
                        value="{{$user->phone_no}}"
                        class="form-control"
                        name="phone_no" id="phone_no" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Gender<span>*<span></label>
                        <input type="text" class="form-control" id="gender" name="gender" value="{{$user->gender == null ? '':$user->gender}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
