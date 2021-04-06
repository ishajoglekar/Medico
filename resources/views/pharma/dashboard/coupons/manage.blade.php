@extends('pharma.dashboard.layout')
@section('title','Medico | Pharma Dashboard')
@section('dashboard-title','Manage Categories')
@section('main-content')
<div class="card">

    <div class="card-body">
        <table class="table table-bordered" id="manage-coupon-table">
            <thead>
                <th>#</th>   
                <th>Code</th> 
                <th>Minimum Amount</th>
                <th>Maximum Discount</th> 
                <th>Valid Till</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$coupon->code}}
                        </td>
                        <td>
                            {{$coupon->min_amount}}
                        </td>
                        <td>
                            {{$coupon->max_discount}}
                        </td>
                        <td>
                            {{Carbon\Carbon::parse($coupon->valid_till)->diffForHumans()}}
                        </td>
                        
                        <td>
                            <a href="{{route('coupons.edit',$coupon->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
         $(document).ready(function() {
        $('#manage-coupon-table').DataTable({
    
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