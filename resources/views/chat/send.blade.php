@extends('layouts.chat')
@section('content')
<a id="index" href="{{route('index')}}">
    <i class="fa fa-home"></i>
</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 chat-left" style="height:100vh;padding:0; background:#fefefe;">
            <div style="background:#efefef">
                <h3 style="color: #28328C;text-align:center;padding:1.1rem;background:#fefefe;border-bottom:solid 2px #999;margin-bottom:.5rem;">Users</h3>
            </div>

            <div class="sidebar">
                <ul>

                @foreach($users as $user)
                    <div style="display:flex ; border-top: 1px solid #eee; padding:.75rem 0">
                        <div class="dp">
                            @if($user->image != NULL)
                                <img data-qa-id="doctor-profile-image"
                                class="c-profile__image"
                                src="{{asset('storage/'.$user->image)}}"/>
                            @else
                                <img data-qa-id="doctor-profile-image"
                                class="c-profile__image"
                                src="{{auth()->user()::getAvatarAttribute($user->name,30)}} "/>
                            @endif

                        </div>
                        <li id="{{$user->id}}" class="li" style="list-style:none; cursor:pointer;color:#444">{{$user->name}}</li>
                    </div>
                @endforeach
                </ul>

            </div>


        </div>
        <div class="col-md-9" style="background: #fefefe; padding:0;height:100vh">
            <div class="back-img">
                <img src="{{asset('assets/images/chat/back-img.jpg')}}" alt="">
            </div>
            <div class="home-img">
                <img src="{{asset('assets/images/logo/practo.svg')}}" alt="" width="100%" height="100%">

            </div>
            <div class="chat-right d-none">
                <div class="container-fluid" style="border-bottom:solid 2px #999;">
                    <div class="row">
                        <div class="col-md-12 pb-2" style="background:#efefef">
                            <div class="d-flex justify-content-start mt-2">
                                <div style="width: 30px;height:30px;border-radius:100%;background:#aaa;" class="mr-3">
                                    @if($user->image != NULL)
                                    <img data-qa-id="doctor-profile-image"
                                    class="c-profile__image"
                                    src="{{asset('storage/'.$user->image)}}"/>
                                @else
                                    <img data-qa-id="doctor-profile-image"
                                    class="c-profile__image"
                                    src="{{auth()->user()::getAvatarAttribute($user->name,30)}} "/>
                                @endif

                                </div><h4 id="name"></h4></div>
                            <h5 id="sender-status" style="margin-left:3rem;margin-bottom:0;font-size:1rem;min-height:1rem"></h5>
                        </div>
                    </div>
                </div>
                <div id="message">

                </div>

                <div class="text-send-wrapper">
                    <input type="text" id="input" placeholder="Enter your message" class="text-field form-control p-2" style="font-size: 1rem;">
                    <input type="submit" id="btn" class="send-btn form-contol btn bg-blue btn-primary pt-2 pb-2 pl-3 pr-3" style="font-size: 1rem;" value="Send">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .sidebar{
        overflow-y:auto;
        height:88%!important;
    }
    .sidebar ul{
        padding:0 10px;

    }
    .sidebar ul .dp{
        width:25px;
        height:25px;
        background-color:#ccc;
        border-radius:50%;
        margin-right:10px;
    }
    .chat-left{
        border-right: 1px solid #ccc;
    }
    .chat-right{
        height: 100vh;
    }
    .li{
        line-height:25px;
    }
    .back-img{
        opacity: .5;
        overflow:hidden;
        border-radius:100%;
        height:100%;
        width:90%;
        margin: 0 auto;
    }
    img{
        width:100%;
    }
    body{
        font-family: monospace;
        overflow: hidden;
    }
    .bg-blue {
        background: #28328C;
    }

    .bg-yellow {
        background: #ddd;
    }

    .text-white {
        color: #fff;
    }
    .sent-message p,.recieved-message p{
        margin:0;
    }
    .sent-message {
        background:#9BB7EE;
        padding: 6px 13px;
        margin: .3rem 0;
        color: #fff;
        border-radius: 12px 0 12px 12px;
        min-width: fit-content!important;
        max-width: fit-content!important;
        align-self:flex-end;
        font-size: 1rem;
        position:relative;
    }
    .sent-message::after{
        content: '';
        position:absolute;
        width:10px;
        height:10px;
        top:0;
        right:-10px;
        background:#9BB7EE;
        clip-path: polygon(0 0, 0 86%, 100% 0);
    }
    .recieved-message {
        background: #fff;
        padding: 6px 13px;
        margin: .3rem 0;
        border-radius: 0 12px 12px 12px;
        min-width: fit-content!important;
        max-width: fit-content!important;
        font-size: 1rem;
        color:#333;
        position:relative;
    }
    .recieved-message::before{
        content: '';
        position:absolute;
        width:10px;
        height:10px;
        top:0;
        left:-9px;
        background:#fff;
        clip-path: polygon(0 0, 100% 86%, 100% 0);
    }
    .blue{
        background: blue!important;
    }
    .home-img
    {
        width:15%;
        height: 10%;
        overflow: hidden;
        position:absolute;
        top: 1.5%;
        left: 50%;
        transform:translateX(-50%);
        z-index:999;
    }
    .text-send-wrapper{
        display:flex;
        padding: 12px 40px 15px 40px;

        width:100%;
        height:10%;
        background:#efefef;
    }
    #message{
        height:80%;
        overflow-y: scroll;
        overflow-x: hidden;
        padding: 0 3rem;
        display:flex;
        flex-direction:column;
        background-image: url({{asset('assets/images/chat/chat-back.png')}});
    }
    .text-field{
        border:none;
        border-radius:50px;
        width:70%;
        margin-right:15px;
        padding-left:15px;
    }
    ::-webkit-scrollbar {
        width: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius:5px;
    }
    ::-webkit-scrollbar-thumb {
        border-radius:5px;
        background: #aaa;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #888;
    }
    #index{
        width: 40px;
        height: 40px;
        line-height: 40px;
        color:#fff;
        text-align: center;
        position:absolute;
        top:25px;
        right:5%;
        border-radius:50%;
        z-index: 99999;
        background-color: blue;
    }
