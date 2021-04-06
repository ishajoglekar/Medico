@extends('pharma.dashboard.layout')
@section('title','Medico | Pharma Dashboard')
@section('dashboard-title','Manage Subategories')
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
                    <label for="">Are you sure you want to delete this subcategory?</label>
                    </div>
                    <div class="modal-footer">
                        <form action="" method="POST" id="delete-subcategory" >
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
        <table class="table table-bordered" id="manage-subcategory-table">
            <thead>
                <th>#</th>   
                <th>Name</th> 
                <th>Category</th> 
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$subcategory->name}}
                        </td>
                        <td>
                            <a href="{{route('products.manageCategory',$subcategory->category)}}">{{$subcategory->category->name}}</a>
                        </td>
                        <td>
                            <a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            @if(count($subcategory->products) == 0)
                                <a href="#"  class="btn btn-danger btn-sm delete-trigger modal-trigger" data-toggle="modal" onclick="displayDeleteModalForm({{$subcategory}})" data-target="#delete-modal">Delete</a>
                            @else   
                            <a href="{{route('products.manageSubcategory',$subcategory)}}" class="btn btn-warning btn-sm">View All Products</a>
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
         function displayDeleteModalForm($subcategory) {
            var url = 'subcategories/destroy/'+$subcategory.id;
            $("#delete-subcategory").attr('action',url);
        }
         $(document).ready(function() {
        $('#manage-subcategory-table').DataTable({
    
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