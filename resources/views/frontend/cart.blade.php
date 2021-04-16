@extends('frontend.master')
@section('content')
   <!-- .breadcumb-area start -->
   <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                @if(session('delete_cart'))

                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('delete_cart') }}.
                        </div>
                @endif

                @if(session('Updated'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ session('Updated') }}.
                </div>
                @endif

                    <form action="{{ route('UpdateCart') }}" method="post">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php 
                                $total=0;
                            @endphp
                            @forelse($cart as $carts)
                            <input type="hidden" value="{{ $carts->id }}" name="cart_id[]">
                                <tr>
                                    <td class="images"><img width="150" src="{{ url('img/thumbnail').'/'.$carts->product->product_thumbnail }}" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{ $carts->product->product_name }}</a></td>
                                    <td class="ptice">${{ $carts->product->product_price }}</td>
                                    <td class="quantity cart-plus-minus">
                                        <input name="product_quantity[]" type="text" value="{{ $carts->product_quantity }}" />
                                    </td>
                                    @php $total+= $carts->product->product_price * $carts->product_quantity  @endphp
                                    <td class="total">${{ $carts->product->product_price * $carts->product_quantity  }}</td>
                                    <td class="remove"><a href="{{ route('DeleteCart',$carts->id) }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100">No cart data</td>
                                </tr>
                               @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button>Update Cart</button>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input id="coupon_id" name="coupon_code" type="text" placeholder="Cupon Code">
                                        <span class="couponbtn">Apply Cupon</span>
                                    </div>
                                    @php 
                                        $dis=$discount;
                                    @endphp
                                    @if($dis== 'Invalid')
                                    <div class="alert alert-danger alert-dismissible" style="margin-top:5px">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Your Coupon Code is {{ $dis }}</strong> 
                                    </div>
                                    @elseif($dis=='Expired')
                                    <div class="alert alert-danger alert-dismissible" style="margin-top:5px">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Your Coupon Code is {{ $dis  }}</strong> 
                                    </div>
                                    @elseif($dis == null)
                                    @else
                                    <div class="alert alert-success alert-dismissible" style="margin-top:5px">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Your have got {{ $dis}}% discount!</strong> 
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ $total }}</li>
                                        <li><span class="pull-left">Discount % </span>{{ $discount ?? '0' }}</li>
                                        <li><span class="pull-left"> Total </span> ${{ $intotal ?? '0' }}</li>
                                        <input type="hidden" value="{{ $intotal ?? '0' }}" name="intotal">
                                    </ul>
                                    <a href="{{ route('Checkout') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
@section('footer_js')
    <script>
        $(document).ready(function(){
            
            $('.couponbtn').click(function(){
                var Couponcode=$('#coupon_id').val();
                window.location.href="{{ url('/cart') }}/"+Couponcode;
            })
        })
    </script>
@endsection