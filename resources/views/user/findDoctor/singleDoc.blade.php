@extends('layouts.no-header-app')
@section('content')
@include('partials._header')
<div id="root">
  <div id="container" data-reactroot="" style="margin-top: 5rem">
    <div></div>

    <div class="o-page-container">
      <span>
        <script nonce="WnNKWGGA21NKhnSAiHdkkxToI3fiDz2Z" type="application/ld+json">

        </script>
      </span>
      <div>
        <div class="pure-g u-spacer--top">
          <div class="pure-u-16-24">
            <div class="pure-g g-card">
              <div class="pure-u-4-24">
              @if($doctor->image != NULL)
              <img data-qa-id="doctor-profile-image"
                  class="c-profile__image"
                  src="{{asset('storage/'.$doctor->image)}}"/>
              @endif
              </div>
              <div class="pure-u-20-24">
                <div class="u-d-flex flex-jc-space-between">
                  <div>
                    <h1 data-qa-id="doctor-name" class="c-profile__title u-bold u-d-inlineblock">{{$doctor->fullname}}</h1>
                    <div class="u-d-inlineblock u-spacer--left-less">
                      <div><span data-for="React-tooltip-claim" data-tip="React-tooltip-claim"
                          class="u-grey_3-text u-bold u-t-hover-underline u-c-pointer">Profile is claimed</span>
                        <div class="__react_component_tooltip place-top type-dark " data-id="tooltip"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="c-profile--qualification">
                  <p class="c-profile__details" data-qa-id="doctor-qualifications">{{$degree[0]->name}}</p>
                  <div class="c-profile__details" data-qa-id="doctor-specializations">
                    <div class="u-d-inline-flex flex-ai-center">
                      <div><span class="c-profile__tag">AYUSH</span><span>
                          <h2 class="u-d-inlineblock u-spacer--right-v-thin c-profile__details">{{$speciality[0]->name}}</h2>
                        </span></div>
                    </div>
                    <h2>{{$doctor->years_of_exp}}
                      <!-- --> <span>Years Experience Overall</span><span>  (
                        <!-- -->{{$doctor->years_of_exp}}
                        <!-- --> years as specialist)</span></h2>
                  </div>
                </div>
                <div class="c-profile--verification">
                  <p class="c-profile__details"><i
                      class="icon-ic_done_solid_system u-green-text u-bold u-jumbo-font u-valign--middle"></i> <span
                      data-qa-id="doctor-verification-label" class="u-valign--middle"><span>Medical Registration
                        Verified</span></span></p>
                  <p class="c-profile__details" data-qa-id="doctor-patient-experience-score"><i
                      class="icon-ic_like_filled u-green-text u-bold u-jumbo-font"></i><span
                      class="u-green-text u-bold u-large-font">98%
                      <!-- --> </span><span class="u-smallest-font u-grey_3-text">(
                      <!-- -->943
                      <!-- --> <span>votes</span>)</span></p>
                </div>
                <div data-qa-id="doctor-summary">
                  <p class="c-profile__description">{{$doctor->description}}</p>
                </div>
                <div class="pure-g">
                  <div class="pure-u-17-24"></div>
                  <div class="u-t-right u-spacer--top pure-u-7-24"><a href="dr-a-kumar-sexologist-68099/feedback.html"
                      class="u-primary-text u-t-underline" data-qa-id="doctor-give-feedback"><span>Share your
                        story</span></a></div>
                </div>
              </div>
            </div>
            <div class="tabs react-tabs" data-tabs="true">
              <ul class="react-tabs__tab-list" role="tablist">
                <li data-qa-id="info-tab" class="react-tabs__tab react-tabs__tab--selected" role="tab"
                  id="react-tabs-573252" aria-selected="true" aria-disabled="false" aria-controls="react-tabs-573253"
                  tabindex="0"><span><span>Info</span></span></li>
                <li data-qa-id="feedback-tab" class="react-tabs__tab" role="tab" id="react-tabs-573254"
                  aria-selected="false" aria-disabled="false" aria-controls="react-tabs-573255">
                  <span><span>Stories</span>(353)</span></li>
                <li data-qa-id="consult-tab" class="react-tabs__tab" role="tab" id="react-tabs-573256"
                  aria-selected="false" aria-disabled="false" aria-controls="react-tabs-573257"><span><span>Consult
                      Q&amp;A</span></span></li>
                <li data-qa-id="healthfeed-tab" class="react-tabs__tab" role="tab" id="react-tabs-573258"
                  aria-selected="false" aria-disabled="false" aria-controls="react-tabs-573259">
                  <span><span>Healthfeed</span></span></li>
              </ul>
              <div class="react-tabs__tab-panel react-tabs__tab-panel--selected" role="tabpanel"
                id="react-tabs-573253" aria-labelledby="react-tabs-573252">
                <div>
                  <div class="c-profile--sections" id="info">
                    <div>
                      <div>
                        <div class="c-profile--clinic--item">
                          <div class="c-profile--clinic--item"><span></span>
                          <h4 class="c-profile--clinic__location" data-qa-id="clinic-locality">{{$establishmentCity}}</h4>
                            <div class="pure-g c-profile--clinic--details">
                              <div class="pure-u-1-3 u-cushion--right">
                                <h2><a href="../clinic/kaya-kalp-international-borivalid41d.html?"
                                    class="c-profile--clinic__name">{{$doctor->establishment_name}}</a></h2>
                                <div>
                                  <div class="u-pos-rel u-d-inlineblock " data-qa-id="star_rating" title="5">
                                    <div class="common__star-rating tooltip-hover"><span
                                        class="common__star-rating__value">5.0</span><span class=""><i
                                          class="icon-ic_star_solid"></i><i class="icon-ic_star_solid"></i><i
                                          class="icon-ic_star_solid"></i><i class="icon-ic_star_solid"></i><i
                                          class="icon-ic_star_solid"></i></span></div>
                                  </div>
                                </div>
                                <p class="c-profile--clinic__address" data-qa-id="clinic-address">{{$establishmentCity}}</p>
                                <p class="u-spacer--bottom-less u-spacer--small-top"><a target="_blank"
                                    class="c-profile--clinic__name u-x-base-font"
                                    href="http://www.google.com/maps/place/19.01895,72.84226"
                                    data-qa-id="get-directions"><span>Get Directions</span></a></p>
                                <div>
                                  <div>
                                    <div class="LazyLoad c-carousel__lazy" style="height:36px;width:36px"></div>
                                    <div class="LazyLoad c-carousel__lazy" style="height:36px;width:36px"></div>
                                    <div class="LazyLoad c-carousel__lazy" style="height:36px;width:36px"></div>
                                    <div class="LazyLoad c-carousel__lazy" style="height:36px;width:36px"></div><span
                                      class="c-carousel__more" data-qa-id="doctor-clinics-photo-more">+
                                      <!-- -->2</span>
                                  </div>
                                </div>
                              </div>
                              <div class="pure-u-1-3 u-cushion--left">
                                <div>
                                  <div>
                                    <div data-qa-id="timings_list">
                                      <p class="timings__days" data-qa-id="clinic-timings-day">
                                        <span><span>Mon</span></span><span>, <span>Wed</span> -
                                          <span>Sun</span></span></p>
                                      <p class="timings__time" data-qa-id="clinic-timings-session">
                                        <span><span>10:15</span> -
                                          <span>01:45</span></span><span><br /><span>02:00</span> -
                                          <span>08:00</span></span></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="pure-u-1-3">
                                <div class="u-no-margin--top"><span data-qa-id="consultation_fee" class="">₹
                                    <!-- -->{{$doctor->fees}}</span> <span><i class="icon-ic_info u-large-font  u-hide"
                                      data-for="React-tooltip-free" data-tip="React-tooltip"></i>
                                    <div class="__react_component_tooltip place-top type-dark " data-id="tooltip">
                                    </div>
                                  </span>
                                  <div class="u-spacer--top" data-qa-id="online-payment"><i
                                      class="icon-ic_card u-base-font"></i><span>Online Payment Available</span></div>
                                </div>
                                <div class="u-spacer--top">
                                  <div class="">
                                    <div class="u-purple-text"><span
                                        class="u-c-pointer u-t-hover-underline u-bold o-media--middle u-purple-text">Prime</span><i
                                        class="icon-ic_done_badge u-jumbo-font u-pos-rel icon--no-margin icon--top-push"></i>
                                    </div>
                                    <div data-qa-id="wait_time" class="u-purple-text"><span>Max. 15 mins wait +
                                        Verified details</span></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="c-profile--clinic__cta">
                              <div class="c-profile--clinic__cta-action"><button
                                  class="u-t-capitalize u-bold c-btn--dark-medium" data-qa-id="book_button"><span
                                    class="icon-ic_instant_filled u-large-font"></span><span>Book Appointment</span>
                                  <div class="u-xx-small-font"><span>Instant Pay Available</span></div>
                                </button></div>
                            </div>
                            <div class="u-spacer--top"></div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  {{--  --}}
                  <div class="d-none" id="stories">
                    <div class="c-profile--sections">
                      <h2 data-qa-id="doctor-info-feedback" class="c-profile--feedback_heading"><span>Patient Stories
                          for</span> <!-- -->Dr. A. Kumar</h2>
                    </div>
                    <div class="u-separator"></div>
                    <div class="c-profile--sections">
                      <div class="feedback--list-container">
                        <div>
                          <div class="pure-g feedback--item u-cushion--medium-vertical" data-qa-id="feedback_item">
                            <div class="pure-u-2-24">
                              <div class="feedback__icon" data-qa-id="reviewer-image"
                                style="background-color:#C8FAC8">S</div>
                            </div>
                            <div class="pure-u-22-24 u-lheight-default">
                              <div>
                                <div class="u-cushion--bottom u-color--grey3 u-cushion--small-top"><span
                                    class="u-bold" data-qa-id="reviewer-name">S
                                    <!-- -->hree</span> <span class="u-bold">(<span>Verified</span>)</span><span
                                    data-qa-id="web-review-time" class="u-spacer--left-thin u-f-right">12
                                    <!-- --> <span>days ago</span> </span></div>
                              </div>
                              <div class="feedback__body">
                                <p class="feedback__content u-cushion--bottom u-title-font u-bold"
                                  data-qa-id="visited-for"><span><span>Visited For</span> </span><span
                                    class="procedure">Covid 19</span></p>
                                <div class="u-cushion--small-bottom u-large-font"><i
                                    class="u-large-font  u-cushion--small-right icon-ic_like"
                                    data-qa-id="feedback_thumbs_up"></i><span>I recommend the doctor</span></div>
                                <p class="feedback__content u-cushion--small-bottom u-large-font"
                                  data-qa-id="happy-with"><span><span>Happy with:</span> </span><span
                                    class="feedback__context">Doctor friendliness</span><span
                                    class="feedback__context">Explanation of the health issue</span><span
                                    class="feedback__context">Treatment satisfaction</span><span
                                    class="feedback__context">Value for money</span><span
                                    class="feedback__context">Wait time</span></p>
                                <div>
                                  <p class="feedback__content u-large-font u-d-inline" data-qa-id="review-text">I was
                                    </p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="pure-g feedback--item u-cushion--medium-vertical" data-qa-id="feedback_item">
                            <div class="pure-u-2-24">
                              <div class="feedback__icon" data-qa-id="reviewer-image"
                                style="background-color:#C8FAC8">R</div>
                            </div>
                            <div class="pure-u-22-24 u-lheight-default">
                              <div>
                                <div class="u-cushion--bottom u-color--grey3 u-cushion--small-top"><span
                                    class="u-bold" data-qa-id="reviewer-name">R
                                    <!-- -->ishabh Gupta</span> <span
                                    class="u-bold">(<span>Verified</span>)</span><span data-qa-id="web-review-time"
                                    class="u-spacer--left-thin u-f-right">13
                                    <!-- --> <span>days ago</span> </span></div>
                              </div>
                              <div class="feedback__body">
                                <p class="feedback__content u-cushion--bottom u-title-font u-bold"
                                  data-qa-id="visited-for"><span><span>Visited For</span> </span><span
                                    class="procedure"> Cold </span></p>
                                <div class="u-cushion--small-bottom u-large-font"><i
                                    class="u-large-font  u-cushion--small-right icon-ic_like"
                                    data-qa-id="feedback_thumbs_up"></i><span>I recommend the doctor</span></div>
                                <p class="feedback__content u-cushion--small-bottom u-large-font"
                                  data-qa-id="happy-with"><span><span>Happy with:</span> </span><span
                                    class="feedback__context">Treatment satisfaction</span></p>
                                <div>
                                  <p class="feedback__content u-large-font u-d-inline" data-qa-id="review-text">Dr is
                                    the very good behaviour <span
                                      title="This part is not displayed  as it talks about medical ability of the doctor which is a matter that requires an expert opinion."
                                      id="blurrText51429" class="blurr-text"
                                      style="color: rgb(205, 205, 205); background-color: rgb(221, 221, 221);">*** *
                                      **** **** ********* ** ******* </span>I really thanks to doctor I am satisfy
                                    ,,,,, heartily big thanks to doctor</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="pure-g feedback--item u-cushion--medium-vertical" data-qa-id="feedback_item">
                            <div class="pure-u-2-24">
                              <div class="feedback__icon" data-qa-id="reviewer-image"
                                style="background-color:#E8FCA6">V</div>
                            </div>
                            <div class="pure-u-22-24 u-lheight-default">
                              <div>
                                <div class="u-cushion--bottom u-color--grey3 u-cushion--small-top"><span
                                    class="u-bold" data-qa-id="reviewer-name">V
                                    <!-- -->erified Patient</span> <span data-qa-id="web-review-time"
                                    class="u-spacer--left-thin u-f-right">12
                                    <!-- --> <span>days ago</span> </span></div>
                              </div>
                              
                            </div>
                          </div>
                       
                        </div>
                      </div>
                      <div class="u-border-general--thin-top u-cushion--top"><a data-qa-id="show-all-feedback"
                          href="dr-a-kumar-sexologist-68099/recommended.html" class="u-primary-text u-semi-bold">
                          <span>Show all stories</span> (
                          <!-- -->353
                          <!-- -->) </a></div>
                    </div>
                  </div>
                  {{--  --}}
                  <div class="u-cushion u-white-background d-none" id="consult">
                    <div data-qa-id="faq-section">
                      <h2 data-qa-id="hospital_faq" class="u-bold u-title-font u-cushion--bottom">Common questions
                        &amp; answers</h2>
                      <div class="u-separator"></div>
                      <div class="u-cushion--vertical">
                        <div data-qa-id="individual-faq">
                          <div>
                            <p class="u-bold u-large-font u-normal-text u-cushion--vertical-thin"
                              data-qa-id="faq-question">Q:
                              <!-- -->Where does Dr. A. Kumar practice?</p>
                            <div data-qa-id="faq-answer">
                              <p class="u-large-font u-normal-text u-cushion--vertical-thin"><span class="u-bold">A:
                                </span><span><span>Dr. A. Kumar practices at Kaya Kalp International Sex & Health
                                    Clinics - Dadar West, Kaya Kalp International - Dadar West, Kaya Kalp
                                    International Sex & Health Clinics - Borivali West. However, due to COVID-19 for
                                    non-emergency cases, we would encourage <a class="u-t-link"
                                      href='dr-a-kumar-sexologist-680993a77.html?utm_source=organic&amp;utm_campaign=faq-profile'>online
                                      consultation</a> on Medico.</span></span></p>
                            </div>
                          </div>
                          <div class="u-separator u-spacer--vertical"></div>
                        </div>
                        <div data-qa-id="individual-faq">
                          <div>
                            <p class="u-bold u-large-font u-normal-text u-cushion--vertical-thin"
                              data-qa-id="faq-question">Q:
                              <!-- -->How can I take Dr. A. Kumar&#x27;s appointment ?</p>
                            <div data-qa-id="faq-answer">
                              <p class="u-large-font u-normal-text u-cushion--vertical-thin"><span class="u-bold">A:
                                </span><span><span>You can check for Dr. A. Kumar's availability on Medico. Due to
                                    COVID-19 for non-emergency cases, we would encourage to <a class="u-t-link"
                                      href='dr-a-kumar-sexologist-680993a77.html?utm_source=organic&amp;utm_campaign=faq-profile'>consult
                                      your doctors online</a> through Medico.</span></span></p>
                            </div>
                          </div>
                          <div class="u-separator u-spacer--vertical"></div>
                        </div>
                        <div data-qa-id="individual-faq">
                          <div>
                            <p class="u-bold u-large-font u-normal-text u-cushion--vertical-thin"
                              data-qa-id="faq-question">Q:
                              <!-- -->Why do patients visit Dr. A. Kumar?</p>
                            <div data-qa-id="faq-answer">
                              <p class="u-large-font u-normal-text u-cushion--vertical-thin"><span class="u-bold">A:
                                </span><span><span>Patients frequently visit Dr. A. Kumar for Male Sexual Problems,
                                    Premature Ejaculation, Treatment Of Erectile Dysfunction. To see more reasons
                                    visit the <a class="u-t-link"
                                      href='dr-a-kumar-sexologist-680993a77.html?utm_source=organic&amp;utm_campaign=faq-profile'>doctor's
                                      profile</a> on Medico.</span></span></p>
                            </div>
                          </div>
                          <div class="u-separator u-spacer--vertical"></div>
                        </div>
                        <div data-qa-id="individual-faq">
                          <div>
                            <p class="u-bold u-large-font u-normal-text u-cushion--vertical-thin"
                              data-qa-id="faq-question">Q:
                              <!-- -->What is Dr. A. Kumar&#x27;s rating?</p>
                            <div data-qa-id="faq-answer">
                              <p class="u-large-font u-normal-text u-cushion--vertical-thin"><span class="u-bold">A:
                                </span><span><span>Dr. A. Kumar has been recommended by 926 patients and has recieved
                                    stories from 353 patients. You can <a class="u-t-link"
                                      href='dr-a-kumar-sexologist-68099/reviews3a77.html?utm_source=organic&amp;utm_campaign=faq-profile'>read
                                      detailed reviews</a> of the doctor on Medico.</span></span></p>
                            </div>
                          </div>
                          <div class="u-separator u-spacer--vertical"></div>
                        </div>
                        <div data-qa-id="individual-faq">
                          <div>
                            <p class="u-bold u-large-font u-normal-text u-cushion--vertical-thin"
                              data-qa-id="faq-question">Q:
                              <!-- -->What is Dr. A. Kumar&#x27;s education qualification?</p>
                            <div data-qa-id="faq-answer">
                              <p class="u-large-font u-normal-text u-cushion--vertical-thin"><span class="u-bold">A:
                                </span><span><span>Dr. A. Kumar has the following qualifications - MD - Alternate
                                    Medicine, BAMS. You can <a class="u-t-link"
                                      href='dr-a-kumar-sexologist-680993a77.html?utm_source=organic&amp;utm_campaign=faq-profile'>book
                                      the doctor</a> through the doctor's profile on Medico.</span></span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{--  --}}
                  <div class=" d-none" id="healthfeed">
                    <div class="c-profile--sections">
                      <div>
                        <div id="services" class="u-cushion--vertical p-entity " data-qa-id="doctor-services">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="services-heading"
                                class="u-bold "><span>Services</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold"
                              data-qa-id="entity-toggle"><span><span>View all</span> (
                                <!-- -->27
                                <!-- -->) </span></span>
                          </div>
                          <div class="p-entity--list">
                           
                            <div class="pure-u-1-3 u-cushion--right-less">
                              <div class="p-entity__item" data-qa-id="services-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Covid 19</span></span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="profile-entities">
                        <div id="specializations" class="u-cushion--vertical p-entity "
                          data-qa-id="doctor-specializations">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="specializations-heading"
                                class="u-bold "><span>Specializations</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold" data-qa-id="entity-toggle"></span>
                          </div>
                          <div class="p-entity--list">
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="specializations-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><a
                                    href="../ayurveda.html">Ayurveda</a></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="specializations-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><a
                                    href="../sexologist.html">Special Interest in Ayurveda</a></span></div>
                            </div>
                          </div>
                        </div>
                        <div id="awards and recognitions" class="u-cushion--vertical p-entity "
                          data-qa-id="doctor-awards">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="awards-heading" class="u-bold "><span>Awards
                                  and Recognitions</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold" data-qa-id="entity-toggle"></span>
                          </div>
                          <div class="p-entity--list">
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="awards-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>8 Medals &amp; Awards
                                    - 1988</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="awards-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Honoured with
                                    &#x27;Sarwashri&#x27; Award. - 1987</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="awards-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Ayurvedic Excellence
                                    Award. - 1984</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="awards-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Shield of Merit Award
                                    &amp; Rajiv Gandhi Gold Medal for Ayurveda Awards. - 1996</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="awards-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Also Honoured With
                                    Gold Medal For Doctor Of Millenium Award - 2001</span></span></div>
                            </div>
                          </div>
                        </div>
                        <div id="education" class="u-cushion--vertical p-entity " data-qa-id="doctor-educations">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="educations-heading"
                                class="u-bold "><span>Education</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold" data-qa-id="entity-toggle"></span>
                          </div>
                          <div class="p-entity--list">
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="educations-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>MD - Alternate
                                    Medicine - The Open International University of Complementary Medicines,
                                    1996</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="educations-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>BAMS - University of
                                    Pune, 1987</span></span></div>
                            </div>
                          </div>
                        </div>
                        <div id="memberships" class="u-cushion--vertical p-entity " data-qa-id="doctor-memberships">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="memberships-heading"
                                class="u-bold "><span>Memberships</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold" data-qa-id="entity-toggle"></span>
                          </div>
                          <div class="p-entity--list">
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="memberships-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Managing Director All
                                    India Institute of Research in Vedic Science.</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="memberships-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Ex -Member Royal
                                    College of General Practitioners (London)</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="memberships-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Ex - Member Royal
                                    Society of Health (England)</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="memberships-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Ex - Member Sexuality
                                    Information Education Council Of United States (America)</span></span></div>
                            </div>
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="memberships-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>Ex - Member Society
                                    for Scientific study of sex (U.S.A.)</span></span></div>
                            </div>
                          </div>
                        </div>
                        <div id="experience" class="u-cushion--vertical p-entity u-no-border"
                          data-qa-id="doctor-experience">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="experience-heading"
                                class="u-bold "><span>Experience</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold" data-qa-id="entity-toggle"></span>
                          </div>
                          <div class="p-entity--list">
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="experience-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>1989 - 2016 Doctor at
                                    Kaya Kalp International Health Clinics</span></span></div>
                            </div>
                          </div>
                        </div>
                        <div id="registrations" class="u-cushion--vertical p-entity u-no-border"
                          data-qa-id="doctor-registrations">
                          <div class="p-entity__heading">
                            <h2 class="u-d-inlineblock"><span data-qa-id="registrations-heading"
                                class="u-bold "><span>Registrations</span></span></h2><span
                              class="view-more u-t-link u-c-pointer u-bold" data-qa-id="entity-toggle"></span>
                          </div>
                          <div class="p-entity--list">
                            <div class="pure-u-1">
                              <div class="p-entity__item" data-qa-id="registrations-item"><span
                                  class="u-spacer--right-less p-entity__item-title-label"><span>18767 Central Council
                                    of Indian Medicine (CCIM), 1989</span></span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="react-tabs__tab-panel" role="tabpanel" id="react-tabs-573255"
                aria-labelledby="react-tabs-573254"></div>
              <div class="react-tabs__tab-panel" role="tabpanel" id="react-tabs-573257"
                aria-labelledby="react-tabs-573256"></div>
              <div class="react-tabs__tab-panel" role="tabpanel" id="react-tabs-573259"
                aria-labelledby="react-tabs-573258"></div>
            </div>
            <div class="u-separator"></div>
            <div class="u-cushion u-white-background u-t-right">
              <div class="u-d-inlineblock"><span data-qa-id="report-an-error"
                  class="u-dark-red u-base-font u-no-outline u-c-pointer"><span>Report an Error</span></span>
                <div></div>
              </div>
            </div>
          </div>
          <div class="pure-u-8-24 right-panel-section">
            <div class="right-panel-wrapper">
              <div class="sticky-outer-wrapper">
                <div class="sticky-inner-wrapper" style="position:relative;top:0px">
                  <div>
                    <div class="book-appointment-panel mb-4">
                      <div class="u-cushion--rectangle">
                        <div class="u-spacer--small-bottom u-spacer--top-less">
                          <div class="clinic-switcher">
                            <div>
                              <div class="u-d-flex flex-jc-space-between">
                                <div class="u-bold u-base-font u-t-ellipsis">Video Consultation</div>

                              </div>
                              <div class="u-spacer--vertical-thin"><span class="u-spacer--right-thin">5<i
                                    class="icon-ic_star_solid u-spacer--small-left"></i></span><span
                                  class="u-spacer--right-thin">₹
                                  <!-- -->{{$doctor->fees}}</span></div>
                            </div>
                          </div>
                          <div class="u-spacer--top"></div>
                          <div style="border-top: #ccc 1px solid"></div>
                          <div class="slot-tabs">
                            <ul class="d-flex">
                                <li>
                                    <a href="#" class="slot-tabs-header todayVideo" id="first-slot">
                                        <span class="d-flex flex-column">
                                            <h5 style="color: #333;font-weight:700">Today</h5>
                                            {{-- <span>{{($videoSlots[$countVideo-1][1]-$videoSlots[$countVideo-1][2]) }} slot(s) available</span> --}}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="slot-tabs-header tomorrowVideo" id="second-slot">
                                        <span class="d-flex flex-column">
                                            <h5>Tommorrow</h5>
                                            {{-- <span>40 slot available</span> --}}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="slot-tabs-header dayAfterVideo" id="third-slot">
                                        <span class="d-flex flex-column">
                                            <h5>{{date('jS F', strtotime('+2 days'))}}</h5>
                                            {{-- <span>40 slot available</span> --}}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="slot-tabs-after">
                            </div>

                          </div>

                        </div>
                      </div>
                      <div>
                        <div class="appointment video">
                          <div class="slots-placeholder">
                            <div class="slot-tabs-timimg">

                                <div class="mb-2">
                                    @forelse ($videoSlots as $slot)
                                    {{-- {{dd($slot)}} --}}

                                            @if ($slot[1] == 1)
                                                <div class="slot-time slot-booked"><a href="#" onclick="return false;" title="Slot Booked">
                                                    {{date('h:i a', strtotime($slot[0]->start_time))}}</a>
                                                </div>
                                            @else
                                                <div class="slot-time"><a href="{{route('doctors.confirmAppointment',[$doctor->id,$slot[0]->id,"video"])}}" >
                                                    {{date('h:i a', strtotime($slot[0]->start_time))}}</a>
                                                </div>
                                            @endif
                                    @empty
                                    <div class="text-center">
                                        <img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                                        <p>No slots Available</p>
                                    </div>
                                    @endforelse
                                </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="book-appointment-panel ">
                        <div class="u-cushion--rectangle">
                          <div class="u-color--grey3 u-t-uppercase">Pick a time slot</div>
                          <div class="u-spacer--small-bottom u-spacer--top-less">
                            <div class="clinic-switcher">
                              <div>
                                <div class="u-d-flex flex-jc-space-between">
                                <div class="u-bold u-base-font u-t-ellipsis">{{$doctor->establishment_name}}</div>
                                  
                                </div>
                                <div class="u-spacer--vertical-thin"><span class="u-spacer--right-thin">5<i
                                      class="icon-ic_star_solid u-spacer--small-left"></i></span><span
                                    class="u-spacer--right-thin">₹
                                    {{$doctor->fees}}</span><span class="u-purple-text">Max 15 mins wait</span></div>
                              </div>
                            </div>
                            <div class="u-spacer--top"></div>
                            <div style="border-top: #ccc 1px solid"></div>
                            <div class="slot-tabs">
                              <ul class="d-flex">
                                  <li>
                                      <a href="#" class="todayClinic slot-tabs-header" id="first-slot-c">
                                          <span class="d-flex flex-column">
                                              <h5 style="color: #333;font-weight:700">Today</h5>
                                              {{-- <span>{{$clinicSlots[$countClinic-1][1]-$clinicSlots[$countClinic-1][2] }} slot(s) available</span> --}}
                                          </span>
                                      </a>
                                  </li>
                                  <li>

                                      <a href="#" class="tomorrowClinic slot-tabs-header" id="second-slot-c">
                                          <span class="d-flex flex-column">
                                              <h5 class="">Tommorrow</h5>
                                              {{-- <span>40 slot available</span> --}}
                                          </span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="#" class="dayAfterClinic slot-tabs-header" id="third-slot-c">
                                          <span class="d-flex flex-column">
                                            <h5>{{date('jS F', strtotime('+2 days'))}}</h5>
                                              {{-- <span>40 slot available</span> --}}
                                          </span>
                                      </a>
                                  </li>
                              </ul>
                              <div class="slot-tabs-after-c">
                              </div>

                            </div>

                          </div>
                        </div>
                        <div>
                            <div class="appointment clinic">
                                <div class="slots-placeholder">
                                  <div class="slot-tabs-timimg">
                                      <div class="mb-2">

                                        @forelse ($clinicSlots as $slot)
                                        {{-- {{dd($slot)}} --}}

                                                @if ($slot[1] == 1)
                                                    <div class="slot-time slot-booked"><a href="#" onclick="return false;" title="Slot Booked">
                                                        {{date('h:i a', strtotime($slot[0]->start_time))}}</a>
                                                    </div>
                                                @else
                                                    <div class="slot-time"><a href="{{route('doctors.confirmAppointment',[$doctor->id,$slot[0]->id,"video"])}}" >
                                                        {{date('h:i a', strtotime($slot[0]->start_time))}}</a>
                                                    </div>
                                                @endif
                                        @empty
                                            <div class="text-center">
                                                <img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                                                <p>No slots Available</p>
                                            </div>
                                        @endforelse
                                        </div>
                                      </div>
                                  </di-v>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="pure-g">
          <div class="pure-u-16-24">
            <div>
              <div class="c-sidebar--suggestions u-spacer--top u-spacer--bottom-less u-smallest-font u-grey_3-text ">
                <h4 class="u-section-title-font u-spacer--bottom-less" data-qa-id="popular-localities">
                  <!-- -->Top procedures in Mumbai
                  <!-- -->
                </h4><a data-qa-id="popular-localities-item" class="  u-grey_3-text u-cushion--small-vertical"
                  href="../d-c-dilation-and-curettage/procedure.html">D&amp;c (dilation And Curettage) in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../breast-implant/procedure.html">Breast Implant in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../deep-brain-stimulation-dbs/procedure.html">Deep Brain Stimulation (dbs) in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../tendon-repair/procedure.html">Tendon Repair in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../laser-piles-treatment/procedure.html">Laser Piles Treatment in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../vasectomy-reversal/procedure.html">Vasectomy Reversal in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../laparoscopic-myomectomy/procedure.html">Laparoscopic Myomectomy in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../jejunostomy/procedure.html">Jejunostomy in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../vascular-surgery/procedure.html">Vascular Surgery in Mumbai</a><a
                  data-qa-id="popular-localities-item"
                  class=" u-bullet-separated u-grey_3-text u-cushion--small-vertical"
                  href="../epilepsy-surgery/procedure.html">Epilepsy Surgery in Mumbai</a>
              </div>
            </div>
            <div class="u-cushion--vertical">
              <div>
                <h2 class="u-d-inlineblock u-cushion--bottom-less u-bold u-grey_3-text u-smallest-font"
                  data-qa-id="popular-searches">Top services in Mumbai</h2>
                <div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-fertilization.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Fertilization in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctor-for-plantar-fascitis.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctor For Plantar Fascitis in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-pap-smear.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Pap Smear in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctor-for-skin-allergies.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctor For Skin Allergies in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-giddiness.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Giddiness in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-laser-hair-removal.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Laser Hair Removal in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-dyslipidemia.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Dyslipidemia in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-kidney-stone-treatment.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Kidney Stone Treatment in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-hair-regrowth.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Hair Regrowth in Mumbai</h3>
                      </a></div>
                  </div>
                  <div class="u-d-inlineblock"><span class="u-spacer--left-less u-spacer--right-less">•</span>
                    <div class="u-d-inlineblock"><a href="../doctors-for-chickenpox-treatment.html"
                        data-qa-id="popular-searches-item" class="u-grey_3-text u-smallest-font u-c-pointer">
                        <h3>Doctors For Chickenpox Treatment in Mumbai</h3>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="o-page u-fill--dark-blue u-cushion--large-vertical c-footer ">
      <div class="o-page-container">
        <div class="u-spacer--medium-bottom">
          <div class="c-footer__column">
            <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>Medico</span></div>
            <div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../company/about.html"><span><span>About</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="#"><span><span>Blog</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="https://practo.app.param.ai/jobs/"><span><span>Careers</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../company/press.html"><span><span>Press</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../company/contact.html"><span><span>Contact Us</span></span></a></div>
            </div>
          </div>
          <div class="c-footer__column">
            <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>For patients</span></div>
            <div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_self"
                  href="../doctors.html"><span><span>Search for doctors</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_self"
                  href="../clinics.html"><span><span>Search for clinics</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_self"
                  href="../hospitals.html"><span><span>Search for hospitals</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../medicine-info.html"><span><span>Read about medicines</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../drive.html"><span><span>Medico drive</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../health-app.html"><span><span>Health app</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../plus4082.html?utm_source=topaz&amp;utm_medium=web"><span><span>Medico
                      Plus</span></span></a></div>
            </div>
          </div>
          <div class="c-footer__column">
            <div class="u-spacer--bottom">
              <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>For doctors</span></div>
              <div><a target="_blank" class="u-color--white u-d-block"
                  href="../../providers/doctors/consult.html"><span><span>Medico Consult</span></span></a><a
                  target="_blank" class="u-color--white u-d-block"
                  href="../../providers/doctors/health-feed.html"><span><span>Medico Healthfeed</span></span></a><a
                  target="_blank" class="u-color--white u-d-block"
                  href="../../providers/doctors/profile.html"><span><span>Medico Profile</span></span></a></div>
            </div>
            <div class="u-spacer--bottom">
              <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>For clinics</span></div>
              <div><a target="_blank" class="u-color--white u-d-block"
                  href="../../providers/prime.html"><span><span>Medico Prime</span></span></a><a target="_blank"
                  class="u-color--white u-d-block" href="../../providers/clinics/ray.html"><span><span>Ray by
                  Medico</span></span></a><a target="_blank" class="u-color--white u-d-block"
                  href="../../providers/clinics/reach.html"><span><span>Medico Reach</span></span></a><a
                  target="_blank" class="u-color--white u-d-block"
                  href="../../providers/clinics/ray/features.html#rayTab"><span><span>Ray Tab</span></span></a><a
                  target="_blank" class="u-color--white u-d-block" href="../../practo-pro-app.html"><span><span>Medico
                      Pro</span></span></a></div>
            </div>
          </div>
          <div class="c-footer__column">
            <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>For hospitals</span></div>
            <div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../providers/hospitals/insta.html"><span><span>Insta by Medico</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../providers/hospitals/qikwell.html"><span><span>Qikwell by Medico</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../providers/hospitals/querent.html"><span><span>Querent by Medico</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../providers/hospitals/profile.html"><span><span>Medico Profile</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../providers/hospitals/reach.html"><span><span>Medico Reach</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank" href="#"><span><span>Medico
                      Drive</span></span></a></div>
            </div>
          </div>
          <div class="c-footer__column">
            <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>More</span></div>
            <div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="#"><span><span>Help</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="#"><span><span>Developers</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../company/privacy.html"><span><span>Privacy Policy</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../company/terms.html"><span><span>Terms &amp; Conditions</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../sitemap.html"><span><span>Healthcare Directory</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="../../health-wiki/index.html"><span><span>Medico Health Wiki</span></span></a></div>
            </div>
          </div>
          <div class="c-footer__column">
            <div class="u-color--white u-base-font u-spacer--bottom-thin u-bold"><span>Social</span></div>
            <div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="http://www.facebook.com/practo"><span><span>Facebook</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="http://twitter.com/Practo"><span><span>Twitter</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="http://www.linkedin.com/company/practo-technologies-pvt-ltd"><span><span>LinkedIn</span></span></a>
              </div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="http://www.youtube.com/user/PractoSupport"><span><span>Youtube</span></span></a></div>
              <div class="u-d-block"><a class="u-color--white u-d-block" target="_blank"
                  href="http://github.com/practo"><span><span>Github</span></span></a></div>
            </div>
          </div>
        </div>
        <div class="u-t-center"><img class="u-spacer--medium-vertical"
            src="{{asset('assets/images/logo/practo.png')}}" />
          <div class="u-bold u-color--lavender-gray"><span>Copyright © 2017, Medico. </span><span>All rights
              reserved</span>.</div>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/user/findDoctor/single.css')}}">
