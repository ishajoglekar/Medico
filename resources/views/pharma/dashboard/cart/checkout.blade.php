@extends('layouts.app')

@section('title','Medico | Pharma Dashboard')

@section('styles')
<style>
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
    background:#28328C;
    }
    body{
        background: #eee;
    }
    .btn-primary,.btn-primary:hover{
        background: #28328C;
        border-color:#28328C;
        color: #fff;
    }
    a:hover{
        text-decoration: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid" style="background: #eee;">

    <div class="container">

        <div class="row">
                    <div class="col-md-3 ">
                    <a href="" class="d-flex justify-content-start mt-5">
                        <i class="fa fa-arrow-left mr-2 text-primary" style="font-size: 1rem;"></i>
                        <p class="text-primary">Go to Previous Page</p>
                        </a>
                    </div>
                </div>
        </div>
        <div class="container p-0" style="background:#fff;">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="login-tab" data-toggle="pill" href="#v-pills-login" role="tab" aria-controls="v-pills-login" aria-selected="true">
                    <div class="login d-flex justify-content-between">
                        <div class="d-flex justify-content-star">
                            <i class="fa fa-user m-2" id="user-icon" style="font-size: 1.2rem;"></i>
                            <i class="fa fa-check-circle m-2 d-none" id="check-icon-user"style="font-size: 1.5rem;color:green"></i>
                        <p class="m-2">Login</p></div>
                        <p class="m-2">+91 {{auth()->user()->phone_no}}</p>
                    </div>
                </a>
                <div class="tab-content" id="login">
                    <div class="tab-pane fade show active" id="v-pills-login" role="tabpanel" aria-labelledby="v-pills-login-tab">
                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <p class="font-weight-bold" style="font-size: 1.3rem;">Hi! {{auth()->user()->name}} You are successfully logged in.</p>
                                    <p>Mobile: <span class="font-weight-bold">+91 {{auth()->user()->phone_no}}</span></p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="" class="btn btn-primary mt-2 mb-2 mr-3 pl-5 pr-5">
                                        Continue
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="nav-link" id="prescription-tab" data-toggle="pill" href="#v-pills-prescription" role="tab" aria-controls="v-pills-prescription" aria-selected="false">
                    <div class="login d-flex justify-content-between">
                        <div class="d-flex justify-content-star">
                                <i class="fa fa-check-circle m-2 {{count($pres_req) >0 ? 'text-danger' : 'text-success'}}" id="check-icon-user"></i>
                        <p class="m-2">Prescription</p></div>
                        <!--  -->
                        <div>
                    @if(count($pres_req) >0)
                    <p class="m-2 text-danger">Prescription required</p>
                    @else
                            <p class="m-2 text-success">Prescription not required</p>
                    @endif
                    </div>
                    </div>
                </a>
                <div class="tab-content" id="prescription">
                    <div class="tab-pane fade" id="v-pills-prescription" role="tabpanel" aria-labelledby="v-pills-prescription-tab">

                   <div class="d-flex-justify-content-end">
                   @if(count($pres_req) >0)
                    @foreach($products as $product)
                        @foreach($pres_req as $prod)
                            @if($product->id == $prod)
                                <p class="text-danger">{{$product->name}}</p>
                            @endif
                        @endforeach
                    @endforeach

                    @endif
                   </div>
                    </div>
                </div>
                <a class="nav-link" id="delivery-tab" data-toggle="pill" href="#v-pills-delivery" role="tab" aria-controls="v-pills-delivery" aria-selected="false">

                     <div class="login d-flex justify-content-between">
                        <div class="d-flex justify-content-star">
                            <i class="fa fa-map-marker m-2" id="check-icon-user"style="font-size: 1.2rem;"></i>
                        <p class="m-2">Delivery Details</p></div>

                    </div>
                </a>
                <div class="tab-content" id="delivery">
                    <div class="tab-pane fade" id="v-pills-delivery" role="tabpanel" aria-labelledby="v-pills-delivery-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6"><i class="fa fa-home" style="font-size: 1.5rem;"></i></div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="col-md-11">
                                        <p class="font-weight-bold">Deliver To Home</p>
                                        <div id="addressestemp">
                                            @foreach($addresses as $address)

                                                <p id="newAddedAddress" style="display:inline">{{$address->address}}</p>
                                                <input type="radio" name="addressradio"value="{{$address->address}}">
                                                <br>
                                            @endforeach
                                        </div>


                                        @if($addresses->count() > 0)
                                            <p>{{auth()->user()->address}}</p>
                                            <a href="" class="text-primary" >Change Address</a>
                                        @endif
                                        <br>
                                        <a class="text-primary" id="addAddress" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add an Address</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                              <div class="row">
                                  <div class="col-md-5">
                                  <div class="card">
                                   <div class="card-header">
                                       <p>Standard Delivery</p>
                                   </div>
                                   <div class="card-body">
                                       <p>Delivered by Medico Powered Pharmacy</p>
                                       <hr>
                                       <p>All items are available <br>Delivery by Sep 25</p>
                                       <hr>
                                       <h3>₹<span id="finalAmount">{{$finalAmount}}</span></h3>
                                       <div id ="continueToPayment" class="btn btn-outline-primary">Continue</div>
                                   </div>
                               </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="nav-link" id="payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false">
                <div class="login d-flex justify-content-between disabled">
                        <div class="d-flex justify-content-star">
                            <i class="fa fa-inr m-2" id="check-icon-user"style="font-size: 1.2rem;"></i>
                        <p class="m-2">Payment Details</p></div>

                    </div>
                </a>
                <div class="tab-content" id="payment">
                    <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">


                        <div class="container">

                        <form class="m-3">
                            <input type="text" id="coupon" placeholder="Enter Coupon Code">
                            <input type="submit" value="Apply" id="couponBtn">
                        </form>
                        <div class="col-md-5">
                            <p class="text-secondary">How would you like to pay?</p>
                            <div class="d-flex justify-content-between mt-3"><strong>Total MRP</strong> <span id="totalAmount">{{$finalAmount}}</span></div>
                            <div class="d-flex justify-content-between mt-3"><strong>Discount% </strong><span id="discount">0</span></div>
                            <div class="d-flex justify-content-between mt-3"><strong>Payable Amount</strong> <span id="payable">{{$finalAmount}}</span></div>
                            <div id="errorCoupon" class="text-danger"></div>
                            <div id="placeOrder" class="btn btn-primary mt-3" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Place Order</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Enter your Address:</label>
            <textarea class="form-control" name="address" id="addressContent"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Type of Address</label><br>
            <input type="radio" value="Work" name="type"> Work
            <input type="radio" value="Home" name="type"> Home
            <input type="radio" value="Other" name="type"> Other
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="addBtn" class="btn btn-primary">Add Address</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="OrderPlacedMessage"></div>
      </div>
      <div class="modal-footer">
        <a href="{{route('index')}}" type="button" class="btn btn-secondary">Ok</a>
      </div>
    </div>
  </div>
</div>





@endsection

@section('scripts')
<script>
var coupon_id =-1;

var id = '{{auth()->user()->id}}';
$("#login-tab").click(function(){
  $("#login").toggle();
  $("#user-icon").removeClass('d-none');
  $("#check-icon-user").addClass('d-none');
  $("#prescription").hide();
  $("#delivery").hide();
  $("#payment").hide();
});

$("#prescription-tab").click(function(){
  $("#prescription").toggle();
  $("#login").hide();
  $("#delivery").hide();
  $("#payment").hide();
});

$("#delivery-tab").click(function(){
  $("#delivery").toggle();
  $("#prescription").hide();
  $("#login").hide();
  $("#payment").hide();
});

$("#payment-tab").click(function(){

  $("#payment").toggle();
  $("#prescription").hide();
  $("#delivery").hide();
  $("#login").hide();
});


$('#addBtn').click(function(){

var address = $('#addressContent').val();
var type = $("input[name='type']:checked").val();
    let route = "{{route('users.address')}}";
    $.ajax({
        url: route,
        method: "POST",
        data:{
            _token: "{{ csrf_token() }}",
            'user_id': id,
            'address': address,
            'type': type
        },
        dataType : 'json',
        success: function(success){
            // console.log(success['success']);
            var content ='';
            for(let i=0;i<success.length;i++){
                content += `<p id="newAddedAddress" style="display:inline">${success[i].address}</p><input type="radio"  name="addressradio" value="${success[i].address}"><br>`;
            }
            $('#addressestemp').html(content);
            $('.modal').each(function(){
                    $(this).modal('hide');
            });
        }
    });
})

$('#couponBtn').click(function(e){
e.preventDefault();
var coupon = $('#coupon').val();
    let route = "{{route('coupon.check')}}";
    $.ajax({
        url: route,
        method: "POST",
        data:{
            _token: "{{ csrf_token() }}",
            'user_id': id,
            'coupon': coupon,
            'amount':{{$finalAmount}},
        },
        dataType : 'json',
        success: function(success){
            // console.log(success['success']);

            if(success['coupon']){
                coupon_id = success['coupon'].id;
                $('#discount').html(success['coupon'].discount);
                var totalPrice = {{$finalAmount}};
                var discountedAmount = (totalPrice*success['coupon'].discount)/100;
                if(discountedAmount>success['coupon'].upto){
                    discountedAmount = success['coupon'].upto;
                }
                totalPrice -=(discountedAmount);
                $('#discount').html(discountedAmount);
                $('#payable').html(totalPrice);
            }else{
                $('#errorCoupon').html(success['reason']);

            }
        }
    });
});


$('#placeOrder').click(function(e){
e.preventDefault();
var coupon = $('#coupon').val();
    let route = "{{route('cart.placeOrder')}}";
    $.ajax({
        url: route,
        method: "POST",
        data:{
            _token: "{{ csrf_token() }}",
            'user_id': id,
            'coupon': coupon,
            'amount':{{$finalAmount}},
        },
        dataType : 'json',
        success: function(success){
            // console.log(success['success']);

            if(success['reason']){
                $('#OrderPlacedMessage').html(success['reason']);
            }
        }
    });
});




</script>
@endsection
