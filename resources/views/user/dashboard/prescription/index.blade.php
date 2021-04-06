@extends('user.dashboard.layout')
@section('title','Medico | User Dashboard')
@section('dashboard-title','Your Slots')
@section('main-content')
<div style="padding:10px;">
    {{-- <div class="" style="display: flex; flex-direction: row-reverse;">
            <a href="{{route('slots.create')}}" class="btn-sm btn-success">Create New</a>
</div> --}}
<!--begin: Datatable -->

<div class="adv-table" style="margin-top: 10px">
    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Doctor Name</th>
                <th>Clinic</th>
                <th>Date and Time</th>
                <th>Type</th>
                <th>Prescription</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp


            @foreach ($prescriptionsArr1 as $arr)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$arr[0]}}</td>
                <td>{{$arr[1]}}</td>
                <td>{{date("F j Y",strtotime($arr[2])) ." at ". $arr[3]}}</td>
                <td>{{$arr[4]}}</td>
                <!-- {{asset('storage/'.$arr[5])}} -->
                @if($arr[4]!=null)
                <td><embed src="{{URL::asset('storage/'.$arr[5])}}" style="width: 800px ;height:300px "></td>
                <td><a href="{{URL::asset('storage/'.$arr[5])}}" download>Download</a></td>
                @else
                    <td>No Prescription</td>
                    <td></td>
                    @endif
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
    .d-flex {
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