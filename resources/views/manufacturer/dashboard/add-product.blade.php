@extends('manufacturer.dashboard.layout')
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
  textarea{
      resize: none;
  }
</style>
@endsection
@section('dashboard-title')
    <div class="col-md-12">
        <div class="col-md-8">Add Product</div>
    </div>
@endsection
@section('main-content')
<form action="{{route('product.storeProduct')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <div class="card" style="box-shadow:none;margin-top:3rem;">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="name">Product Name<span>*<span></label>
                        <input type="text" required
                        value=""
                        class="form-control"
                        name="name" id="name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="size">Size<span>*<span></label>
                        <input type="text" required
                        value=""
                        class="form-control"
                        name="size" id="size">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="price">Price<span>*<span></label>
                        <input type="number" required
                        value=""
                        class="form-control"
                        name="price" id="price">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="quantity">Quantity<span>*<span></label>
                        <input type="text" required
                        value=""
                        class="form-control"
                        name="quantity" id="quantity">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="subcategory">Subcategory<span>*<span></label>
                        <select name="subcategory" id="subcategory" class="form-control">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="prescription">Prescription Required ? <span>*<span></label>
                        <select name="prescription" id="prescription" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="pic">Upload Image<span>*<span></label>
                        <input type="file" name="pic" id="pic" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="border-left:solid 1px #51328C;margin-top:2rem;">
        <div class="card" style="box-shadow:none;margin-top:3rem;">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="description">Description<span>*<span></label>
                        <textarea name="description" class="form-control" id="description" cols="20" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="benefits">Benefits<span>*<span></label>
                        <textarea name="benefits" class="form-control" id="benefits" cols="20" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="highlights">Highlights<span>*<span></label>
                        <textarea name="highlights" class="form-control" id="highlights" cols="20" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="how_to_use">How To Use<span>*<span></label>
                        <textarea name="how_to_use" class="form-control" id="how_to_use" cols="20" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn-success" style="margin-left: 15px; padding:.5rem 1rem; border-radius:5px">save</button>
    </div>
</form>
@endsection
