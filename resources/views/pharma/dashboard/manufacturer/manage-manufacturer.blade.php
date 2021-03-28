@extends('pharma.dashboard.layout')
@section('title','Practo | Pharma Dashboard')
@section('dashboard-title')
<div>Manufacturers</div>
@endsection
@section('main-content')

<div class="card" style="margin-top:3%">
    <div class="card-body">
        <table class="table table-bordered adv-table" id="manage-categoryproduct-table">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Company Name</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td style="max-width:110px;">
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->manufacturer->name}}
                        </td>
                        <td>
                            @if($user->role == "temp_manufacturer")
                            <form action="{{route('manufacturer.accept',$user->id)}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">Accept</button>
                            </form>
                            <form action="{{route('manufacturer.reject',$user->id)}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-sm btn-danger" type="submit">Reject</button>
                            </form>
                            @else
                             Accepted
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
