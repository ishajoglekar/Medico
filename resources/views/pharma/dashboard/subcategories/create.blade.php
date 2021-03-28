@extends('pharma.dashboard.layout')
@section('title','Practo | Pharma Dashboard')
@section('dashboard-title','Add Subcategory')
@section('main-content')
    <form action="{{route('subcategories.store')}}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" >
                        <div class="form-group col-md-12">
                            <label for="name">Subcategory Name</label>
                            <input type="text" required
                            value="{{old('name')}}"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" id="name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" select>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                {{  old('category_id') == $category->id ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-12">  
                        </div>
                        <div class="form-group col-md-6">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit"
                                class="btn btn-warning pull-right" value="Add Subcategory">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
