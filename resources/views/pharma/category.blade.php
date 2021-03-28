@extends('layouts.app')
@section('content')
<div id="search-navbar">
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-8">
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control search" placeholder="Search for medicines,health..." aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="view-cart-btn">
                    <a href="{{route('order.cart')}}" style="color:#fff;text-decoration:none">
                        <i class="fa fa-shopping-cart mr-2"></i> <span>Cart</span>
                        <span class="cart-tag">{{auth()->user()->cart?auth()->user()->cart->products->count():0}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="filter-navbar">
    <div class="container pt-2 pb-2">
        <div class="row">
            <div class="category-sub-header d-flex justify-content-between">
                @foreach ($categories as $category)

                    <div class="category-dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class ="drop-link" href="{{route('pharma.view.categoryProducts',$category->id)}}">{{$category->name}}</a>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($category->subcategories as $subcategory)

                            <a href="{{route('pharma.view.subCategory',[$subcategory->category->id,$subcategory->id])}}" class="dropdown-item ">{{$subcategory->name}}</a>

                            {{-- <a class="dropdown-item" href="#"></a> --}}
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row pt-4">
        <div class="col-md-3" id="sidebar">
            <h3 class="categories">Categories</h3>
            <div class="sub-categories">
                @php
                    $i=1;
                @endphp
                @foreach ($categories as $category)

                    <div class="sub-category">
                        <p class="main-sub-category fa fa-angle-right" data-id="{{$i}}"><i class=""></i> &nbsp;{{$category->name}}</p>
                        <div id="{{$i}}" class="d-none">
                            <div class="list-sub-category">
                                @foreach ($category->subcategories as $sub)
                                    <div class="sub-category-list">
                                        <a href="{{route('pharma.view.subCategory',[$sub->category->id,$sub->id])}}" class="main-list-sub-category d-block">{{$sub->name}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach

            </div>
        </div>
        <div class="col-md-9">
            <div class="container">
                    <div id="title" class="d-flex">
                        {{-- {{$category}} --}}
                        <h3 class="category-title">{{$singleCategory->name}}</h3>
                        <p class="product-quantity pl-2 pt-3">{{$products->count()}} products</p>
                    </div>
                    <div id="shop-by-category" class="mt-3">
                        <h3 class="title">Shop by category</h3>
                        <div class="health mt-3">
                            <div class="row">
                                @foreach ($subCategories as $sub)
                                    <div class="col-md-4 ml-1 mt-1 ">
                                        <a href="{{route('pharma.view.subCategory',[$singleCategory->id,$sub->id])}}" class="">
                                            <div class="sub-category">
                                                {{$sub->name}}
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="best-sellers" class="mt-5">
                        <h3 class="title">Best Sellers</h3>
                        <div class="row mt-3">
                            @foreach ($products as $product)

                                <div class="col-md-4 mt-2">
                                    <a href="{{route('product.show',$product->id)}}" class="card p-2">
                                        <img class="item-photo" src="//www.practostatic.com/ecommerce-assets/static/media/placeholder_product.39dd65c8.png" alt="">
                                        <p class="name">{{$product->name}}</p>
                                        <p class="price pt-2 pb-2">₹ {{$product->price}}</p>
                                    </a>
                                    {{-- @if(auth()->user()->cart) --}}
                                        @if(auth()->user()->cart && auth()->user()->cart->products()->where('product_id',$product->id)->first() ? auth()->user()->cart->products()->where('product_id',$product->id)->first()->pivot->quantity : '')
                                        <div class="add-to-cart-btn d-none " data-id="{{$product->id}}">ADD TO CART</div>
                                        <div class="add-to-card-inc-dec-wrapper justify-content-between d-flex">
                                            <div class="inc-dec-btn d-flex">
                                                <span class="dec">-</span>
                                                <span class="no">{{auth()->user()->cart->products()->where('product_id',$product->id)->first()->pivot->quantity}}</span>
                                                <span class="inc">+</span>
                                            </div>

                                            <div class="view-cart-btn">
                                            <a href="{{route('order.cart')}}" style="color:#fff;text-decoration:none">
                                                <i class="fa fa-shopping-cart mr-2"></i> <span>Cart</span>
                                                <span class="cart-tag">{{auth()->user()->cart?auth()->user()->cart->products->count():0}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="add-to-cart-btn {{$isInCart ?? ''?'d-none':''}}" data-id="{{$product->id}}">ADD TO CART</div>
                                        <div class="add-to-card-inc-dec-wrapper justify-content-between {{$isInCart ?? ''?'d-flex':'d-none'}}">
                                            <div class="inc-dec-btn d-flex">
                                                <span class="dec">-</span>
                                                <span class="no">{{$quantity ?? ''}}</span>
                                                <span class="inc">+</span>
                                            </div>

                                            <div class="view-cart-btn">
                                            <a href="{{route('order.cart')}}" style="color:#fff;text-decoration:none">
                                                <i class="fa fa-shopping-cart mr-2"></i> <span>Cart</span>
                                                <span class="cart-tag">{{auth()->user()->cart?auth()->user()->cart->products->count():0}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- @endif --}}
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

        </div>

@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/pharma/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pharma/category.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pharma/single_product.css')}}">

@endsection
@section('scripts')
        <script>
            $('.category-dropdown').hover(function(){
                $('.dropdown-toggle', this).trigger('click');
            });
            $('.main-sub-category').click(function(){
                // console.log($(this));
                var id = $(this).data('id');
                // var c = $(`#${id}`).attr('class');
                // alert(id);
                // console.log(c);
                if($(`#${id}`).hasClass('d-none')){
                    $(`#${id}`).removeClass('d-none').addClass('d-block');
                    $(this).css('border-bottom','none');
                    $(this).removeClass('fa-angle-right').addClass('fa-angle-down');
                }
                else{
                    $(`#${id}`).removeClass('d-block').addClass('d-none');
                    $(this).css('border-bottom','1px solid #f0f0f5');
                    $(this).removeClass('fa-angle-down').addClass('fa-angle-right');
                }
                // $(this).css('font-weight','700');

            });
            $('.add-to-cart-btn').click(function(){
                $(this).addClass('d-none');
                $(this).siblings('.add-to-card-inc-dec-wrapper').removeClass('d-none').addClass('d-flex');
                let product_id = $(this).data('id');
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
                        $('.cart-tag').html(`${success.count}`);
                    }
                });
        });
        $('.inc').click(function(){
            var no = parseInt($(this).siblings('.no').html());
            let product_id = $(this).parent().parent().siblings('.add-to-cart-btn').data('id');
            no +=1;
            $(this).siblings('.no').html(no);
            updateQuatity(no,product_id);


        });
        $('.dec').click(function(){
            var no = parseInt($(this).siblings('.no').html());
            let product_id = $(this).parent().parent().siblings('.add-to-cart-btn').data('id');
            no -=1;
            if(no==0){
                $(this).parent().parent().siblings('.add-to-cart-btn').removeClass('d-none');
                $(this).parent().parent().removeClass('d-flex').addClass('d-none');
            }else{
                $(this).siblings('.no').html(no);
            }
            updateQuatity(no,product_id);

        });
        function updateQuatity(no,product_id){
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
                    $('.cart-tag').html(`${success.count}`);
                }
            });
        }


        </script>
    <script src="{{asset('assets/js/pharma/script.js')}}"></script>
@endsection
