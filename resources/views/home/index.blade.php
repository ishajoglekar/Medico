<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#28328c">
  <link rel="preload" as="style" href="nav/9.5.1/consumer/css/practonav.css" />
  <link rel="preload" as="script" href="nav/9.5.1/consumer/js/practonav.js" />
  <link rel="canonical" href="index.html" />
  <link rel="icon" href="favicon.ico" />

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/user/navbar.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
  <link href="{{asset('dashboard/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
  {{-- <link rel="stylesheet" href="{{asset('path/to/font-awesome/css/font-awesome.min.css')}}"> --}}
  <title>
  Medico | Video Consultation with Doctors, Book Doctor Appointments, Order Medicine, Diagnostic Tests
  </title>
  <meta name="description"
    content="Say Hello to India’s top doctors via video consultation, get digital prescriptions, order medicines, book doctor appointments &amp; lab tests, find doctors near you, get health packages, ask a free health question to doctors">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('dashboard/css/modal.css')}}">

  <style>
    #chat{

        position:fixed;
        width: 40px;
        height: 40px;
        line-height: 40px;
        color:#fff;
        text-align: center;
        top:15%;
        right:1%;
        border-radius:50%;
        z-index: 99999;
        background-color: blue;
    }
  </style>
</head>

<body>
    <a id="chat" href="{{route('send')}}">
        <i class="fa fa-comment"></i>
    </a>
  <div id="root" style="margin-top: 5rem">
    <div>
      <div>
        @include('layouts.for-providers')
        @include('partials._header')
        <div class="banner"><a href="#"><span class="LazyLoad">
            <img src="https://www.practostatic.com/consumer-home/desktop/images/1597423628/banner.png" alt="Download Medico App Banner" class="banner__img">
        </span></a></div>
        <div class="">
          <div class="s-static">
            <div class="content u-d__flex">
              <div class="u-margin--15__top pos ">
                <div class="u-margin--20__top">
                  <div class="s-static__card u-margin--10__right">
                    <div class="card--560 u-margin--15__right" style="margin: 0!important">
                      <div class="card__img--580x225"><a
                          href="mumbai/doctors154c.html?utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=core"><span
                            class="LazyLoad">
                            <img src="https://www.practostatic.com/consumer-home/desktop/images/1597423628/find-doctors-2.png" alt="Find Doctors" class="card__img">
                        </span></a></div>
                    </div>
                  </div>
                  <div class="s-static__card u-margin--10__right u-margin--10__left">
                    <div class="card--560 u-margin--15__right">
                      <div class="card__img--580x225"><a
                          href="{{route('users.chatAppointment')}}"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1597423628/doctor-online.png" alt="Consult Online" class="card__img"></span></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-margin--60__top">
          <div class="s-carousel" style="background-color:#28328c">
            <div class="content content__padding">
              <div class="s-carousel__header">
                <div>
                  <h2 class="u-font--24 u-margin--0 u-font--bold c-header--offer">How Medico is Helping India Fight
                    COVID-19</h2>
                </div>
                <div class="cta">
                  <div class="u-t-c--blue_6 u-font--16 "><a class="u-font--bold u-t-link" href="#"></a></div>
                </div>
              </div>
              <div class="s-carousel__cards">
                <div class="u-d__flex c-flex--space-between">
                  <div class="u-margin--10__left u-margin--10__right outline-none">
                    <div class="card--360">
                      <div class="card__img--360x449"><a
                          href="plus/plan-details/retail-promo-plans-2acf4.html?utm_source=banner&amp;utm_medium=web&amp;campaign=new_practo_home"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/subscriptions/upsell/PH/covid_19_home_page_159003888598.png" alt="Get unlimited online consultations" class="card__img" style="background-color: transparent;"></span></a></div>
                    </div>
                  </div>
                  <div class="u-margin--10__left u-margin--10__right outline-none">
                    <div class="card--360">
                      <div class="card__img--360x449"><a
                          href="https://www.swasth.app/home?utm_source=practo&amp;utm_medium=web&amp;utm_campaign=big_launch_swasth"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1588237256/swasth-card-2.png" alt="Swasth Banner" class="card__img" style="background-color: transparent;"></span></a></div>
                    </div>
                  </div>
                  <div class="u-margin--10__left u-margin--10__right outline-none">
                    <div class="card--360">
                      <div class="card__img--360x449"><a
                          href="coronavirus/indiahealthhour39b2.html?utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=explore"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1588237256/coronavirus.png" alt="Coronavirus" class="card__img" style="background-color: transparent;"></span></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-margin--60__top">
          <div class="s-static">
            <div class="content u-d__flex">
              <div class="u-margin--15__top pos ">
                <h2 class="u-font--24 u-margin--0 u-font--bold u-margin--15__top">Consult top doctors online for any
                  health concern</h2>
                <div class="u-t-c--black_1 u-font--14 u-margin--5__top">Private online consultations with verified
                  doctors in all specialists</div><button type="button" class="btn btn-primary btn_small pos-abs">View
                  All Specialities</button>
                <div class="u-margin--20__top">
                  <div class="s-static__card ">
                    <div class="card card--180 c-padding--30 u-t-center u-margin--5"><a
                        href="consult/direct/new_consultationf38b.html?id=16&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"
                        class="card-link"></a>
                      <div class="card__img--120x120"><a
                          href="consult/direct/new_consultationf38b.html?id=16&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/consult/consult-home/symptoms_icon/irregular-painful+period.png" alt="Period doubts or Pregnancy" class="card_img"></span></a></div>
                      <div class="u-t-c--black_1 u-font--14 u-font--bold u-margin--12__top">Period doubts or Pregnancy
                      </div>
                      <div class="u-margin--10__top u-font--12 u-t-c--black_1 u-t-uppercase u-t-c--blue_6 u-font--bold">
                        CONSULT NOW</div>
                    </div>
                  </div>
                  <div class="s-static__card ">
                    <div class="card card--180 c-padding--30 u-t-center u-margin--5"><a
                        href="consult/direct/new_consultatione85d.html?id=5&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"
                        class="card-link"></a>
                      <div class="card__img--120x120"><a
                          href="consult/direct/new_consultatione85d.html?id=5&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/consult/consult-home/symptoms_icon/Acne.png" alt="Acne, pimple or skin issues" class="card_img"></span></a></div>
                      <div class="u-t-c--black_1 u-font--14 u-font--bold u-margin--12__top">Acne, pimple or skin issues
                      </div>
                      <div class="u-margin--10__top u-font--12 u-t-c--black_1 u-t-uppercase u-t-c--blue_6 u-font--bold">
                        CONSULT NOW</div>
                    </div>
                  </div>
                  <div class="s-static__card ">
                    <div class="card card--180 c-padding--30 u-t-center u-margin--5"><a
                        href="consult/direct/new_consultationa5e6.html?id=14&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"
                        class="card-link"></a>
                      <div class="card__img--120x120"><a
                          href="consult/direct/new_consultationa5e6.html?id=14&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"><span
                            class="LazyLoad"><img src="https://www.practo.com/consult/static/images/top-speciality-sexology.svg" alt="Performance issues in bed" class="card_img"></span></a></div>
                      <div class="u-t-c--black_1 u-font--14 u-font--bold u-margin--12__top">Performance issues in bed
                      </div>
                      <div class="u-margin--10__top u-font--12 u-t-c--black_1 u-t-uppercase u-t-c--blue_6 u-font--bold">
                        CONSULT NOW</div>
                    </div>
                  </div>
                  <div class="s-static__card">
                    <div class="card card--180 c-padding--30 u-t-center u-margin--5"><a
                        href="consult/direct/new_consultationfb2c.html?id=22&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"
                        class="card-link"></a>
                      <div class="card__img--120x120"><a
                          href="consult/direct/new_consultationfb2c.html?id=22&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/consult/consult-home/symptoms_icon/coughing.png" alt="Cold, cough or fever" class="card_img"></span></a></div>
                      <div class="u-t-c--black_1 u-font--14 u-font--bold u-margin--12__top">Cold, cough or fever</div>
                      <div class="u-margin--10__top u-font--12 u-t-c--black_1 u-t-uppercase u-t-c--blue_6 u-font--bold">
                        CONSULT NOW</div>
                    </div>
                  </div>
                  <div class="s-static__card ">
                    <div class="card card--180 c-padding--30 u-t-center u-margin--5"><a
                        href="consult/direct/new_consultation63b8.html?id=17&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"
                        class="card-link"></a>
                      <div class="card__img--120x120"><a
                          href="consult/direct/new_consultation63b8.html?id=17&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"><span
                            class="LazyLoad"><img src="https://www.practo.com/consult/static/images/top-speciality-pediatric.svg" alt="Child not feeling well" class="card_img"></span></a></div>
                      <div class="u-t-c--black_1 u-font--14 u-font--bold u-margin--12__top">Child not feeling well</div>
                      <div class="u-margin--10__top u-font--12 u-t-c--black_1 u-t-uppercase u-t-c--blue_6 u-font--bold">
                        CONSULT NOW</div>
                    </div>
                  </div>
                  <div class="s-static__card">
                    <div class="card card--180 c-padding--30 u-t-center u-margin--5"><a
                        href="consult/direct/new_consultationbfcc.html?id=2&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"
                        class="card-link"></a>
                      <div class="card__img--120x120"><a
                          href="consult/direct/new_consultationbfcc.html?id=2&amp;utm_source=consumer-home&amp;utm_medium=web&amp;utm_campaign=top_symptoms"><span
                            class="LazyLoad"><img src="https://www.practostatic.com/acred/search-assets/2/12-mental-wellness.png" alt="Depression or anxiety" class="card_img"></span></a></div>
                      <div class="u-t-c--black_1 u-font--14 u-font--bold u-margin--12__top">Depression or anxiety</div>
                      <div class="u-margin--10__top u-font--12 u-t-c--black_1 u-t-uppercase u-t-c--blue_6 u-font--bold">
                        CONSULT NOW</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-margin--60__top">
          <div class="s-carousel" style="background-color:">
            <div class="content ">
              <div class="s-carousel__header">
                <div>
                  <h2 class="u-font--24 u-margin--0 u-font--bold ">Book an appointment for an in-clinic consultation
                  </h2>
                  <div class="u-font--16 u-margin--5__top">Find experienced doctors across all specialties</div>
                </div>
                <div class="cta">
                  <div class="u-t-c--blue_6 u-font--16 "><a class="u-font--bold u-t-link" href="#"></a></div>
                </div>
              </div>
              <div class="s-carousel__cards">
                <div>
                  <div class="slick-slider slider variable-width slick-initialized" dir="ltr"><button type="button"
                      data-role="none" class="slick-arrow slick-prev slick-disabled" style="display:block">
                      Previous</button>
                    <div class="slick-list">
                      <div class="slick-track" style="width:0px;left:0px">
                        <div style="outline:none" data-index="0" class="slick-slide slick-active slick-current"
                          tabindex="-1" aria-hidden="false">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/dentist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/dentist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1558283618/sp-dentist@2x.jpg" alt="Dentist" class="card__img" style="background-color: rgb(215, 216, 226);"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Dentist</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Teething troubles? Schedule a dental checkup
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="1" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/gynecologist-obstetrician9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/gynecologist-obstetrician9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1558283618/sp-gynecologist@2x.jpg" alt="Gynecologist/Obstetrician" class="card__img" style="background-color: rgb(215, 216, 226);"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Gynecologist/Obstetrician
                                  </h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Explore for women’s health, pregnancy and
                                  infertility treatments</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="2" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/dietitian-nutritionist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/dietitian-nutritionist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1558283618/sp-dietitian@2x.jpg" alt="Dietitian/Nutrition" class="card__img" style="background-color: rgb(215, 216, 226);"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Dietitian/Nutrition</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Get guidance on eating right, weight management
                                  and sports nutrition</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="3" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/physiotherapist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/physiotherapist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1558283618/sp-physiotherapist@2x.jpg" alt="Physiotherapist" class="card__img" style="background-color: rgb(215, 216, 226);"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Physiotherapist</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Pulled a muscle? Get it treated by a trained
                                  physiotherapist</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="4" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/general-surgeon9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/general-surgeon9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"><img src="https://www.practostatic.com/consumer-home/desktop/images/1558283618/sp-general-surgeon@2x.jpg" alt="General surgeon" class="card__img" style="background-color: rgb(215, 216, 226);"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">General surgeon</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Need to get operated? Find the right surgeon
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="5" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/orthopedist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/orthopedist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Orthopedist</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">For Bone and Joints issues, spinal injuries and
                                  more</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="6" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/general-physician9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/general-physician9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">General physician</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Find the right family doctor in your neighborhood
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="7" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/pediatrician9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/pediatrician9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Pediatrician</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Child Specialists and Doctors for Infant</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div style="outline:none" data-index="8" class="slick-slide" tabindex="-1" aria-hidden="true">
                          <div>
                            <div class="u-margin--10__left u-margin--10__right outline-none" tabindex="-1"
                              style="width:100%;display:inline-block">
                              <div class="card card--280"><a
                                  href="mumbai/gastroenterologist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"
                                  class="card-link"></a>
                                <div class="card__img--280x200"><a
                                    href="mumbai/gastroenterologist9b5c.html?utm_source=consumer-home&amp;utm_medium=dweb"><span
                                      class="LazyLoad"></span></a></div>
                                <div class="u-margin--12__top">
                                  <h6 class="u-font--16 u-margin--0 u-font--bold card__header">Gastroenterologist</h6>
                                </div>
                                <div class="u-t-c--black_1 u-font--14">Explore for issues related to digestive system,
                                  liver and pancreas</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div data-role="none" class="slick-arrow slick-next" style="display:block" currentSlide="0"
                      slideCount="9">
                      <div class="carousel-navigation" style="height:200px">
                        <div class="pos-v-center">
                          <div class="carousel-navigation__round"><i class="icon-ic_next_cheveron pos-m-m"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="u-margin--60__top">
          <div class="s-slider">
            <div class="s-slider__content" style="background-color:#FFFFFF">
              <h3 class="u-margin--0 u-font--bold u-margin--30__bottom u-t-center u-font--30">What our users have to say
              </h3>
              <div>
                <div class="slick-slider slick-initialized" dir="ltr">
                  <div data-role="none" class="slick-arrow slick-prev" style="display:block" currentSlide="0"
                    slideCount="3">
                    <div class="carousel-navigation slider">
                      <div class="pos-v-center arrow-prev">
                        <div class="carousel-navigation-button prev"></div>
                      </div>
                    </div>
                  </div>
                  <div class="slick-list">
                    <div class="slick-track" style="width:700%;left:-100%">
                      <div data-index="-1" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true"
                        style="width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very good app. Well thought out about booking/rescheduling/canceling
                              an appointment. Also, Doctor&#x27;s feedback mechanism is good and describes all the
                              basics in a good way</div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Avinash Kumar</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1"
                        aria-hidden="false" style="outline:none;width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very helpful. Far easier than doing same things on computer. Allows
                              quick and easy search with speedy booking. Even maintains history of doctors visited.
                            </div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Amit Sharma</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-index="1" class="slick-slide" tabindex="-1" aria-hidden="true"
                        style="outline:none;width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very easy to book,maintain history. Hassle free from older versions
                              of booking appointment via telephone.. Thanks Medico for making it simple.</div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Jyothi Bhatia</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-index="2" class="slick-slide" tabindex="-1" aria-hidden="true"
                        style="outline:none;width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very good app. Well thought out about booking/rescheduling/canceling
                              an appointment. Also, Doctor&#x27;s feedback mechanism is good and describes all the
                              basics in a good way</div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Avinash Kumar</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-index="3" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true"
                        style="width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very helpful. Far easier than doing same things on computer. Allows
                              quick and easy search with speedy booking. Even maintains history of doctors visited.
                            </div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Amit Sharma</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-index="4" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true"
                        style="width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very easy to book,maintain history. Hassle free from older versions
                              of booking appointment via telephone.. Thanks Medico for making it simple.</div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Jyothi Bhatia</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-index="5" tabindex="-1" class="slick-slide slick-cloned" aria-hidden="true"
                        style="width:14.285714285714286%">
                        <div>
                          <div class="card-testimonial">
                            <div class="testimony">Very good app. Well thought out about booking/rescheduling/canceling
                              an appointment. Also, Doctor&#x27;s feedback mechanism is good and describes all the
                              basics in a good way</div>
                            <div class="u-margin--30__top"><i class="icon-ic_user_system user-icon"></i>
                              <div class="u-d__inline-block u-t-left u-v-middle u-margin--10__left">
                                <div class="user-name">Avinash Kumar</div>
                                <div class="user-time"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div data-role="none" class="slick-arrow slick-next" style="display:block" currentSlide="0"
                    slideCount="3">
                    <div class="carousel-navigation slider">
                      <div class="pos-v-center arrow-next">
                        <div class="next carousel-navigation-button"></div>
                      </div>
                    </div>
                  </div>
                  <div class="slick-dots">
                    <div class="carousel-dots">
                      <li class="slick-active"><button>1</button></li>
                      <li class=""><button>2</button></li>
                      <li class=""><button>3</button></li>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="c-footer">
          <div class="c-footer__wrapper">
            <div class="c-footer__content">
              <div class="c-footer__column">
                <div data-qa-id="footer-heading" class="c-footer__title"><span>Medico</span></div>
                <div><a data-qa-id="footer-item" target="_blank" class="c-footer__item" href="company/about.html"
                    rel=""><span>About</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="http://blog.practo.com/" rel=""><span>Blog</span></a><a data-qa-id="footer-item"
                    target="_blank" class="c-footer__item" href="https://practo.app.param.ai/jobs/"
                    rel=""><span>Careers</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="company/press.html" rel=""><span>Press</span></a><a data-qa-id="footer-item" target="_blank"
                    class="c-footer__item" href="company/contact.html" rel=""><span>Contact Us</span></a></div>
              </div>
              <div class="c-footer__column">
                <div data-qa-id="footer-heading" class="c-footer__title"><span>For patients</span></div>
                <div><a data-qa-id="footer-item" target="_self" class="c-footer__item" href="mumbai/doctors.html"
                    rel=""><span>Search for doctors</span></a><a data-qa-id="footer-item" target="_self"
                    class="c-footer__item" href="mumbai/clinics.html" rel=""><span>Search for clinics</span></a><a
                    data-qa-id="footer-item" target="_self" class="c-footer__item" href="mumbai/hospitals.html"
                    rel=""><span>Search for hospitals</span></a><a data-qa-id="footer-item" target="_self"
                    class="c-footer__item" href="tests.html" rel=""><span>Book Diagnostic Tests</span></a><a
                    data-qa-id="footer-item" target="_self" class="c-footer__item"
                    href="health-checkup-packages/master.html" rel=""><span>Book Full Body Checkups</span></a><a
                    data-qa-id="footer-item" target="_self" class="c-footer__item"
                    href="plus367f.html?utm_source=consumer_home&amp;utm_medium=web" rel=""><span>Medico
                      Plus</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="healthfeed.html" rel=""><span>Read health articles</span></a><a data-qa-id="footer-item"
                    target="_blank" class="c-footer__item" href="medicine-info.html" rel=""><span>Read about
                      medicines</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="drive.html" rel=""><span>Medico drive</span></a><a data-qa-id="footer-item" target="_blank"
                    class="c-footer__item" href="health-app.html" rel=""><span>Health app</span></a></div>
              </div>
              <div class="c-footer__column">
                <div class="c-footer__row">
                  <div data-qa-id="footer-heading" class="c-footer__title"><span>For doctors</span></div>
                  <div><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                      href="providers/doctors/profile.html" rel=""><span>Medico Profile</span></a></div>
                </div>
                <div class="c-footer__row">
                  <div data-qa-id="footer-heading" class="c-footer__title"><span>For clinics</span></div>
                  <div><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                      href="providers/clinics/ray.html" rel=""><span>Ray by Medico</span></a><a data-qa-id="footer-item"
                      target="_blank" class="c-footer__item" href="providers/clinics/reach.html" rel=""><span>Medico
                        Reach</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                      href="providers/clinics/ray/features.html#rayTab" rel=""><span>Ray Tab</span></a><a
                      data-qa-id="footer-item" target="_blank" class="c-footer__item" href="practo-pro-app.html"
                      rel=""><span>Medico Pro</span></a></div>
                </div>
              </div>
              <div class="c-footer__column">
                <div data-qa-id="footer-heading" class="c-footer__title"><span>For hospitals</span></div>
                <div><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="providers/hospitals/insta.html" rel=""><span>Insta by Medico</span></a><a
                    data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="providers/hospitals/qikwell.html" rel=""><span>Qikwell by Medico</span></a><a
                    data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="providers/hospitals/querent.html" rel=""><span>Querent by Medico</span></a><a
                    data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="providers/hospitals/profile.html" rel=""><span>Medico Profile</span></a><a
                    data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="providers/hospitals/reach.html" rel=""><span>Medico Reach</span></a><a
                    data-qa-id="footer-item" target="_blank" class="c-footer__item" href="https://drive.practo.com/"
                    rel=""><span>Medico Drive</span></a></div>
              </div>
              <div class="c-footer__column">
                <div data-qa-id="footer-heading" class="c-footer__title"><span>More</span></div>
                <div><a data-qa-id="footer-item" target="_blank" class="c-footer__item" href="https://help.practo.com/"
                    rel=""><span>Help</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="https://developers.practo.com/" rel=""><span>Developers</span></a><a data-qa-id="footer-item"
                    target="_blank" class="c-footer__item" href="company/privacy.html" rel=""><span>Privacy
                      Policy</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="company/terms.html" rel=""><span>Terms &amp; Conditions</span></a><a data-qa-id="footer-item"
                    target="_blank" class="c-footer__item" href="sitemap.html" rel=""><span>Healthcare
                      Directory</span></a><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="health-wiki/index.html" rel=""><span>Medico Health Wiki</span></a><a data-qa-id="footer-item"
                    target="_blank" class="c-footer__item" href="plus/corporate.html" rel=""><span>Corporate
                      Wellness</span></a></div>
              </div>
              <div class="c-footer__column">
                <div data-qa-id="footer-heading" class="c-footer__title"><span>Social</span></div>
                <div><a data-qa-id="footer-item" target="_blank" class="c-footer__item"
                    href="http://www.facebook.com/practo" rel="nofollow"><span>Facebook</span></a><a
                    data-qa-id="footer-item" target="_blank" class="c-footer__item" href="http://twitter.com/Practo"
                    rel="nofollow"><span>Twitter</span></a><a data-qa-id="footer-item" target="_blank"
                    class="c-footer__item" href="http://www.linkedin.com/company/practo-technologies-pvt-ltd"
                    rel="nofollow"><span>LinkedIn</span></a><a data-qa-id="footer-item" target="_blank"
                    class="c-footer__item" href="http://www.youtube.com/user/PractoSupport"
                    rel="nofollow"><span>Youtube</span></a><a data-qa-id="footer-item" target="_blank"
                    class="c-footer__item" href="http://github.com/practo" rel="nofollow"><span>Github</span></a></div>
              </div>
            </div>
            <div class="c-footer__copyright"><span class="LazyLoad"></span>
              <div class="c-copyright"><span>Copyright © 2017, Medico. </span><span>All rights reserved.</span></div>
            </div>
          </div>
        </footer>

    <script src="../www.practostatic.com/web-assets/home-dweb/javascripts/client.d5f121669c82.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( "#chat" ).draggable();

    </script>
  <script type="text/javascript">
    (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

    ga('create', window.__secrets.ga_tracking_id, 'auto');
    ga('create', window.__secrets.fabric_ga_tracking_id, 'auto', 'fabric');
    if (window.self === window.top) {
      ga('send', 'pageview');
      ga('fabric.send', 'pageview');
    }
  </script>

  <script async src=https://www.googletagmanager.com/gtag/js?id=DC-9535906></script>
  @include('layouts.modal-script')
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'DC-9535906');
    gtag('event', 'conversion', {
      'allow_custom_scripts': true,
      'send_to': 'DC-9535906/remar0/homep0+unique'
    });
    gtag('event', 'conversion', {
      'allow_custom_scripts': true,
      'send_to': 'DC-9535906/remar0/globa0+unique'
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>


</html>
