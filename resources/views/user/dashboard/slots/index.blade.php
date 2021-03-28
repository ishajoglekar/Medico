@extends('user.dashboard.layout')
@section('title','Practo | User Dashboard')
@section('dashboard-title','Your Slots')
@section('main-content')
    <div class="" style="padding:10px;">
        {{-- <div class="" style="display: flex; flex-direction: row-reverse;">
            <a href="{{route('slots.create')}}" class="btn-sm btn-success">Create New</a>
        </div> --}}
        <!--begin: Datatable -->

        <div class="adv-table" style="margin-top: 10px">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Doctor name</th>
                    <th>Fees</th>
                    <th>Doctor Address</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Booking Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  @php
                    $i=1;

                  @endphp
                @foreach ($slotsArr as $slotArr)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$slotArr[0]}}</td>
                    <td>{{$slotArr[1]}}</td>
                    <td>{{$slotArr[2]}}</td>

                    <td>{{date("F j Y",strtotime($slotArr[3]))}}</td>
                    <td>{{$slotArr[4]}}</td>
                    <td>{{$slotArr[5]}}</td>
                    <td>{{$slotArr[6]}}</td>
                    <td>
                        @if($slotArr[6] == 'active')
                        <form action ="/room/join/{{auth()->user()->id}}_{{$slotArr[7]}}">

                            <input type="hidden" value="{{auth()->user()->id}}_{{$slotArr[7]}}" name="roomName">
                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                            <input type="hidden" value="{{$slotArr[8]}}" name="appointment_id">
                            <button type="submit" class='btn btn-primary btn-sm'>
                                <i class='fa fa-user' style="margin-right: 7px"></i>
                                Join Video Call
                            </button>
                        </form>
                        @endif
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

