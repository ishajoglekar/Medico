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
  table{
      margin: .5rem 2rem;
      width: 97% !important;
  }
  .btn{
      border-radius: 5px !important;
  }
  tr:nth-child(even){
    background-color: #eeeeee;
  }
</style>
@endsection
@section('dashboard-title'.'My profile')
@section('main-content')
    <div class="card" style="margin-top:3%">
        <div class="card-body">
            <table class="table table-bordered adv-table" id="manage-product-table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Description</th>
                    <th>Subcategory</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($products as $product)
                    @if($product->status == "accepted")
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td style="max-width:110px;">
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->size}}
                            </td>
                            <td style="max-width:160px;">
                                {{$product->description}}
                            </td>
                            <td>
                                @if($product->subcategory->name != NULL)
                                    {{$product->subcategory->name}}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="max-width: 20rem;">
                                <a href="{{route('product.editProduct',$product->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('product.deleteProduct',$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('page-level-scripts')
     <script>
         $(document).ready(function() {
        $('#manage-product-table').DataTable({

            "columnDefs": [
                        {
                            'orderable': false,
                            'targets': [-1]
                        }
                    ]
                });
        } );
     </script>

@endsection
