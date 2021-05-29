@extends('doctor.dashboard.layout')
@section('title','Medico | Doctor Dashboard')
@section('dashboard-title','Profile')
@section('page-level-styles')
<link rel="stylesheet" href="{{asset('dashboard/css/dashboard-portfolio.css')}}">
@endsection
@section('main-content')
   <div class="portfolio">
    <div class="container">
        <div class="row">
          <div class="col-md-5 details">
                <h4 >Great Progress!</h4>
                <p>Your Profile is just few steps away from being completed!</p>
                <p class="sections">Section : profile details</p>
                <p class="section-name">Doctor’s basic details, medical registration, education qualification, establishment details etc.</p>
                @if(auth()->user()->doctor_id != NULL)
                <a href="{{route('doctor.basic-details')}}"><li class="fa fa-check-circle green"></li> Change</a>
                @else
                <a href="{{route('doctor.basic-details')}}" style="display:block;margin-top:1rem;"><button type="button" class="btn btn-warning">Continue</button></a>
                @endif
          </div>
          <div class="col-md-7">
           
          </div>
        </div>
    </div>
    </div>


@endsection

