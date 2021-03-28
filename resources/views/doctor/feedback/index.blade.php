@extends('doctor.dashboard.layout')
@section('title','Practo | Doctor Dashboard')
@section('dashboard-title','Your Feedbacks')
@section('main-content')
   
    <div>
        <!--begin: Datatable -->
        <div class="adv-table" id="adv-table" style="margin-top: 10px">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Patient Name</th>
                    <th>Feedback</th>
                    <th>Rating</th>
                </tr>
              </thead>

              <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                    <td>{{$i++}}</td>
                        <td>{{App\User::where('id',$feedback->user_id)->first()->name}}</td>
                        <td>{{$feedback->message}}</td>
                    <td>{{$feedback->rating}}</td>
                    </tr>
                    {{-- {{$i++}} --}}
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
@endsection
@section('page-level-styles')
    
@endsection
@section('page-level-scripts')
    <script src="{{ asset('assets/doctors/js/plugin/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
@endsection

