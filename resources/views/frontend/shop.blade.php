@extends('frontend.master')
@section('title')
    All Products || ToHoney
@endsection
@section('content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                        @foreach($category as $cat)
                            <li>
                                <a data-toggle="tab" href="#chair{{ $cat->id }}">{{ $cat->category_name ?? '' }}</a>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                    @foreach($product as $key=>$pro)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if($key >3) moreload @endif">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <img src="{{ url('img/thumbnail').'/'.$pro->product_thumbnail }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $pro->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ route('SingleCart',$pro->id) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ url('/item') }}/{{ $pro->slug }}">{{ $pro->product_name }}</a></h3>
                                    <p class="pull-left">${{ $pro->product_price }}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Modal area start -->
                <div class="modal fade" id="exampleModalCenter{{ $pro->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body d-flex">
                                <div class="product-single-img w-50">
                                    <img src="{{ url('/img/thumbnail') }}/{{ $pro->product_thumbnail }}" alt="{{ $pro->product_thumbnail }}">
                                </div>
                                <div class="product-single-content w-50">
                                    <h3>{{ $pro->product_name }}</h3>
                                    <div class="rating-wrap fix">
                                        <span class="pull-left">${{ $pro->product_price }}</span>
                                        <ul class="rating pull-right">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li>(05 Customar Review)</li>
                                        </ul>
                                    </div>
                                    <p>{{ $pro->product_summery }}</p>
                                    <ul class="input-style">
                                        <li class="quantity cart-plus-minus">
                                            <input type="text" value="1" />
                                        </li>
                                        <li><a href="cart.html">Add to Cart</a></li>
                                    </ul>
                                    <ul class="cetagory">
                                        <li>Categories:</li>
                                        <li><a href="#">{{ $pro->get_category->category_name ?? ''}},</a></li>
                                        <li><a href="#">{{ $pro->get_subcategory->subcategory_name ?? '' }}</a></li>
                                    </ul>
                                    <ul class="socil-icon">
                                        <li>Share :</li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal area start -->
                    @endforeach  
                        <li class="col-12 text-center">
                            <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                        </li>
                    </ul>
                </div>
             @foreach($category as $cate)
                <div class="tab-pane" id="chair{{ $cate->id }}">
                    <ul class="row">
                    @foreach(App\Product::where('category_id',$cate->id)->get() as $items)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <img src="{{ url('img/thumbnail').'/'.$items->product_thumbnail }}" alt="{{ $items->product_name }}">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $items->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ route('SingleCart',$items->id) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ url('/items') }}/{{ $items->slug }}">{{ $items->product_name }}</a></h3>
                                    <p class="pull-left">${{ $items->product_price }}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <div class="modal fade" id="exampleModalCenter{{ $items->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body d-flex">
                                <div class="product-single-img w-50">
                                    <img src="{{ url('/img/thumbnail') }}/{{ $items->product_thumbnail }}" alt="{{ $items->product_thumbnail }}">
                                </div>
                                <div class="product-single-content w-50">
                                    <h3>{{ $items->product_name }}</h3>
                                    <div class="rating-wrap fix">
                                        <span class="pull-left">${{ $items->product_price }}</span>
                                        <ul class="rating pull-right">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li>(05 Customar Review)</li>
                                        </ul>
                                    </div>
                                    <p>{{ $items->product_summery }}</p>
                                    <ul class="input-style">
                                        <li class="quantity cart-plus-minus">
                                            <input type="text" value="1" />
                                        </li>
                                        <li><a href="cart.html">Add to Cart</a></li>
                                    </ul>
                                    <ul class="cetagory">
                                        <li>Categories:</li>
                                        <li><a href="#">{{ $items->get_category->category_name ?? ''}},</a></li>
                                        <li><a href="#">{{ $items->get_subcategory->subcategory_name ?? '' }}</a></li>
                                    </ul>
                                    <ul class="socil-icon">
                                        <li>Share :</li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal area start -->
                    @endforeach
                    </ul>
                </div>
                
            @endforeach
            </div>
        </div>
    </div>
    <!-- product-area end -->
@endsection