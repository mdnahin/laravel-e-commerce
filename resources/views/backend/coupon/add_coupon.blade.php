@extends('backend.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Create Coupon</h4>
                    <a class="btn btn-primary float-right" href="{{ url('/view-coupon') }}"> All Coupon</a>
                    @if(session('coupon'))

                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('coupon') }}.
                        </div>
                        @endif
                        <form action="{{ url('/add-coupon-post') }}" method="post">
                        @csrf
                        <div class="">
                            <h5 class="font-14 mb-1">Coupon Code:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="coupon_code" id="category_name-ajax" placeholder="Coupon Code" class="form-control @error('coupon_code') is-invalid  @enderror" autocomplete="off">
                            @error('coupon_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Coupon Discount:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="text" name="coupon_discount" id="category_name-ajax" placeholder="Coupon Discount" class="form-control @error('coupon_discount') is-invalid  @enderror" autocomplete="off">
                            @error('coupon_discount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h5 class="font-14 mb-1">Coupon Validity:</h5>
                            <p class="sub-header mb-2"> </p>                                                      
                            <input type="date" name="coupon_validity" id="category_name-ajax" placeholder="Category Name" class="form-control @error('coupon_validity') is-invalid  @enderror" autocomplete="off">
                            @error('coupon_validity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                        <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>    
                </div>
                </div>
    </div>                      
    </div>
 </div>                                       
@endsection
