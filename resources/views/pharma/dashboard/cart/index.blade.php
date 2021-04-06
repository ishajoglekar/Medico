@extends('layouts.app')
@section('title','Medico | Pharma Dashboard')

@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
    .add-to-cart-btn {
        color: #fff;
        background-color: #14BEF0;
        text-align: center;
        padding: 10px;
        border-radius: 4px;
        margin-top: 17px;
    }

    .add-to-card-inc-dec-wrapper {
        margin-top: 17px;
    }

    .inc-dec-btn,
    .view-cart-btn {
        width: 45%;
    }

    .inc-dec-btn {
        border: 1px solid #14BEF0;
        /* box-sizing: content-box; */
    }

    .inc-dec-btn span {
        display: inline-block;
        width: 32.5%;
        text-align: center;
        height: 41px;
        line-height: 41px;
    }

    .inc-dec-btn .dec,
    .inc-dec-btn .inc {
        font-size: 1.5rem;
        color: #14BEF0;
    }

    .inc-dec-btn span:nth-child(2) {
        background-color: #14BEF0;
        color: #fff;
        font-size: .9rem;
    }

    .view-cart-btn {
        color: #fff;
        background-color: #14BEF0;
        text-align: center;
        padding: 10px;
        border-radius: 2px;
        position: relative;
    }

    .inc:hover,
    .dec:hover {
        cursor: pointer;
    }

    .cart-tag {
        display: inline-block;
        text-align: center;
        font-size: 8px;
        background-color: #fff;
        color: #14BEF0;
        width: 15px;
        height: 15px;
        line-height: 15px;
        position: absolute;
        top: 7%;
        left: 25%;
        font-weight: bold;
    }

    a:hover {
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
                    <i class="fa fa-arrow-left mr-2 text-primary" style="font-size: 1.3rem;"></i>
                    <h5 class="text-primary">Go to Previous Page</h5>
                </a>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="background: #fff;min-height:100vh;position:relative">
        <div class="row" style="padding-top: 2rem;">
            <div class="col-md-3 d-flex justify-content-start">
                <i class="fa fa-map-marker mr-2" style="font-size: 1rem;"></i>
                <p class="font-weight-bold"> Deliver to my location</p>
            </div>
            <div class="col-md-9">
                <h5 class="text-center ">My Cart : {{$products->count()}} items</h5>
            </div>
        </div>
        <hr style="height: 2px; background:#eee;">
        @foreach($products as $product)
        <div class="product-div{{$product->id}}" style="margin: 0 auto;">

            <div class="row">

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('assets/images/pharma/products/dummy.jpg')}}" alt="" width="90%">

                        </div>
                        <div class="col-md-9">
                            <div class="product mt-4">
                                <h5 class="font-weight-bold">
                                    {{$product->name}}
                                </h5>
                                <p>{{$product->manufacturer->name}}
                                <p>{{$product->size}}</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="add-to-card-inc-dec-wrapper justify-content-between">
                        <div class="d-flex">
                            <h3 class=text-right>₹{{$product->price}}</h3>
                        </div>
                        <div class="inc-dec-btn d-flex mr-5">
                            <span class="dec" data-id="{{$product->id}}">-</span>
                            <span class="no">{{$product->pivot->quantity}}</span>
                            <span class="inc" data-id="{{$product->id}}">+</span>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        @endforeach


        <a href="{{route('pharma.index')}}" class="btn btn-outline-primary">Add More Medicines</a>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h6 class="font-style-bold">Checkout Amount ₹<span id="finalAmount">{{$finalAmount}}</span></h6>
                </div>
                <div class="col-md-12">
                    <a href="{{route('cart.checkout')}}" class="btn btn-primary" style="width: 100%;font-size:1.2rem;font-weight:bold;background:#5BD2F5;color:#fff;border-color:#5BD2F5">Go Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
@endsection
@section('scripts')
<script>
    var product_id = 0;

    function setFinalAmount() {
        var finalAmount = 0;
        @foreach($products as $product)

        finalAmount += (parseInt($('.no{{$product->id}}').html())) * {
            {
                $product - > price
            }
        };
        $('#finalAmount').html(finalAmount);
        @endforeach
    }

    @foreach($products as $product)

    $('.inc{{$product->id}}').click(function() {
        var no = parseInt($('.no{{$product->id}}').html());
        // console.log($('.no').val());
        no += 1;
        $('.no{{$product->id}}').html(no);
        setFinalAmount();
    });
    @endforeach
    $('.inc').click(function() {
        var no = parseInt($(this).siblings('.no').html());
        product_id = $(this).data('id');
        no += 1;
        $(this).siblings('.no').html(no);
        product_id = $(this).data('id');
        updateQuatity(no);

    });
    $('.dec').click(function() {
        var no = parseInt($(this).siblings('.no').html());
        product_id = $(this).data('id');
        no -= 1;
        // alert(no);
        if (no == 0) {
            // $('.add-to-cart-btn').removeClass('d-none');
            // $('.add-to-card-inc-dec-wrapper').removeClass('d-flex').addClass('d-none');
            $('.product-div' + product_id).remove();
        } else {
            $(this).siblings('.no').html(no);
        }

        updateQuatity(no);
    });


    function updateQuatity(no) {
        let route = "{{route('updateQuantity')}}";
        $.ajax({
            url: route,
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                'user_id': {
                    {
                        auth() - > user() - > id
                    }
                },
                'product_id': product_id,
                'quantity': no
            },
            dataType: 'json',
            success: function(success) {
                // alert("Hey")
                $('#finalAmount').text(success.finalAmount);
            }
        });
    }
</script>
@endsection