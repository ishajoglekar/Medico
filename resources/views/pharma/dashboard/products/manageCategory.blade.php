@extends('pharma.dashboard.layout')
@section('title','Practo | Pharma Dashboard')
@section('dashboard-title')
Products of Category : {{$products[0]->category->name}}
@endsection
@section('main-content')

<div class="card" style="margin-top:3%">
    <div class="card-body">
        <table class="table table-bordered adv-table" id="manage-categoryproduct-table">
            <thead>
                <th>#</th>   
                <th>Name</th> 
                <th>Size</th>
                <th>Description</th>
                <th>Subcategory</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                @if($product->status == "pending" || $product->status == "accepted")
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
                        <td>
                            @if($product->status == "pending" )
                                <a href="{{route('products.accept',$product->id)}}" class="btn btn-sm btn-primary">Accept</a>
                                <a href="{{route('products.reject',$product->id)}}" class="btn btn-sm btn-danger">Reject</a>
                            @elseif($product->status == "accepted")
                                <a href="{{route('products.remove',$product->id)}}" class="btn btn-sm btn-danger">Remove</a>
                            @endif
                            
                            
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
        $('#manage-categoryproduct-table').DataTable({
    
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