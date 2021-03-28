@extends('user.dashboard.layout')
@section('title','Practo | User Dashboard')
@section('dashboard-title','Your Orders')
@section('main-content')
    <div style="padding:10px;">

        <div class="adv-table" style="margin-top: 10px">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Billing Name</th>
                    <th>Address</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total price</th>
                </tr>
              </thead>
              <tbody>
                  @php
                    $i=1;
                  @endphp
                 @foreach ($productDetails as $arr)
                 <tr>
                    <td>{{$i++}}</td>
                    <td>{{$arr[0]}}</td>
                    <td>{{$arr[1]}}</td>
                    <td>{{$arr[2]}}</td>
                    <td>{{$arr[3]}}</td>
                    <td>{{$arr[4]}}</td>
                    <td>{{$arr[5]}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>

        <!--end: Datatable -->

    </div>
@endsection
@section('page-level-styles')
    <style>
        .d-flex{
            display: flex;
        }
    </style>
@endsection
@section('page-level-scripts')
    <script src="{{ asset('assets/doctors/js/plugin/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script>
        var oTable = $('#hidden-table-info').dataTable({
            "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
            }],
            "aaSorting": [
            [1, 'asc']
            ]
        });
    </script>
@endsection

