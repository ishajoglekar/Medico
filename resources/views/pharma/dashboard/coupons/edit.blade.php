@extends('pharma.dashboard.layout')
@section('title','Medico | Pharma Dashboard')

@section('dashboard-title','Edit Coupon')
@section('page-level-styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
       
        .card span{
        color:red;
        font-size:17px;
        }
        .btn{
            margin-top:1rem;
            padding:10px 45px;
            border-radius:0;
        }
    </style>
@endsection
@section('main-content')
    <form action="{{route('coupons.update',$coupon->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="card" style="box-shadow:none;margin-top:3rem">
                <div class="card-body">
                    <div class="col-md-6" >
                        <div class="form-group col-md-12">
                            <label for="code">Coupon Code<span>*</span></label>
                            <input type="text" required
                            value="{{$coupon->code,old('code')}}"
                            class="form-control @error('code') is-invalid @enderror"
                            name="code" id="code">
                            @error('code')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="min_amount">Minimum Amount in Cart</label>
                            <input type="number"
                            value="{{$coupon->min_amount,old('min_amount')}}"
                            class="form-control"
                            name="min_amount" id="min_amount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="max_discount">Maximum Discount</label>
                            <input type="number"
                            value="{{$coupon->max_discount,old('max_discount')}}"
                            class="form-control"
                            name="max_discount" id="max_discount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="upto">Discount Percentage</label>
                            <input type="number"
                            value="{{$coupon->upto,old('upto')}}"
                            class="form-control"
                            name="upto" id="upto">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="valid_till">Valid Till</label>
                            <input type="date"
                                value="{{$coupon->valid_till, old('valid_till')}}"
                                class="form-control @error('valid_till') is-invalid @enderror"
                                name="valid_till" id="valid_till" >
                            @error('valid_till')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit"
                                class="btn btn-warning pull-right" value="Edit Coupon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('page-level-scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
 
 flatpickr("#valid_till", {
            enableTime: true,    
            minDate:new Date(),
            defaultDate:new Date()        
        });
</script>


@endsection
