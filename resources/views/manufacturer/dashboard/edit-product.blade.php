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
  #image{
      position: relative;
      height: 15rem;
      width: 20rem;
  }
  #image input{
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      height: 100%;
      opacity: 0;
      z-index: 9999;
      cursor: pointer;
  }
  #image img{
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: 888;
  }
</style>
@endsection
@section('dashboard-title')
    <div class="col-md-12">
        <div class="col-md-8">Add Product</div>
    </div>
@endsection
@section('main-content')
<form action="{{route('product.updateProduct',$product)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <div class="card" style="box-shadow:none;margin-top:3rem;">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="name">Name<span>*<span></label>
                        <input type="text" required
                        value="{{$product->name}}"
                        class="form-control"
                        name="name" id="name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="size">Size<span>*<span></label>
                        <input type="text" required
                        value="{{$product->size}}"
                        class="form-control"
                        name="size" id="size">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="price">Price<span>*<span></label>
                        <input type="number" required
                        value="{{$product->price}}"
                        class="form-control"
                        name="price" id="price">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="quantity">Quantity<span>*<span></label>
                        <input type="text" required
                        value="{{$product->quantity}}"
                        class="form-control"
                        name="quantity" id="quantity">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="subcategory">Subcategory<span>*<span></label>
                        <select name="subcategory" id="subcategory" class="form-control">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}" {{$product->subcategory_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="prescription">Prescription Required ? <span>*<span></label>
                        <select name="prescription" id="prescription" class="form-control">
                            <option value="1" {{$product->prescription_required == 1 ? 'selected' : ''}}>Yes</option>
                            <option value="0" {{$product->prescription_required == 0 ? 'selected' : ''}}>No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="pic">Upload Image<span>*<span></label>
                        <div id="image">
                            <input type="file" name="pic" id="pic" class="form-control">
                            <img src="{{asset('storage/'.$product->image)}}" alt="">
                        </div>
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
                        <textarea name="description" class="form-control" id="description" cols="20" rows="5" required>{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="benefits">Benefits<span>*<span></label>
                        <textarea name="benefits" class="form-control" id="benefits" cols="20" rows="5" required>{{$product->benefits}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="highlights">Highlights<span>*<span></label>
                        <textarea name="highlights" class="form-control" id="highlights" cols="20" rows="5" required>{{$product->highlights}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label for="how_to_use">How To Use<span>*<span></label>
                        <textarea name="how_to_use" class="form-control" id="how_to_use" cols="20" rows="5" required>{{$product->how_to_use}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn-success" style="margin-left: 15px; padding:.5rem 2rem; border-radius:5px margin-top:4rem;margin-bottom:2rem;">save</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
    <script>
        $("#image").change(function(event){
            alert("hello");
            if($("#pic").val() != ""){
                console.log(event.target.files[0]);
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $("img").attr("src",tmppath);
            }
        });
    </script>
@endsection