@endsection
@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    {{-- <script src="{{asset('assets/js/user/findDoctor/single.js')}}"></script> --}}
    <script src="{{asset('assets/js/user/findDoctor/single.js')}}"></script>
    <script>

  $('.todayClinic').on('click',function(e){
        // e.preventDefault();
        // console.log("clicked");
        doc = "{{ $doctor->id }}";

        route = "{{ route('ajax.fetchNextDaySlots') }}";
        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
                'docID': doc,
                'i' : 0
            },
            dataType: 'json',
            success: function(test){
                $('.clinic').empty();
                // console.log($test);
                // console.log(test[0][0][1]);
                // console.log(test[0][0][0].start_time);
                // console.log(test[0][0].start_time);
                // console.log(test[0][1][0]);

                content = `<div class="slot-tabs-timimg">`
                    content = `<div class="slot-tabs-timimg">`
                // console.log(test[0].length == 0)
                // console.log(test[0].length);

                if(test[0].length>0)
                {
                    content += `<div class="mb-2">`;


                    for(i=0; i<test[0].length; i++)
                    {
                        time = test[0][i][0]['start_time'];
                        if (test[0][i][1] == true)
                        {
                            content += `
                                            <div class="slot-time slot-booked">
                                                <a href="#" onclick="return false;" title="Slot Booked">` + time.substring(0, 5) + `
                                                </a>
                                            </div>`;
                        }
                        else{
                            id = test[0][i][0]['id'];
                            content += `<div class='slot-time'>
                                <a href="/doctors/{{$doctor->id}}/appointment/${id}/clinic">  ${time.substring(0, 5)}
                                </a>
                            </div>`;
                        }
                    }
                }
                else{
                    content += `<div class="mb-2 text-center">`;
                    content += `<img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                    <p>No slots Available</p>`;
                }
                content += `
                        </div>
                    </div>`;

                $('.clinic').append(content);
            }
        });
        });
    $('.tomorrowClinic').on('click',function(e){
        // e.preventDefault();
        // console.log("clicked");
        doc = "{{ $doctor->id }}";

        route = "{{ route('ajax.fetchNextDaySlots') }}";
        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
                'docID': doc,
                'i': 1
            },
            dataType: 'json',
            success: function(test){
                $('.clinic').empty();
                // console.log(test[0][0][1]);
                // console.log(test[0][0][0].start_time);
                // console.log(test[0][0].start_time);
                // console.log(test[0][1][0]);

                content = `<div class="slot-tabs-timimg">`
                    content = `<div class="slot-tabs-timimg">`
                // console.log(test[0].length == 0)
                // console.log(test[0].length);

                if(test[0].length>0)
                {
                    content += `<div class="mb-2">`;


                    for(i=0; i<test[0].length; i++)
                    {
                        // console.log(test[0][i][0]['start_time']);
                        time = test[0][i][0]['start_time'];
                        if (test[0][i][1] == true)
                        {
                            content += `
                                            <div class="slot-time slot-booked">
                                                <a href="#" onclick="return false;" title="Slot Booked">` + time.substring(0, 5) + `
                                                </a>
                                            </div>`;
                        }
                        else{
                            id = test[0][i][0]['id'];
                            content += `<div class='slot-time'>
                                <a href="/doctors/{{$doctor->id}}/appointment/${id}/clinic">  ${time.substring(0, 5)}
                                </a>
                            </div>`;
                        }
                    }
                }
                else{
                    content += `<div class="mb-2 text-center">`;
                    content += `<img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                    <p>No slots Available</p>`;
                }
                content += `
                        </div>
                    </div>`;

                $('.clinic').append(content);
            }
        });
        });

        $('.dayAfterClinic').on('click',function(e){
        // e.preventDefault();
        // console.log("clicked");
        doc = "{{ $doctor->id }}";

        let route = "{{ route('ajax.fetchNextDaySlots') }}";
        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
                'docID': doc,
                'i': 2
            },
            dataType: 'json',
            success: function(test){
                $('.clinic').empty();

                content = `<div class="slot-tabs-timimg">`

                if(test[0].length>0)
                {
                    content += `<div class="mb-2">`;


                    for(i=0; i<test[0].length; i++)
                    {
                        // console.log(test[0][i][0]['start_time']);
                        time = test[0][i][0]['start_time'];
                        if (test[0][i][1] == true)
                        {
                            content += `
                                            <div class="slot-time slot-booked">
                                                <a href="#" onclick="return false;" title="Slot Booked">` + time.substring(0, 5) + `
                                                </a>
                                            </div>`;
                        }
                        else{
                            id = test[0][i][0]['id'];
                            content += `<div class='slot-time'>
                                <a href="/doctors/{{$doctor->id}}/appointment/${id}/clinic">  ${time.substring(0, 5)}
                                </a>
                            </div>`;
                        }
                    }
                }
                else{
                    content += `<div class="mb-2 text-center">`;
                    content += `<img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                    <p>No slots Available</p>`;
                }
                content += `
                        </div>
                    </div>`;

                $('.clinic').append(content);
            }
        });

        });
        $('.todayVideo').on('click',function(e){
        // e.preventDefault();
        console.log("clicked");
        doc = "{{ $doctor->id }}";

        route = "{{ route('ajax.fetchNextDaySlots') }}";
        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
                'docID': doc,
                'i':0
            },
            dataType: 'json',
            success: function(test){
                $('.video').empty();
                // console.log(test);
                // console.log(test[0][0][0].start_time);
                // console.log(test[0][0].start_time);
                // console.log(test[0][1][0]);

                content = `<div class="slot-tabs-timimg">`
                    content = `<div class="slot-tabs-timimg">`
                // console.log(test[0].length == 0)
                // console.log(test[0].length);

                if(test[1].length>0)
                {
                    content += `<div class="mb-2">`;


                    for(i=0; i<test[1].length; i++)
                    {
                        // console.log(test[0][i][0]['start_time']);
                        time = test[1][i][0]['start_time'];
                        if (test[1][i][1] == true)
                        {
                            content += `
                                            <div class="slot-time slot-booked">
                                                <a href="#" onclick="return false;" title="Slot Booked">` + time.substring(0, 5) + `
                                                </a>
                                            </div>`;
                        }
                        else{
                            id = test[1][i][0]['id'];
                            content += `<div class='slot-time'>
                                <a href="/doctors/{{$doctor->id}}/appointment/${id}/video">  ${time.substring(0, 5)}
                                </a>
                            </div>`;

                        }
                    }
                }
                else{
                    content += `<div class="mb-2 text-center">`;
                    content += `<img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                    <p>No slots Available</p>`;
                }
                content += `
                        </div>
                    </div>`;

                $('.video').append(content);
            }
        });
        });
        $('.tomorrowVideo').on('click',function(e){
        // e.preventDefault();
        // console.log("clicked");
        doc = "{{ $doctor->id }}";

        route = "{{ route('ajax.fetchNextDaySlots') }}";
        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
                'docID': doc,
                'i' : 1
            },
            dataType: 'json',
            success: function(test){
                $('.video').empty();
                // console.log(test[0][0][1]);
                // console.log(test[0][0][0].start_time);
                // console.log(test[0][0].start_time);
                // console.log(test[0][1][0]);

                content = `<div class="slot-tabs-timimg">`
                    content = `<div class="slot-tabs-timimg">`
                // console.log(test[0].length == 0)
                // console.log(test[0].length);

                if(test[1].length>0)
                {
                    content += `<div class="mb-2">`;

                    // console.log(test[1]);
                    for(i=0; i<test[1].length; i++)
                    {
                        // console.log(test[0][i][0]['start_time']);
                        time = test[1][i][0]['start_time'];
                        if (test[1][i][1] == true)
                        {
                            content += `
                                            <div class="slot-time slot-booked">
                                                <a href="#" onclick="return false;" title="Slot Booked">` + time.substring(0, 5) + `
                                                </a>
                                            </div>`;
                        }
                        else{
                            id = test[1][i][0]['id'];
                            content += `<div class='slot-time'>
                                <a href="/doctors/{{$doctor->id}}/appointment/${id}/video">  ${time.substring(0, 5)}
                                </a>
                            </div>`;

                        }
                    }
                }
                else{
                    content += `<div class="mb-2 text-center">`;
                    content += `<img class="text-center" src="{{asset('assets/images/download.svg')}}" alt=""> <p>No slots Available</p>`;
                }
                content += `
                        </div>
                    </div>`;

                $('.video').append(content);
            }
        });
        });
        $('.dayAfterVideo').on('click',function(e){
        // e.preventDefault();
        console.log("clicked");
        doc = "{{ $doctor->id }}";

        route = "{{ route('ajax.fetchNextDaySlots') }}";

        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
                'docID': doc,
                'i':2
            },
            dataType: 'json',
            success: function(test){
                $('.video').empty();
                console.log(test[1]);
                // console.log(test[0][0][0].start_time);
                // console.log(test[0][0].start_time);
                // console.log(test[0][1][0]);

                content = `<div class="slot-tabs-timimg">`
                // console.log(test[0].length == 0)
                // console.log(test[0].length);

                if(test[1].length>0)
                {
                    content += `<div class="mb-2">`;


                    for(i=0; i<test[1].length; i++)
                    {
                        // console.log(test[0][i][0]['start_time']);
                        time = test[1][i][0]['start_time'];
                        if (test[1][i][1] == true)
                        {
                            content += `
                                            <div class="slot-time slot-booked">
                                                <a href="#" onclick="return false;" title="Slot Booked">` + time.substring(0, 5) + `
                                                </a>
                                            </div>`;
                        }
                        else{
                            id = test[1][i][0]['id'];
                            content += `<div class='slot-time'>
                                <a href="/doctors/{{$doctor->id}}/appointment/${id}/video">  ${time.substring(0, 5)}
                                </a>
                            </div>`;

                        }
                    }
                }
                else{
                    // console.log("hi");
                    content += `<div class="mb-2 text-center">`;
                    content += `<img class="text-center" src="{{asset('assets/images/download.svg')}}" alt="">
                    <p>No slots Available</p>`;
                }
                content += `
                        </div>
                    </div>`;

                $('.video').append(content);
            }
        });
        });
    </script>
@endsection
