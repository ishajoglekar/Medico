<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Medico | Doctors</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('assets/css/user/navbar.css')}}">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/user/findDoctor/doctors.css')}}">
    </head>
<body>
<div id="app" class=" bg-white">
    <main>
        @include('partials.doctors-page-header')
    </main>
    <section id="location-filter" class="container p-4" style="margin-top: 5rem;">
        <div class="row">
            <div class="col-md-5 p-0 city-wrapper">
                <div class="d-flex">
                    <i class="fa fa-map-marker mx-1 mt-1" aria-hidden="true"></i>
                    <input type="text" id="city-search" placeholder="Search City">
                </div>
            </div>
            <div class="col-md-7 p-0 speciallity-wrapper">
                <div class="d-flex">
                    <i class="fa fa-search mx-1 mt-1" aria-hidden="true"></i>
                    <input type="text" id="speciallity-search" placeholder="Search Doctor, speciality">
                </div>
            </div>
        </div>
    </section>
            <section id="filters" class="d-flex">
                <div class="d-flex">
                    <div class="form-check mr-3 filter-box">
                        <input type="checkbox" class="form-check-input " id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Video Consult</label>
                    </div>
                    <div class="sort-by">
                        <div class="d-flex" style="height: 100%">
                            <p class="sortby mr-2" style="line-height:35px ">Sort By</p>
                            <select class="form-control form-control-sm filter-box dropdown" id="sort-by-filter" style="height: 100%">
                                <option value="none">  --SELECT--  </option>
                                <option value="HTL">Price High To Low</option>
                                <option value="LTH">Price Low To High</option>
                                <option value="exp">Years Of Experiance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <section id="list-doctors" class="container-fluid">
                <div class="row">
                    <div class="col-md-8 pl-5 pr-4">
                        <div class="heading pt-4">
                            <h3 class="filtered-count">Book from {{$doctors->count()}} Doctors in Mumbai</h3>
                            <p class="sub-title">With predicted wait-time & verified details</p>
                        </div>
                        <div id="doctors">
                            @foreach ($doctors as $doctor)
                                <div class="doctor">
                                    <div class="mt-5">
                                        <div class="doctor-listing-cards">
                                            <div class="listing-card-doctor ">
                                                <div class="doctor-details d-flex">
                                                    <div class="doctor-photo">
                                                        <div class="text-center">
                                                    @if($doctor->image)
                                                        <img
                                                            class="doctor-img"
                                                            src="{{asset('storage/'.$doctor->image)}}"/>
                                                    @else
                                                        <img data-qa-id="doctor-profile-image"
                                                            class="c-profile__image"
                                                            src="{{App\User::getAvatarAttribute($doctor->fullname,90)}} "/>
                                                        @endif

                                                        </div>
                                                        <div class="text-center"><a href="{{route('doctor.show',$doctor->id)}}" class="view-profile">View Profile</a></div>
                                                    </div>
                                                    <div class="doctor-info ml-4">
                                                        <a href="{{route('doctor.show',$doctor->id)}}">
                                                            <h2 class="doctor-name">{{$doctor->fullname}}</h2>
                                                        </a>
                                                        <div class="specialization"><span>{{$doctor->speciality->name}}</span></div>
                                                        <div class="experience-years"><span>{{$doctor->years_of_exp}} years experience overall</span></div>
                                                        <div class="address mt-2">
                                                            <span class="location">{{$doctor->city->name}}</span>
                                                            <span>•</span>
                                                            <span class="clinic-name">{{$doctor->establishment_name}}</span>
                                                        </div>
                                                        <div class="fees">
                                                            <span>{{$doctor->fees}} Consultation Fee at clinic</span>
                                                        </div>
                                                        <div class="doctor-page mt-2">
                                                            <a href=""><span class="likes"><i class="fa fa-thumbs-up"></i>&nbsp;97%</span></a>
                                                            <a href=""><span class="stories">22 Patient Stories</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="appointment-selection">
                                                        <p class="appointment-available"><i class="fa fa-clock-o"></i> Available Tomorrow</p>
                                                        <a href="{{route('doctor.show',$doctor->id)}}"><div class="btn book-appointment btn-primary text-center"><p class="book">Book Apointment</p><p class="booking-fee"> No Booking Fee</p></div></a>
                                                        <a href="{{route('doctor.show',$doctor->id)}}"><div class="btn video text-center">Video Consultation</div></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="location" class="col-md-4 p-0">
                        <div class="map">
                            <img src="{{asset('assets/images/map.png')}}" alt="">
                            <div class="overlay"></div>
                        </div>
                        <div class="location-filter">
                            <div class="location-details">
                                <h3 class="heading">Provide current location to see Dentist near you</h3>
                                <p class="sub-heading">You are seeing results from Thane. See results near you</p>
                                <div class="d-inline-block mt-3">
                                    <div class="btn locality text-center">Thane West</div>
                                    <div class="btn locality text-center">Kalyan City</div>
                                    <div class="btn locality text-center">Dombivli East</div>
                                    <div class="btn locality text-center">Ulhasnagar</div>
                                    <div class="btn locality  text-center">Vasai west</div>
                                </div>
                                <div class="search-buttons mt-2">
                                    <p class="d-inline-block search pl-5">Search location</p>
                                    <div class="btn current ml-5" id="current-location"><i class="fa fa-map-marker"></i>&nbsp;Current location</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(".all-filters").click(function(){
            $(".select-filter").removeClass('d-none').addClass('d-block');
        });
        $("#speciallity-search").focusout(function(){
            filterDoctors();
        });
        $("#city-search").focusout(function(){
            filterDoctors();
        });
        $("#city-search").keyup(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code == 13) { //Enter keycode
                filterDoctors();
            }
        });
        $("#speciallity-search").keyup(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code == 13) { //Enter keycode
                filterDoctors();
            }
        });
        $('#sort-by-filter').change(function(){
            filterDoctors();
        });
        $('#current-location').click(function(){
            var route = "{{ route('ajax.getCurrentLocation') }}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function(success){
                    $("#city-search").val(success);
                    filterDoctors();
                }
            });
        });
        function filterDoctors(){
            var city= $("#city-search").val();
            var spec= $("#speciallity-search").val();
            var sortBy = $('#sort-by-filter').val();
            var route = "{{ route('ajax.getDoctors') }}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'spec':spec,
                    'city':city,
                    'sort':sortBy
                },
                dataType: 'json',
                success: function(success){
                    if(success != "empty"){
                        var singleDoctorRoute = "";
                        var str = "";
                        for(var i=0 ; i<success.length ; i++){
                            if(success[i][0].image != null){
                                var path = window.origin+`/storage/${success[i][0].image}`;
                            }
                            singleDoctorRoute = "doctor/"+success[i][0].id;
                            str += `
                            <div class="doctor">
                                <div class="mt-5">
                                    <div class="doctor-listing-cards">
                                        <div class="listing-card-doctor">
                                            <div class="doctor-details d-flex">
                                                <div class="doctor-photo">
                                                    <div class="text-center"><img src="${path}" alt="" class="doctor-img"></div>
                                                    <div class="text-center"><a href="${singleDoctorRoute}" class="view-profile">View Profile</a></div>
                                                </div>
                                                <div class="doctor-info ml-4">
                                                    <a href="${singleDoctorRoute}">
                                                        <h2 class="doctor-name">${success[i][0].fullname}</h2>
                                                    </a>
                                                    <div class="specialization"><span>${success[i][2].name}</span></div>
                                                    <div class="experience-years"><span>${success[i][0].years_of_exp} years experience overall</span></div>
                                                    <div class="address mt-2">
                                                        <span class="location">${success[i][1].name}</span>
                                                        <span>•</span>
                                                        <span class="clinic-name">${success[i][0].establishment_name}</span>
                                                    </div>
                                                    <div class="fees">
                                                        <span>${success[i][0].fees} Consultation Fee at clinic</span>
                                                    </div>
                                                    <div class="doctor-page mt-2">
                                                        <a href=""><span class="likes"><i class="fa fa-thumbs-up"></i>&nbsp;97%</span></a>
                                                        <a href=""><span class="stories">22 Patient Stories</span></a>
                                                    </div>
                                                </div>
                                                <div class="appointment-selection">
                                                    <p class="appointment-available"><i class="fa fa-clock-o"></i> Available Tomorrow</p>
                                                    <a href="${singleDoctorRoute}"><div class="btn book-appointment btn-primary text-center"><p class="book">Book Apointment</p><p class="booking-fee"> No Booking Fee</p></div></a>
                                                    <a href="${singleDoctorRoute}}"><div class="btn video text-center">Video Consultation</div></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                        }
                    }
                    $("#doctors").html(str);
                }
            });
        }
    </script>
    </body>
</html>
