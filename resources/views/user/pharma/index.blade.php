@extends('layouts.app')
@include('partials._header');

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control search" placeholder="Search for medicines,health..." aria-describedby="basic-addon1">
            </div>
        </div>
        {{-- <div class="col-md-4 d-flex justify-content-end">
        <a href="{{route('order.cart')}}"class="button"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</button></a>
        </div> --}}

    </div>
</div>

<div class="container-fluid mt-5" style="margin:1.6rem 0;">
    <div class="header owl-carousel owl-theme" id="header-carousel">
        <img src="{{asset('assets/images/pharma/header1.jpg')}}" alt="">
        <img src="{{asset('assets/images/pharma/header2.jpg')}}" alt="">
        <img src="{{asset('assets/images/pharma/header3.jpg')}}" alt="">
        <img src="{{asset('assets/images/pharma/header4.jpg')}}" alt="">
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-12 mt-4">
            <p>Categories</p>
            <div class="health owl-carousel owl-theme" id="categories">
                <a href="{{route('pharma.view.categoryProducts',7)}}"> <img src="{{asset('assets/images/pharma/categories/img1.jpg')}}" alt=""></a>
               <a href="{{route('pharma.view.categoryProducts',2)}}"> <img src="{{asset('assets/images/pharma/categories/img2.jpg')}}" alt=""></a>
               <a href="{{route('pharma.view.categoryProducts',1)}}"> <img src="{{asset('assets/images/pharma/categories/img3.jpg')}}" alt=""></a>
               <a href="{{route('pharma.view.categoryProducts',6)}}"> <img src="{{asset('assets/images/pharma/categories/img5.jpg')}}" alt=""></a>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <p>Products</p>
            <div class="health owl-carousel owl-theme" id="products">
                @foreach ($products as $product)
                {{-- {{$product}} --}}
                    <div class="card" style="width: 18rem; height:280px;">
                    <a href="{{route('product.show',$product->id)}}">
                            <img class="card-img-top" src="{{asset('assets/images/pharma/products/img1.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}.</h5>
                                <p class="card-text"><h5>₹{{$product->price}}</p>

                            </div>
                        </a>
                    </div>

                @endforeach


            </div>
        </div>



        <div class="col-md-12" style="margin-top:6rem;">
        <hr>
           <div class="row"style="margin-top:6rem;">
           <div class="col-md-6" >
                <p class="text-primary mt-4">INTRODUCING CONSULTATION DESK</p>
                <h2>Don’t self medicate. Talk to an expert. Consult a doctor in less than 2 minutes.</h2>

                <img src="{{asset('assets/images/pharma/chatsection/img1.jpg')}}" alt="" style="width: 100%;margin-top:1rem;">
            </div>
            <div class="col-md-6">
                <p class="text-primary mt-4">INTRODUCING FAST DELIVERY</p>
                <h2>Tired of waiting in a queue? Too weak to go down and buy medicines?</h2>

                <img src="{{asset('assets/images/pharma/chatsection/img2.jpg')}}" alt="" style="width: 100%;margin-top:1rem;">
            </div>
           </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <img src="https://www.practostatic.com/ecommerce-assets/static/media/home/desktop/full-width-4.2a2a16cc.png" alt="" style="width: 100%; padding:2rem;margin-top:6rem; background:lightblue">
        </div>
    </div>
</div>

<div class="container mt-5">
    <h3 class="text-center">What our users have to say</h3>
    <div id="testimonials" class="owl-carousel owl-theme">
        <img src="{{asset('assets/images/pharma/testimonials/img1.png')}}" alt="" style="width: 100%;">
        <img src="{{asset('assets/images/pharma/testimonials/img2.png')}}" alt="" style="width: 100%;">
        <img src="{{asset('assets/images/pharma/testimonials/img3.png')}}" alt="" style="width: 100%;">

    </div>
</div>

<div class="container-fluid mt-5" style="background: #F8F7FC;">
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-md-6 mt-5">
                <img src="https://www.practostatic.com/consumer-home/desktop/images/1540464906/app-banner@2x.jpg" alt="" width="70%">
            </div>
            <div class="col-md-6 mt-5 pt-5">
                <h3>Download the Practo app</h3>
                <p>Your home for health is one tap away.</p>
                <p>Book appointments, Order health products, Consult with a doctor online,<br>Book health chekups, store health records & read health tips.</p>
                <p>Send the link to download the app</p>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">+91</span>
                </div>
                <input type="text" class="form-control search" placeholder="Enter Phone Number." aria-describedby="basic-addon1">
                <input type="submit" class="btn btn-primary ml-4">
            </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="background: #28328C;margin-bottom:0">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <img src="//www.practostatic.com/ecommerce-assets/static/media/practo-footer.5fd476e2.svg" class="text-center" alt="" style="padding: 4rem;">
        </div>
        <div class="col-md-12">
           <div class="text-center text-white">
                <p>Copyright © 2017, Practo. All rights reserved <br>
Consult now | Email: support@practo.com <br>
Practo Technologies Pvt. Ltd., Salarpuria Symbiosis, Arekere Village, Begur Hobli, Bannerghatta Main Rd, Bengaluru, Karnataka 560076</p>
            </div>
           </div>
    </div>
</div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/pharma/index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />

    <style>
        button:focus { outline: none; }
        .owl-theme .owl-nav [class*='owl-']:hover {background:transparent;}
        .owl-theme .owl-nav [class*='owl-']{background: transparent;}

    </style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

    <script src="{{asset('assets/js/pharma/script.js')}}"></script>
@endsection
