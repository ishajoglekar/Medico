<div id="index-nav">
    <div class="left">
        <div class="logo d-inline-block ">
            <a href=""><img src="{{asset('assets/images/logo/practo.png')}}" alt=""></a>
        </div>
        <div class="ml-3 d-inline-block" id="nav-sections">
            <a href="{{route('doctors.findDoctors')}}" class="active">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Doctors</p>
                    <p class="light-font">book an appointment</p>
                </h5>
            </a>
            <a href="{{route('index')}}">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Consult</p>
                    <p class="light-font">Consult with top doctors</p>
                </h5>
            </a>
            <a href="{{route('pharma.index')}}" class="">
                <h5 class="d-inline-block ml-4">
                    <p class="head">Pharmacy</p>
                    <p class="light-font">Medicines & health product</p>
                </h5>
            </a>
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
            <a href="{{route('login')}}" class="nav-login-btn">login/register</a>
        </div>
    </div>
</div>
