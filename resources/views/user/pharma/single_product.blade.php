@extends('layouts.app')
@section('content')
    <div class="content-box-bg">
        <div class="single-product d-flex">
            <div class="single-product-right">
                <div class="single-product-card">
                    <div class="single-product-card-img">
                        <img src="{{asset('assets/images/pharma/products/default.jpg')}}" alt="">
                    </div>
                    <div class="single-product-card-body pt-2">
                        <div class="single-product-price d-flex">
                            <p class="price-now mr-2 mb-0">₹{{$product->price}}</p><del class="price-old mr-3 mt-1">₹{{$product->price+($product->price *5 /100)}}</del> <p class="text-success mt-1 mb-0" style="font-weight: 600">5% off</p>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="single-product-pack-size">
                                <p>PACK SIZE</p>
                                <div class="box">
                                    1000g
                                </div>
                            </div>
                            <div class="single-product-unit-count">
                                <p>UNIT COUNT</p>
                                <div class="box">
                                    {{$product->size}}
                                </div>
                            </div>
                        </div>
                        <div class="add-to-cart-btn {{$isInCart?'d-none':''}}">ADD TO CART</div>
                        <div class="add-to-card-inc-dec-wrapper justify-content-between {{$isInCart?'d-flex':'d-none'}}">
                            <div class="inc-dec-btn d-flex">
                                <span class="dec">-</span>
                                <span class="no">{{$quantity}}</span>
                                <span class="inc">+</span>
                            </div>

                            <div class="view-cart-btn">
                            <a href="{{route('order.cart')}}" style="color:#fff;text-decoration:none">
                                <i class="fa fa-shopping-cart mr-2"></i> <span>View Cart</span>
                                <span id="cart-tag">{{auth()->user()->cart?auth()->user()->cart->products->count():0}}</span>
                                </a>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="single-product-left ml-4">
                <input type="hidden" id="product_id" value="{{$product->id}}">
                <div class="bottom-bdr">
                    <div class="product-name">
                        <h3>{{$product->name}}</h3>
                    </div>
                    <div class="manufactured-name mb-3">
                        <span class="manufactured-title mr-2">Manufactured By</span> Glaxosmithkline Pharmaceuticals Ltd.
                    </div>
                </div>
                <div class="bottom-bdr mt-3">
                    <div class="product-sub-title">
                        <h5>Highlights</h5>
                    </div>
                    <ul class="mb-3 highlights-ul">
                        <li>{{$product->highlights}}</li>
                    </ul>
                </div>
                <div class="bottom-bdr mt-3">
                    <div class="product-sub-title">
                        <h5>Description</h5>
                    </div>
                    <p class="mb-3">{{$product->description}}</p>
                </div>
                <div class="bottom-bdr mt-3">
                    <div class="product-sub-title">
                        <h5>Use</h5>
                    </div>
                    <p class="mb-3">It is designed for sensitive and dry skin and is suitable for all age groups and all skin types.</p>
                </div>
                <div class="bottom-bdr mt-3">
                    <div class="product-sub-title">
                        <h5>Benifits</h5>
                    </div>
                    <ul class="mb-3 highlights-ul">
                        <li>{{$product->benefits}}</li>
                    </ul>
                </div>
                <div class="bottom-bdr mt-3">
                    <div class="product-sub-title">
                        <h5>Directions for use</h5>
                    </div>
                    <p class="mb-3">{{$product->how_to_use}}</p>
                </div>
                <div class="d-flex justify-content-between mt-3 report-error">
                    <div class="product-sub-title">
                        <h5>Something doesn’t feel right?</h5>
                    </div>
                    <p class="text-danger">Report an error</p>
                </div>
                <div class="report-form d-none">
                    <form action="" class="d-flex flex-column">
                        <textarea name="" id="" cols="30" rows="3" placeholder="Report an error. add details here...." class="mb-2" style="padding: 5px"></textarea>
                        <input type="text" placeholder="Emaild (Optional)" class="mb-2" style="padding: 5px">
                        <button class="btn">Submit</button>
                    </form>
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/pharma/single_product.css')}}">

    <style>

    </style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    {{-- <script src="{{asset('assets/js/pharma/script.js')}}"></script> --}}
    <script>
        var product_id = $('#product_id').val();
        $('.add-to-cart-btn').click(function(){
            $(this).addClass('d-none');
            $('.add-to-card-inc-dec-wrapper').removeClass('d-none').addClass('d-flex');

            let route = "{{route('addToCart')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id': {{auth()->user()->id}},
                    'product_id': product_id
                },
                dataType : 'json',
                success: function(success){
                    console.log(success.count);
                    $('#cart-tag').html(`${success.count}`);
                }
            });
        });
        $('.inc').click(function(){
            var no = parseInt($('.no').text());

            no +=1;
            $(this).siblings('.no').html(no);
            updateQuatity(no);


        });
        $('.dec').click(function(){
            var no = parseInt($('.no').text());
            no -=1;
            if(no==0){
                $('.add-to-cart-btn').removeClass('d-none');
                $('.add-to-card-inc-dec-wrapper').removeClass('d-flex').addClass('d-none');
            }else{
                $(this).siblings('.no').html(no);
            }
            updateQuatity(no);

        });
        function updateQuatity(no){
            let route = "{{route('updateQuantity')}}";
            $.ajax({
                url: route,
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                    'user_id': {{auth()->user()->id}},
                    'product_id': product_id,
                    'quantity': no
                },
                dataType : 'json',
                success: function(success){

                }
            });
        }
        $('.report-error').click(function(){
            $('.report-form').toggleClass('d-none');
        });
    </script>
@endsection
