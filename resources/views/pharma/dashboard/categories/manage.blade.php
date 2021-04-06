@extends('pharma.dashboard.layout')
@section('title','Medico | Pharma Dashboard')
@section('dashboard-title','Manage Categories')
@section('main-content')



    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="display:inline-block" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <label for="">Are you sure you want to delete this category?</label>
                    </div>
                    <div class="modal-footer">
                        <form action="" method="POST" id="delete-category" >
                        @csrf
                        @method('DELETE')
                            <input type="submit" class="btn btn-primary" id="delete" value="Delete">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>


 <div style="float:right;margin-bottom:4%;" >
 <form action="{{route('subcategories.create')}}" >
    <input type="submit" class="btn btn-primary" value="+ Add Subcategory">
 </form>
 </div> 


<div class="card">

    <div class="card-body">
        <table class="table table-bordered" id="manage-category-table">
            <thead>
                <th>#</th>   
                <th>Name</th> 
                <th>Sub Categories</th> 
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            @if(count($category->subcategories) > 0)
                                @foreach($category->subcategories as $subcategory)
                                <a href="{{route('products.manageSubcategory',$subcategory)}}" style="text-decoration:none;">{{ucfirst($subcategory->name)}}{{$loop->last ? '' : ','}}</a>
                                @endforeach
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            @if(count($category->products) == 0)
                                <a href="#"  class="btn btn-danger btn-sm delete-trigger modal-trigger" data-toggle="modal" onclick="displayDeleteModalForm({{$category}})" data-target="#delete-modal">Delete</a>
                            @else 
                            <a href="{{route('products.manageCategory',$category)}}" class="btn btn-warning btn-sm">View All Products</a>
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
                    
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('page-level-scripts')
     <script>
         function displayDeleteModalForm($category) {
            var url = 'categories/destroy/'+$category.id;
            $("#delete-category").attr('action',url);
        }
         $(document).ready(function() {
        $('#manage-category-table').DataTable({
    
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
@section('page-level-styles')
    <style>
        .d-flex{
            display: flex;
        }
        .modal-backdrop{
            display: none;
        }
    </style>
@endsection