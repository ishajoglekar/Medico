@extends('pharma.dashboard.layout')
@section('title','Practo | Pharma Dashboard')
@section('dashboard-title','Edit Category')
@section('main-content')
    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" >
                        <div class="form-group col-md-12">
                            <label for="name">Category Name</label>
                            <input type="text" required
                            value="{{$category->name,old('name')}}"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" id="name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        
                        <div class="form-group col-md-6">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit"
                                class="btn btn-warning pull-right" value="Update Category">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
