@extends('doctor.dashboard.layout')
@section('title','Medico | Doctor Dashboard')
@section('dashboard-title','Your Slots')
@section('main-content')
    <div>
        <div class="" style="display: flex; flex-direction: row-reverse;">
            <a href="{{route('slots.create')}}" class="btn-sm btn-success">Create New</a>
        </div>
        <!--begin: Datatable -->
        <div class="adv-table" style="margin-top: 10px">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Date</th>
                    <th>Total Slot</th>
                    <th>Booked Slot</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($slotsArr as $slotArr)
                <tr>
                    <td></td>
                    <td>{{date("F j Y",strtotime($slotArr[0]->date))}}</td>
                    <td>{{$slotArr[1]}}</td>
                    <td>{{$slotArr[2]}}</td>
                    <td class="d-flex">
                        <a class='btn btn-primary btn-sm' style="margin-right: 3px" href="{{route('slot.edit',$slotArr[0]->id)}}"><i class='fa fa-pencil'></i></a>
                    </td>
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

