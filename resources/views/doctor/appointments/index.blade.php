@extends('doctor.dashboard.layout')
@section('title','Medico | Doctor Dashboard')
@section('dashboard-title','Your Appointments')
@section('main-content')
    <div class="appointment-single-type-nav">
        <div class="d-flex appointments-nav">
            <ul class="d-flex">
                <li><a class="first" href="">New</a></li>
                <li><a class="second" href="">Previous</a></li>
                <li><a class="third" href="">Chats</a></li>
                <div class="nav-active"></div>
            </ul>
        </div>
    </div>
    <div>
        <!--begin: Datatable -->
        <div class="adv-table" id="adv-table" style="margin-top: 10px">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
              <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Patient Name</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td></td>
                        <td> <a href="#" data-id="{{$appointment->user->id}}"  data-toggle="modal" data-target="#exampleModal" id="get-user">{{$appointment->user->name}}</a></td>
                        <td>{{$appointment->reason}}</td>
                        <td>{{date("F j Y",strtotime($appointment->slot->slot_date->date))}}</td>
                        <td>{{date("g:i a",strtotime($appointment->slot->start_time))}}</td>
                        <td>{{$appointment->type->name}}</td>
                        <td class="d-flex">
                            <a class='btn btn-primary btn-sm' style="margin-right: 3px" href="{{route('appointment.accept',$appointment->id)}}"><i class='fa fa-check'></i></a>
                            <a class='btn btn-danger btn-sm' style="" href="{{route('appointment.reject',$appointment->id)}}"><i class='fa fa-times'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="display:inline-block" id="exampleModalLabel">User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex">
                            <p>Name : </p>
                            <p id="modal-name" style="margin-left:5px"></p>
                        </div>
                        <div class="d-flex">
                            <p>Gender : </p>
                            <p id="modal-gender" style="margin-left:5px;"></p>
                        </div>
                        <div class="d-flex">
                            <p>Age : </p>
                            <p id="modal-age" style="margin-left:5px"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        {{--pdf modal--}}
        <div class="modal fade" id="pdf-modal" tabindex="-1" role="dialog" aria-labelledby="pdf-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="display:inline-block" id="pdf-modal-label">Prescribtion Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="pdf-form">
                            @csrf
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Patient's Name</label>
                                 <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                             </div>

                             <div class="form-group">
                                 <label for="exampleFormControlTextarea1">Medicines</label>
                                 <textarea class="form-control" name="medicines" id="exampleFormControlTextarea1" rows="3"></textarea>
                             </div>

                             <div class="form-group">
                                 <label for="exampleFormControlTextarea1">Tests</label>
                                 <textarea class="form-control" name="tests"id="exampleFormControlTextarea1" rows="3"></textarea>
                             </div>

                             <input type="submit" class="btn btn-primary" value="Generate">
                         </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection
@section('page-level-styles')
    <style>
        .d-flex{
            display: flex;
        }
        .modal-backdrop{
            display: none;
        }
        .appointments-nav ul{
            padding: 0;
            width:100%;
            height:100%;
            position: relative;
        }

        .appointments-nav ul li{
            width: 60px;
            height: 30px;
            line-height: 30px;
            text-align:center;

        }
        .appointments-nav ul li a{
            color: #333;
        }
        .nav-active{
            position: absolute;
            left:0;
            bottom:0;
            background:#28328C;
            width:60px;
            height:2px;
            transition: all linear .3s;
        }
        .appointments-nav ul li .first {
            color: #28328C ;
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
        $('#adv-table').on('click','#get-user',function(e) {
            var id = $(this).data('id');
            let route = "{{route('get-user')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id': id,
                },
                dataType : 'json',
                success: function(success){
                    $('#modal-name').html(success.name);
                    $('#modal-gender').html(success.gender);
                    $('#modal-age').html(success.age);
                }
            });
        });
        $('.first').click(function(e) {
            e.preventDefault();
            $('.nav-active').css({
                left:0
            });
            $(this).css('color','#28328C');
            $('.second').css('color','#333');
            $('.third').css('color','#333');
            let route = "{{route('get-new-appointments')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",

                },
                dataType : 'json',
                success: function(success){
                    $('#hidden-table-info').dataTable().fnDestroy();
                    let content =`
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">

                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Patient Name</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    for(let i=0;i<success.length;i++){
                        content +=`
                        <tr>
                            <td></td>
                            <td> <a href="#" data-id="${success[i][1].id}"  data-toggle="modal" data-target="#exampleModal" id="get-user">${success[i][1].name}</a></td>
                            <td>${success[i][0].reason}</td>
                            <td>${success[i][3].date}</td>
                            <td>${success[i][2].start_time}</td>
                            <td>${success[i][4].name}</td>
                            <td class="d-flex">
                                <a class='btn btn-primary btn-sm' style="margin-right: 3px" href="/dashboard/doctor/appointment/${success[i][0].id}/accept"><i class='fa fa-check'></i></a>
                                <a class='btn btn-danger btn-sm' style="" href="/dashboard/doctor/appzointment/${success[i][0].id}/reject"><i class='fa fa-times'></i></a>
                            </td>
                        </tr>
                        `;
                    }

                    content +=`
                            </tbody>
                        </table>
                    `;

                    $('#adv-table').html(content);

                    $('#hidden-table-info').dataTable({
                        "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [0]
                        }],
                        "aaSorting": [
                        [1, 'asc']
                        ]
                    });
                }
            });
        });

        $('.second').click(function(e) {
            e.preventDefault();
            $('.nav-active').css({
                left:'60px'
            });
            $(this).css('color','#28328C');
            $('.first').css('color','#333');
            $('.third').css('color','#333');
            let route = "{{route('get-previous-appointments')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",

                },
                dataType : 'json',
                success: function(success){
                    $('#hidden-table-info').dataTable().fnDestroy();
                    let content =`
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">

                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Patient Name</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    for(let i=0;i<success.length;i++){
                        var d = new Date();
                        var cd = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
                        var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                        var status = "";

                        var ct = new Date(cd+' '+time);
                        ct = ct.getTime();

                        var at = new Date(success[i][3].date+' '+success[i][2].start_time);
                        at.setMinutes(at.getMinutes() + success[i][6] );
                        // alert(success[i][6]);
                        at = at.getTime();
                        if(success[i][0].status == 'accept' || success[i][0].status == 'active'){
                            if(new Date(cd+' '+time).getTime()>new Date(success[i][3].date+' '+time).getTime()){

                                status = "completed";
                            }else if(new Date(cd+' '+time).getTime()<new Date(success[i][3].date+' '+time).getTime()){

                                status = "pending";
                            }else{
                                if(ct>at){
                                    status = "completed";
                                }else{
                                    status = "pending";
                                }
                            }
                        }else if(success[i][0].status == 'Time Over'){
                            status = "Time Over";
                        }

                        content +=`
                        <tr>
                            <td></td>
                            <td> <a href="#" data-id="${success[i][1].id}"  data-toggle="modal" data-target="#exampleModal" id="get-user">${success[i][1].name}</a></td>
                            <td>${success[i][0].reason}</td>
                            <td>${success[i][3].date}</td>
                            <td>${success[i][2].start_time}</td>
                            <td>${success[i][4].name}</td>`;

                        if(status == "completed"){
                            if(!success[i][0].report_pdf){
                                content += `<td class="d-flex">
                                            <a id="generate-btn" data-id="${success[i][0].id}" class='btn btn-primary btn-sm' href="#" data-toggle="modal" data-target="#pdf-modal"><i class="fa fa-check" style="margin-right: 7px"></i>Generate</a>
                                        </td>`;
                            }else{
                                content += `<td class="d-flex">
                                            Done
                                        </td>`;
                            }

                        }else if(status == "pending"){
                            doctor_id = {{auth()->user()->doctor_id}};
                            // console.log(success[i][5]);
                            content += `<td class="d-flex">
                                            <a class='btn btn-danger btn-sm' href=""><i class='fa fa-trash' style="margin-right: 7px"></i>Cancel</a>

                                            <form action ="/room/create" method="POST">
                                                @csrf
                                                <input type="hidden" value="${success[i][1].id}_${doctor_id}" name="roomName">
                                                <input type="hidden" value="${success[i][1].id}" name="user_id">
                                                <input type="hidden" value="${success[i][0].id}" name="appointment_id">`;

                                                if(success[i][5] == true){
                            content +=               `<button type="submit" class='btn btn-primary btn-sm'>
                                                    <i class='fa fa-user' style="margin-right: 7px"></i>
                                                    Start Video Call
                                                </button>`;
                                            }
                            content +=               `</form>
                                                </td>`;
                        }else if(status == "Time Over"){
                            content += `<td class="d-flex">
                                            <p class="text-danger">Time Over</p>
                                        </td>`
                        }
                        content +=`</tr>
                        `;
                    }

                    content +=`
                            </tbody>
                        </table>
                    `;

                    $('#adv-table').html(content);

                    $('#hidden-table-info').dataTable({
                        "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [0]
                        }],
                        "aaSorting": [
                        [1, 'asc']
                        ]
                    });
                }
            });
        });
        $('.third').click(function(e) {
            e.preventDefault();
            $('.nav-active').css({
                left:'120px'
            });
            $(this).css('color','#28328C');
            $('.first').css('color','#333');
            $('.second').css('color','#333');
            let route = "{{route('get-chats-appointments')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",

                },
                dataType : 'json',
                success: function(success){
                    $('#hidden-table-info').dataTable().fnDestroy();
                    let content =`
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">

                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Patient Name</th>
                                    <th>Reason</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    for(let i=0;i<success.length;i++){
                        content +=`
                        <tr>
                            <td></td>
                            <td> <a href="#" data-id="${success[i][1].id}"  data-toggle="modal" data-target="#exampleModal" id="get-user">${success[i][1].name}</a></td>
                            <td>${success[i][0].reason}</td>
                            <td class="d-flex">
                                <a class='btn btn-primary btn-sm' style="margin-right: 3px" href="/dashboard/doctor/appointment/${success[i][0].id}/accept"><i class='fa fa-check'></i></a>

                                <a class='btn btn-danger btn-sm' style="" href="/dashboard/doctor/appointment/${success[i][0].id}/reject"><i class='fa fa-times'></i></a>
                            </td>
                        </tr>
                        `;
                    }

                    content +=`
                            </tbody>
                        </table>
                    `;

                    $('#adv-table').html(content);

                    $('#hidden-table-info').dataTable({
                        "aoColumnDefs": [{
                        "bSortable": false,
                        "aTargets": [0]
                        }],
                        "aaSorting": [
                        [1, 'asc']
                        ]
                    });
                }
            });
        });
        $('#adv-table').on('click','#generate-btn',function(e) {

            $('#pdf-form').attr('action','/dashboard/doctor/appointment/'+$(this).data('id')+'/generatePdf');
        });
    </script>
@endsection

