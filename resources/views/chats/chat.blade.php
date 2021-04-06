@extends('layouts.chat')
@section('title','Medico | Doctor Dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h3>Hello</h3>
            </div>
            <div class="col-md-10">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 bg-blue pb-2">
                        <div class="d-flex justify-content-start mt-4"><div style="width: 30px;height:30px;border-radius:100%;background:#fff;" class="mr-3"></div><h3 class="text-white mt-1">John Doe</h3></div>
                        <h5 class="text-white" id="sender-status" style="margin-left:4rem;">Online</h5>
                    </div>
                </div>
                </div>

                <div class="container-fluid">
                <div class="sent-message">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic, quisquam.</p>
                </div>

                <div class="recieved-message p-1 m-0">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic, quisquam.</p>
                </div>

                <div class="sent-message">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic, quisquam.</p>
                </div>
                    <br><br>
                </div>

                <div class="container-fluid">
                    <div class="row" style="position: fixed; bottom:2rem; width:90vw;">
                        <div class="col-md-10"> <input type="text" placeholder="Enter your message" class="form-control p-2" style="font-size: 1.3rem;padding:2rem"></div>
                        <div class="col-md-2"> <input type="submit" class="form-contol btn btn-primary bg-yellow pt-3 pb-3 pl-4 pr-4" style="font-size: 1.3rem;" value="Send"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-level-styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/css/global.css')}}">
@endsection
@section('page-level-scripts')
    <script>
        // id = {{auth()->user()->id}};
        // alert(userId);
        id=16;
        Echo.join('chat')
        .here((users)=>{
            console.log(users);

            users.forEach(element => {
                if(element.id == id){
                    $(".profile-name").append(
                        `<p>
                            Online
                        </p>`
                    )
                }
            });
            alert('here');
        })
        .joining((user)=>{
            alert(user.name);
            if(user.id == id){
                $(".profile-name").append(
                    `<p>
                        Online
                    </p>`
                )
            }
        })
        .leaving((user)=>{
            alert(user.name);
            if(user.id == id){
                $(".profile-name").html(
                    `<p>
                        Offline
                    </p>`
                )
            }
        });

        Echo.private(`online.17`)
        .listen('OnlineEvent',(e)=>{
            console.log(e);
            $(".message").append(`
                <p>${e.message[1]}</p>
            `);
            // alert('listen');
        })
        .listenForWhisper('typing', (e) => {
            console.log("tyhpikfnds");
            if(e.typing){
                $(".profile-name").html(
                    `<p>
                        Typing...
                    </p>`
                );
            }
            setTimeout(function(){
                $(".profile-name").html(
                    `<p>
                        Online
                    </p>`
                )
            },1000);
        });

        $('#btn').click(function(e){
            // alert("{{auth()->user()->id}}");
            e.preventDefault();
            let route = "{{route('chat.send')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id': id,
                    'msg': $("#send").val()
                },
                dataType : 'json',
                success: function(success){
                    alert('sent');
                }
            });
        });
        $("#send").keydown(function(){
            // alert("pressde");
            Echo.private('online.17')
                .whisper('typing', {
                    typing: true
                });
        });
    </script>
@endsection