</style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( "#index" ).draggable({ containment: "#content", scroll: false });
        var receiver_id = -1;
        id = {{auth()->user()->id}};
        var readArr =[];
        function setChat(){
            $("#message").html('');
            let route = "{{route('chat.set')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id': id,
                    'receiver_id': receiver_id
                },
                dataType : 'json',
                success: function(success){
                    let j=0;
                    if(success[0]){
                        $('#name').html(success[1].name);
                        for(let i=0;i<success[0].length;i++){

                            if(success[0][i]['id'+id]=='sent-message' && success[0][i]['read']=='false'){
                                $("#message").append(`
                                    <div class="${success[0][i]['id'+id]}">
                                        <p>${success[0][i]['msg']}</p>
                                    </div>
                                `);
                            }else if(success[0][i]['id'+id]=='recieved-message'){
                                if(success[0][i]['read']=='false')
                                {
                                    readArr[j++] = i;
                                }
                                $("#message").append(`
                                    <div class="${success[0][i]['id'+id]}">
                                        <p>${success[0][i]['msg']}</p>
                                    </div>
                                `);

                            }else if(success[0][i]['id'+id]=='sent-message' && success[0][i]['read']=='true'){
                                $("#message").append(`
                                    <div class="${success[0][i]['id'+id]} blue">
                                        <p>${success[0][i]['msg']}</p>
                                    </div>
                                `);

                            }
                        }
                    }
                    updateFile();
                }
            });
        }
        function updateFile(){
            let route = "{{route('chat.update')}}";
            $.ajax({
                url:route,
                method:"POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id':id,
                    'msg':'none',
                    'receiver_id':receiver_id,
                    'arr':readArr,
                    'ack':'true'
                },
                dataType:'json',
                success:function(success){

                    $('#message').scrollTop($('#message')[0].scrollHeight);
                }
            });
        }
        $('.li').click(function(){
            $('.back-img').addClass('d-none');
            $('.home-img').addClass('d-none');
            $('.chat-right').removeClass('d-none');
            receiver_id = $(this).attr('id');
            // alert(receiver_id);
            setChat();
            Echo.private(`online.${id}.${receiver_id}`)
            .listenForWhisper('typing', (e) => {
                console.log("tyhpikfnds");
                if(e.typing){
                    $("#sender-status").html(
                        "Typing..."
                    );
                }
                setTimeout(function(){
                    $("#sender-status").html(
                        "Online"
                    );
                },1000);
            });
            Echo.join('chat')
            .here((users)=>{
                console.log(users);
                let flag =0;
                users.forEach(element => {
                    if(flag == 0){
                        if(element.id == receiver_id){
                            $("#sender-status").html(
                                "Online"
                            );
                            flag = 1;
                        }else{
                            $("#sender-status").html(
                                ""
                            );
                        }
                    }
                });
                // alert('here');
            })
            .joining((user)=>{
                // alert(user.name);
                if(user.id == receiver_id){
                    $("#sender-status").html(
                        "Online"
                    );
                }
            })
            .leaving((user)=>{
                // alert(user.name);
                if(user.id == receiver_id){
                    $("#sender-status").html(
                        ""
                    );
                }
            })
            // alert(`online.${id}.${receiver_id}`);
            Echo.private(`online.${id}.${receiver_id}`)
            .listen('OnlineEvent',(e)=>{
                console.log(e);
                if(e.message[3]){
                    $('.sent-message').addClass('blue');
                }else{
                    $("#message").append(`
                        <div class='recieved-message'><p>${e.message[2]}</p></div>
                    `);
                    acknowledge();
                }

            });

            $("#input").keydown(function(){
            // alert(`${id}`);
                Echo.private(`online.${receiver_id}.${id}`)
                    .whisper('typing', {
                        typing: true
                    });
            });

        });
        $('#btn').click(function(e){

            e.preventDefault();

            let route = "{{route('chat.send')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id': id,
                    'msg': $("#input").val(),
                    'receiver_id': receiver_id
                },
                dataType : 'json',
                success: function(success){
                    var msg = $("#input").val();
                    $("#message").append(`
                        <div class="sent-message"><p>${msg}</p></div>
                    `);
                    $('#message').scrollTop($('#message')[0].scrollHeight);
                    $('#input').val('');
                }
            });
        });


        // alert(userId);


        // alert(`online.${userId}`);

        function acknowledge(){
            let route = "{{route('chat.received')}}";
            $.ajax({
                url:route,
                method:"POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id':id,
                    'msg':'none',
                    'receiver_id':receiver_id,
                    'ack':'true'
                },
                dataType:'json',
                success:function(success){
                    $('#message').scrollTop($('#message')[0].scrollHeight);
                }
            });

        }



    </script>
@endsection
