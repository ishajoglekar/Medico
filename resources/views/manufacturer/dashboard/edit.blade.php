@extends('manufacturer.dashboard.layout')
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
  textarea{
      resize: none;
  }
</style>
@endsection
@section('dashboard-title')
    <div class="col-md-12">
        <div class="col-md-8">Edit profile</div>
    </div>
@endsection
@section('main-content')
    <div class="col-md-6">
        <div class="card" style="box-shadow:none;margin-top:3rem">
            <div class="card-body">
                <form action="{{route('manufacturer.update',$user)}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label for="company_name">Company Name<span>*<span></label>
                            <input type="text" required
                            value="{{$user->manufacturer->name}}"
                            class="form-control"
                            name="company_name" id="company_name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label for="description">Company Description<span>*<span></label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="9">{{$user->manufacturer->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn-success" style="margin-left: 15px; padding:.5rem 1rem; border-radius:5px">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
