@extends('doctor.dashboard.layout')
@section('dashboard-title','Update Slots')
@section('main-content')

    <div class="create_slote">
        <div class="">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('slot.update',$slot_date->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-bottom: 15px">
                            <input disabled required style="width:200px" type="date"
                                class="form-control"
                                name="slot_date" id="slot_date" value="{{$slot_date->date}}" placeholder="{{$slot_date->date}}">
                            @error('slot_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="time-slots-wrapper">


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
        var slots = {!!$slots!!}
        var type = {!!$typeArr!!}
        setSlots(slots,type)
        flatpickr("#slot_date", {
            enableTime: false,
            minDate: "today",
        });
        var count;
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
        function setSlots(slots,type){
            let i=1;
            for(i=1;i<=slots.length;i++){
                let slotId = slots[i-1].id;
                let clinic = `${slotId}clinic`;
                let video = `${slotId}video`;

                let type1 = type[clinic];

                let type2 = type[video];
                console.log(type1);
                console.log(type2);
                $('.time-slots-wrapper').append(`

                    <div class="form-group" id="time-slot-${i}">
                        <div style="display: flex">
                            <div style="margin-right:10px">
                                <label for="time-${i}" style="margin-right: 10px">Pick a time slot</label>
                                <input type="text" name="time[]" id="time-${i}" class="timepicker"/>
                                <input type="hidden" name="old[]" id="old-${i}" value="${slots[i-1].start_time}-${slots[i-1].id}">
                            </div>
                            <div style="margin-right:10px">
                                <div>
                                    <label for="clinic" style="margin-right: 3px">Clinic</label>
                                    <input type="checkbox" style="margin-right: 10px"  class="cb" name="type[]" id="clinic-${i}" data-id="1" value="clinic-${slots[i-1].start_time}" ${type1}>
                                    <label for="video" style="margin-right: 3px">Video Call</label>
                                    <input type="checkbox"  class="cb" name="type[]" id="video-${i}" data-id="1" value="video-${slots[i-1].start_time}" ${type2}>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-right:10px">
                                <a href="" id="delete-slot-${i}" data-id="${slots[i-1].id}" class="delete-slot"><button class='btn btn-danger btn-sm' style="margin-right: 3px"><i class='fa fa-trash'></i></button></a>
                            </div>
                        </div>

                    </div>
                `);
                var op = {
                    now: slots[i-1].start_time,
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
                $('#time-'+i).wickedpicker(op);
                count=i;
            }
            count = count+1;
        }

        $('.add-slot').click(function(e){

            e.preventDefault();
            $('.time-slots-wrapper').append(`

                <div class="form-group" id="time-slot-${count}">
                    <div style="display: flex">
                        <div style="margin-right:10px">
                            <label for="time-${count}" style="margin-right: 10px">Pick a time slot</label>
                            <input type="text" name="time[]" data-id="0" id="time-${count}" class="timepicker"/>
                            <input type="hidden" name="old[]" id="old-${count}" value="09:00-0">
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
                            <a href="" id="delete-slot-${count}" data-id="0" class="delete-slot"><button class='btn btn-danger btn-sm' style="margin-right: 3px"><i class='fa fa-trash'></i></button></a>
                        </div>
                    </div>

                </div>
            `);
            $('#time-'+count).wickedpicker(options);
            count++;

        });
        $('.time-slots-wrapper').on('change','.timepicker',function(e){

            var id = $(this).attr('id').split('-')[1];
            var old = $('#old-'+id).val().split('-')[1];
            $('#clinic-'+id).val('clinic-'+($(this).val()));
            $('#video-'+id).val('video-'+($(this).val()));
            if(old>0)
                $('#old-'+id).val($(this).val()+'-'+old);
            else
                $('#old-'+id).val($(this).val()+'-0');
        });
        $('.time-slots-wrapper').on('click','.delete-slot',function(e){
            e.preventDefault();
            var db_id = $(this).data('id');
            var id = $(this).attr('id').split('-')[2];


            if(db_id!=0){
                let route = "{{ route('ajax.deleteSlot') }}";
                $.ajax({
                    url: route,
                    method: "POST",
                    data:{
                        _token: "{{ csrf_token() }}",
                        'slot_id': db_id,
                        'id':id
                    },
                    dataType: 'json',
                    success: function(success){
                        if(success.delete)
                            $('#time-slot-'+success.id).remove();

                    }
                });
            }
            else{
                $('#time-slot-'+id).remove();
            }
        });
    </script>
@endsection
