<div id="index-nav">
    <div class="left">
        <div class="logo d-inline-block ">
            <a href=""><img src="{{asset('assets/images/logo/practo.svg')}}" alt=""></a>
        </div>
        <div class="ml-3 d-inline-block" id="nav-sections">
        <a href="{{route('doctors.findDoctors')}}" class="{{$section=='doctors' ? 'active' : ''}}" id="doctors">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Doctors</p>
                    <p class="light-font">book an appointment</p>
                </h5>
            </a>
            <a href="{{route('index')}}" id="consult" class="{{$section=='consult' ? 'active' : ''}}">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Consult</p>
                    <p class="light-font">Consult with top doctors</p>
                </h5>
            </a>
            <a href="{{route('pharma.index')}}" id="pharma" class="{{$section=='pharma' ? 'active' : ''}}">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Pharmacy</p>
                    <p class="light-font">Medicines & health product</p>
                </h5>
            </a>
            {{-- <a href="{{route('doctors.findDoctors')}}" class="">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Diagnostic</p>
                    <p class="light-font">book test & checkups</p>
                </h5>
            </a> --}}
        </div>
    </div>
    <div class="d-flex justify-content-between" id="nav-settings">
        <div class="d-flex" id="for-provider-nav">
            <p>For Providers</p>  <i class="py-1 ml-2 fa fa-chevron-down" aria-hidden="true"></i>
        </div>
        <div class="d-flex ml-4">
            <p>Security & Help</p>  <i class="py-1 fa fa-chevron-down ml-2" aria-hidden="true"></i>
        </div>
        <div class="d-flex ml-4">
            <!--<p>chintan</p>-->
            @if(!auth()->check())
                <a href="{{route('login')}}" class="nav-login-btn">Login</a>
            @else
                <a href="{{route('login')}}" class="nav-login-btn mr-2">Dashboard</a>
                <form action="{{route('logout',auth()->user()->id)}}" method="POST">
                    @csrf
                <button type="submit" class="nav-login-btn">Logout</button></form>
            @endif
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>

    // alert($('#doctors'));
    $('#doctors').click(function(){

    });
    $('#pharma').click(function(){

    });
    $('#consult').click(function(){

    });
</script>
