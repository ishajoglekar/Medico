@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/doctor/register.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .rating {
  border: none;
  margin:0px;
  margin-bottom: 18px;
  float: left;
}

.rating > input { display: none; }

.rating.star > label {
    color: #efefef;
    margin: 1px 20px 0px 0px;
    background-color: #ffffff;
    border-radius: 0;
    height: 48px;
    float: right;
    width: 44px;
    border: 1px solid #ffffff;
}
fieldset.rating.star > label:before {
    margin-top: 0;
    padding: 0px;
    font-size: 47px;
    font-family: FontAwesome;
    display: inline-block;
    content: "\2605";
    position: relative;
    top: -9px;
}
.rating > label:before {
    margin-top: 2px;
    padding: 5px 12px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "";
}
.rating > .half:before {
  content: "\f089";
  position: absolute;
}
.rating.star > label{
  background-color: transparent !important;
}
.rating > label {
    color: #fff;
    margin: 1px 11px 0px 0px;
    background-color:#fff;
    border:solid 1px #000;
    border-radius: 2px;
    height: 16px;
    float: right;
    width: 16px;
    border: 1px solid #c1c0c0;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label {
	background-color:yellow!important;
  cursor:pointer;
} /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label {
	background-color:yellow!important;
  cursor:pointer;
}
.rating.star:not(:checked) > label:hover, /* hover current star */
.rating.star:not(:checked) > label:hover ~ label {
  color:yellow!important;
  background-color: transparent !important;
  cursor:pointer;
} /* hover previous stars in list */

.rating.star > input:checked + label:hover, /* hover current star when changing rating.star */
.rating.star > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating.star > input:checked ~ label:hover ~ label {
  color:yellow!important;
  cursor:pointer;
  background-color: transparent !important;
}
.star_rating{
        width: 500px;
    margin: 0 auto;
    border: 1px solid yellow;
    padding: 3px 30px 72px 35px;
    box-shadow: 0 0 15px yellow;
    margin-top: 2%;
    border-radius: 14px;
}
.star_rating h2 {
  font-size: 27px;
  text-transform: uppercase;
}
.star_rating p {
  font-size: 17px;
  color: #efefef;
  clear: both;
  margin-bottom: 3px;
}
.star_rating h4 {
    font-size: 17px;
    color: #efefef;
    clear: both;
    margin-bottom: 3px;
    border-top: 2px solid yellow;
    padding-top: 16px;
    text-align: center;
}
.rating.star {
    margin-left: 16%;
}
@media screen and (max-width: 500px){
  .star_rating {
    width: 100%;
    padding: 3px 8px 72px 6px;
  }
  .rating.star {
    margin: 0 auto;
    display: block;
    text-align: center;
    float: none;
  }
  .rating.star > label {
    margin: 1px;
    width: 19%;
  }
}
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
            <a href="{{route('index')}}" class="btn btn-outline-primary">Skip feedback</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-6">
        <form action="{{route('feedback.store')}}" method="POST">
            @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputName4">Name</label>
                    <input type="text" class="form-control" id="inputName4" placeholder="e.g John Doe">
                  <input type="hidden" value="{{$appointment_id}}" name="appointment_id">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Give your feedback</label>
                    <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3" style="width: 100%" placeholder="e.g Lorem ipsum dolor sit amet"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputPassword4">Give your Ratings</label>
                    <fieldset class="rating star">
                        <input type="radio" id="field6_star5" name="rating2" value="5" /><label class = "full" for="field6_star5"></label>
                        <input type="radio" id="field6_star4" name="rating2" value="4" /><label class = "full" for="field6_star4"></label>
                        <input type="radio" id="field6_star3" name="rating2" value="3" /><label class = "full" for="field6_star3"></label>
                        <input type="radio" id="field6_star2" name="rating2" value="2" /><label class = "full" for="field6_star2"></label>
                        <input type="radio" id="field6_star1" name="rating2" value="1" /><label class = "full" for="field6_star1"></label>
                    </fieldset>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="col-md-2">

        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        	$("label").click(function(){
	  $(this).parent().find("label").css({"background-color": "#efefef"});
	  $(this).css({"background-color": "yellow"});
	  $(this).nextAll().css({"background-color": "yellow"});
	});
	$(".star label").click(function(){
	  $(this).parent().find("label").css({"color": "#efefef"});
	  $(this).css({"color": "yellow"});
	  $(this).nextAll().css({"color": "yellow"});
	  $(this).css({"background-color": "transparent"});
	  $(this).nextAll().css({"background-color": "transparent"});
	});
    </script>
@endsection
