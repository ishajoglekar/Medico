@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card" style="box-shadow:none;margin-top:3rem">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="reason">Reason</label>
                                <input type="text" required
                                value="{{old('reason')}}"
                                class="form-control"
                                name="reason" id="reason">
                                <p id="msg" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="speciality_id">Speciality</label>
                                <select name="speciality_id" id="speciality_id" class="form-control" select>
                                    @foreach($specialities as $speciality)
                                    <option value="{{$speciality->id}}">{{$speciality->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">

                            </div>
                            <div class="form-group">
                                <button class="btn btn-warning" id="book-btn" >Book Appointment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="online-doc">
                    <div class="wrapper">
                        <div class="green"></div>
                        <p>{{$count}} doctors are online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlay" class=" d-none"></div>
    <div id="loader" class="d-none">

    </div>
    <div id="loader2" class="d-none">

    </div>
    <div id="loader-child" class="d-none"><p>Finding Doctor For You!!!</p></div>
    <!-- Modal -->
    <a href="#" data-toggle="modal" data-target="#exampleModal" id="modalBtn" class="d-none">Btn</a>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h5 class="modal-title" style="display:inline-block" id="exampleModalLabel">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:black">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Sorry!!!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style>
        #overlay{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .3);
        }
        .online-doc{
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            display: inline-block;
        }
        .wrapper{

            display: flex;
        }
        .green{
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: green;
            margin-right: 5px;
            margin-top: 3px;
        }
        .wrapper p{
            line-height: 16px;
        }
        .loader{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border:1px solid blue;
            animation: magic 1s infinite;
        }

        .loader2{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border:1px solid blue;
            animation: magic2 1s infinite;
            animation-delay: .3s;
        }
        .loader-child{
            font-size: .7rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 150px;
            height: 150px;
            line-height: 150px;
            text-align: center;
            border-radius: 50%;
            color: #fff;
            background: blue;
            z-index: 999;
        }
        @keyframes magic2{
            0%{
                width: 150px;
                height: 150px;
            }
            50%{
                opacity: 1;
            }
            75%{
                opacity: .5;
            }
            100%{
                width: 250px;
                height: 250px;
                opacity: .2;
            }
        }
        @keyframes magic{
            0%{
                width: 150px;
                height: 150px;
            }
            50%{
                opacity: 1;
            }
            75%{
                opacity: .5;
            }
            100%{
                width: 300px;
                height: 300px;
                opacity: .2;
            }
        }
    </style>
@endsection
@section('scripts')
<script>
    $('#book-btn').click(function(){
        let reason = $('#reason').val();
        if(reason == '')
        {
            $('#msg').html('This field is required');


        }else{

            $('#overlay').removeClass('d-none');
            $('#loader').addClass('loader').removeClass('d-none');
            $('#loader2').addClass('loader2').removeClass('d-none');
            $('#loader-child').addClass('loader-child').removeClass('d-none');

            let speciality_id = $('#speciality_id').val();
            let route = "{{route('users.bookChatAppointment')}}";
            $('#msg').html('');
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'reason': reason,
                    'speciality_id': speciality_id
                },
                dataType : 'json',
                success: function(success){
                   checkContinuously(success);
                }
             });
        }
    });

    function checkContinuously(appointment){
        var count = 0;
        var mainCount = 0;
        var i = setInterval(() => {
            let route = "{{route('users.checkChatBookedAppointment')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'count': count,
                    'mainCount':mainCount,
                    'appointment_id': appointment.id
                },
                dataType : 'json',
                success: function(success){
                    if(success.status == "accept"){
                        clearInterval( i );
                        window.location.replace("http://localhost:8000/send");
                    }
                    else if(success.status == "reject" || success.status == "timedout"){
                        if(success.mainCount >= 2){

                            clearInterval( i );

                            $('#overlay').addClass('d-none');
                            $('#loader').addClass('d-none').removeClass('loader');
                            $('#loader2').addClass('d-none').removeClass('loader2');
                            $('#loader-child').addClass('d-none').removeClass('loader-child');
                            $('#modalBtn').click();
                        }
                        else{
                            mainCount = success.mainCount;
                        }
                    }
                    else if(success.status == "pending"){
                        count = success.count;
                    }
                    else if(success.status == "unavailable"){
                        clearInterval( i );


                        $('#overlay').addClass('d-none');
                        $('#loader').addClass('d-none').removeClass('loader');
                        $('#loader2').addClass('d-none').removeClass('loader2');
                        $('#loader-child').addClass('d-none').removeClass('loader-child');
                        $('#modalBtn').click();
                    }
                }
            });
            count++;

        }, 10000);
    }

</script>
@endsection
