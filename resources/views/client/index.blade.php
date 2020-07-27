@extends('client.master')
@section('title','Home')
@section('content')
<!--  Header Start -->

<!-- Hero Section Start -->
<div class="hero-slider hero-slider-one">

    @foreach($banner as $value)
    <!-- Single Slide Start -->
    <div class="single-slide" style="background-image: url({{$value->image}})">
        <!-- Hero Content One Start -->
        <div class="hero-content-one container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slider-content-text text-left">
                        <h5>{{$value->content}}</h5>

                        <div class="slide-btn-group">
                            <a href="" class="btn btn-bordered btn-style-1">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Content One End -->
    </div>
    <!-- Single Slide End -->
    @endforeach


</div>
<!-- Hero Section End -->

<!-- Banner Area Start -->
<div class="banner-area section-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{url('public/client')}}/images/banner/banner-01.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6  col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{url('public/client')}}/images/banner/banner-02.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Product Area Start -->
<div class="product-area section-pb section-pt-30">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>Best seller products</h4>
                </div>
            </div>
        </div>

        <div class="row product-active-lg-4">
            @foreach($feature as $pro)
            <div class="col-lg-12">
                <!-- single-product-area start -->
                <div class="single-product-area mt-30">
                    <div class="product-thumb">
                        <a href="{{route('productDetail',$pro->slug)}}">
                            <img class="primary-image" src="{{$pro->image}}" alt="">
                        </a>
                        <div class="label-product label_new">New</div>
                        <div class="action-links">
                            <a href="{{route('add-cart',$pro->id)}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                            <a href="{{route('add-wishlist',$pro->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                           
                        </div>

                    </div>
                    <div class="product-caption">
                        <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">{{$pro->name}}</a></h4>
                        <div class="price-box">
                            @if($pro->sale_price > 0)
                            <span class="old-price">
                                {{$pro->price}}đ
                            </span>                                  
                            <span class="new-price">
                                {{$pro->sale_price}}đ
                            </span>
                            @else
                            <span class="new-price">
                                {{$pro->price}}đ
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- single-product-area end -->
            </div>
            @endforeach

        </div>
    </div>
</div>
</div>
<!-- Product Area End -->

<!-- Banner Area Start -->
<div class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{url('public/client')}}/images/banner/banner-03.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6  col-md-6">
                <div class="single-banner mb-30">
                    <a href="#"><img src="{{url('public/client')}}/images/banner/banner-04.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->


<!-- Product Area Start -->
<div class="product-area section-pb section-pt-30">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <ul class="nav product-tab-menu" role="tablist">
                    <li class="product-tab-item nav-item active">
                        <a class="product-tab__link nav-link active" id="nav-featured-tab" data-toggle="tab" href="#nav-featured" role="tab" aria-selected="true">Featured</a>
                    </li>
                    <li class="product-tab__item nav-item">
                        <a class="product-tab__link nav-link" id="nav-new-tab" data-toggle="tab" href="#nav-new" role="tab" aria-selected="false">New Arrivals</a>
                    </li>
                    <li class="product-tab__item nav-item">
                        <a class="product-tab__link nav-link" id="nav-bestseller-tab" data-toggle="tab" href="#nav-bestseller" role="tab" aria-selected="false">Bestseller</a>
                    </li>
                    <li class="product-tab__item nav-item">
                        <a class="product-tab__link nav-link" id="nav-onsale-tab" data-toggle="tab" href="#nav-onsale" role="tab" aria-selected="false">On Sale</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content product-tab__content" id="product-tabContent">
            <div class="tab-pane fade show active" id="nav-featured" role="tabpanel">
                <div class="product-carousel-group">

                    <div class="row product-active-row-4">
                        @foreach($feature as $pro)
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{$pro->image}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="{{route('add-cart',$pro->id)}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="{{route('add-wishlist',$pro->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                       
                                    </div>

                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">{{$pro->name}}</a></h4>
                                    <div class="price-box">
                                        @if($pro->sale_price==0)
                                        <span class="new-price">{{$pro->price}}đ</span>
                                        @else
                                        <span class="new-price">{{$pro->sale_price}}đ</span>
                                        <span class="old-price">{{$pro->price}}đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="nav-new" role="tabpanel">
                <div class="product-carousel-group">

                    <div class="row product-active-row-4">
                        @foreach($new_arrivals as $pro)
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{$pro->image}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="{{route('add-cart',$pro->id)}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="{{route('add-wishlist',$pro->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>

                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">{{$pro->name}}</a></h4>
                                    <div class="price-box">
                                        @if($pro->sale_price==0)
                                        <span class="new-price">{{$pro->price}}đ</span>
                                        @else
                                        <span class="new-price">{{$pro->sale_price}}đ</span>
                                        <span class="old-price">{{$pro->price}}đ</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-bestseller" role="tabpanel">
                <div class="product-carousel-group">

                    <div class="row product-active-row-4">
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-11.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 001</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$44.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-12.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 005</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$35.00</span>
                                        <span class="old-price">$39.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-13.png" alt="">
                                    </a>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                       
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 004</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$42.00</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-07.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 004</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$35.00</span>
                                        <span class="old-price">$39.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-08.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 008</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$75.00</span>
                                        <span class="old-price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-09.png" alt="">
                                    </a>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 009</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$75.00</span>
                                        <span class="old-price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-10.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 010</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$65.00</span>
                                        <span class="old-price">$69.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-11.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                       
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 011</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$45.00</span>
                                        <span class="old-price">$69.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-12.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                       
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 012</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$45.00</span>
                                        <span class="old-price">$69.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-13.png" alt="">
                                    </a>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 013</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$45.00</span>
                                        <span class="old-price">$69.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-14.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 013</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$45.00</span>
                                        <span class="old-price">$69.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{url('public/client')}}/images/product/product-15.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                       
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">Simple Product 015</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$35.00</span>
                                        <span class="old-price">$39.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-onsale" role="tabpanel">
                <div class="product-carousel-group">

                    <div class="row product-active-row-4">
                        @foreach($on_sale as $pro)
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="{{route('productDetail',$pro->slug)}}">
                                        <img class="primary-image" src="{{$pro->image}}" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="{{route('add-cart',$pro->id)}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="{{route('add-wishlist',$pro->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        
                                    </div>

                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="{{route('productDetail',$pro->slug)}}">{{$pro->name}}</a></h4>
                                    <div class="price-box">
                                     @if($pro->sale_price==0)
                                     <span class="new-price">{{$pro->price}}đ</span>
                                     @else
                                     <span class="new-price">{{$pro->sale_price}}đ</span>
                                     <span class="old-price">{{$pro->price}}đ</span>
                                     @endif
                                 </div>
                             </div>
                         </div>
                         <!-- single-product-area end -->
                     </div>
                     @endforeach

                 </div>

             </div>
         </div>
     </div>

 </div>
</div>
<!-- Product Area End -->

<!-- letast blog area Start -->
<div class="letast-blog-area section-pb">
    <div class="container">
        <div class="row">
            @foreach($blog as $value)
            <div class="col-lg-4">
                <div class="singel-latest-blog">
                    <div class="aritcles-content">

                        <h4><a href="{{route('blogDetail',$value->slug)}}" class="articles-name">{{$value->name}}</a></h4>
                    </div>
                    <div class="articles-image">
                        <a href="{{route('blogDetail',$value->slug)}}">
                            <img src="{{$value->image}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach




        </div>
    </div>
</div>
<!-- letast blog area End -->

<!-- our-brand-area start -->
<!-- our-brand-area end -->

{{-- <div class="newletter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newletter-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="newsletter-title mb-30">
                                <h3>Join Our <br><span>Newsletter Now</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-7">
                            <div class="newsletter-footer mb-30">
                                <input type="text" placeholder="Your email address...">
                                <div class="subscribe-button">
                                    <button class="subscribe-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@stop()