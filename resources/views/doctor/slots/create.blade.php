@extends('doctor.dashboard.layout')
@section('main-content')
    <div class="create_slote">
        <h3>Create Slots</h3>
        <div class="">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('slots.store')}}" method="POST">
                        @csrf
                        <div class="form-group" style="margin-bottom: 15px">
                            <label for="slot_date">Choose Slot Date</label>
                            <input required style="width:200px" type="date"
                                class="form-control"
                                name="slot_date" id="slot_date" placeholder="Choose">
                            @error('slot_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="time-slots-wrapper">
                            <div class="form-group" id="time-slot-1">
                                <div style="display: flex">
                                    <div style="margin-right:10px">
                                        <label for="time-1" style="margin-right: 10px">Pick a time slot</label>
                                        <input type="text" name="time[]" id="time-1" class="timepicker"/>
                                    </div>
                                    <div style="margin-right:10px">
                                        <div>
                                            <label for="clinic" style="margin-right: 3px">Clinic</label>
                                            <input type="checkbox" style="margin-right: 10px"  class="cb" name="type[]" id="clinic-1" data-id="1" value="clinic">
                                            <label for="video" style="margin-right: 3px">Video Call</label>
                                            <input type="checkbox"  class="cb" name="type[]" id="video-1" data-id="1" value="video">
                                            @error('type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div style="margin-right:10px">
                                        <a href="" id="delete-slot-1" class="delete-slot"><button class='btn btn-danger btn-sm' style="margin-right: 3px"><i class='fa fa-trash'></i></button></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div style="display: flex;flex-direction: row-reverse;margin-right:25px;"><a href="" class="add-slot"><i class="fa fa-plus"></i> Add Slot</a></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-level-styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('assets/css/doctor/plugin/wickedpicker/wickedpicker.css') }}" rel="stylesheet">
    <style>
        .fa-chevron-up,.fa-chevron-down{
            display: block;
        }
    </style>
@endsection
@section('page-level-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('assets/doctors/js/plugin/wickedpicker/wickedpicker.js')}}" type="text/javascript"></script>

    <script>
        var slots_date = {!!$slots_date!!}
        var booked_date = [];
        for(let i=0;i<slots_date.length;i++){
            booked_date[i] = slots_date[i].date;
        }
        console.log(booked_date);
        flatpickr("#slot_date", {
            enableTime: false,
            minDate: "today",
            disable: booked_date,
            dateFormat: "Y-m-d",
        });
        var count = 2;
        var options = {
            twentyFour: true,  //Display 24 hour format, defaults to false
            upArrow: 'fa fa-chevron-up',  //The up arrow class selector to use, for custom CSS
            downArrow: 'fa fa-chevron-down', //The down arrow class selector to use, for custom CSS
            close: 'wickedpicker__close', //The close class selector to use, for custom CSS
            hoverState: 'hover-state', //The hover state class to use, for custom CSS
            title: 'Timepicker', //The Wickedpicker's title,
            showSeconds: true, //Whether or not to show seconds,
            timeSeparator: ':', // The string to put in between hours and minutes (and seconds)
            secondsInterval: 1, //Change interval for seconds, defaults to 1,
            minutesInterval: 1, //Change interval for minutes, defaults to 1
            beforeShow: null, //A function to be called before the Wickedpicker is shown
            afterShow: null, //A function to be called after the Wickedpicker is closed/hidden
            show: null, //A function to be called when the Wickedpicker is shown
            clearable: false, //Make the picker's input clearable (has clickable "x")
        };
        $('#time-1').wickedpicker(options);
        $('.add-slot').click(function(e){
            e.preventDefault();
            $('.time-slots-wrapper').append(`

                <div class="form-group" id="time-slot-${count}">
                    <div style="display: flex">
                        <div style="margin-right:10px">
                            <label for="time-${count}" style="margin-right: 10px">Pick a time slot</label>
                            <input type="text" name="time[]" id="time-${count}" class="timepicker"/>
                        </div>
                        <div style="margin-right:10px">
                            <div>
                                <label for="clinic" style="margin-right: 3px">Clinic</label>
                                <input type="checkbox" style="margin-right: 10px"  class="cb" name="type[]" id="clinic-${count}" data-id="1" value="clinic">
                                <label for="video" style="margin-right: 3px">Video Call</label>
                                <input type="checkbox"  class="cb" name="type[]" id="video-${count}" data-id="1" value="video">
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-right:10px">
                            <a href="" id="delete-slot-${count}" class="delete-slot"><button class='btn btn-danger btn-sm' style="margin-right: 3px"><i class='fa fa-trash'></i></button></a>
                        </div>
                    </div>

                </div>
            `);
            $('#time-'+count).wickedpicker(options);
            count++;
        });
        $('.time-slots-wrapper').on('change','.timepicker',function(e){

            var id = $(this).attr('id').split('-')[1];
            $('#clinic-'+id).val('clinic-'+($(this).val()));
            $('#video-'+id).val('video-'+($(this).val()));

        });
        $('.time-slots-wrapper').on('click','.delete-slot',function(e){
            e.preventDefault();
            var id = $(this).attr('id').split('-')[2];
            $('#time-slot-'+id).remove();
        });
    </script>
@endsection
