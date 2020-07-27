@extends('client.master')
@section('title')
{{$product->name}}
@stop
@section('content')
 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{$product->name}}</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row  product-details-inner">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-large-slider">
                            @foreach($pro_img as $value)
                            <div class="pro-large-img img-zoom">
                                <img src="{{$value->image}}" alt="product-details" />
                                <a href="{{$value->image}}" data-fancybox="images"><i class="fa fa-search"></i></a>
                            </div>
                            @endforeach

                        </div>
                        <div class="product-nav">
                            @foreach($pro_img as $value)
                            <div class="pro-nav-thumb">
                                <img src="{{$value->image}}" alt="product-details" />
                            </div>
                            @endforeach
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content">
                            <div class="product-info">
                                <h3>{{$product->name}}</h3>
                                
                                <div class="price-box">
                                     @if($product->sale_price==0)
                                        <span class="new-price">${{$product->price}}</span>
                                     @else
                                        <span class="new-price">${{$product->sale_price}}</span>
                                        <span class="old-price">${{$product->price}}</span>
                                     @endif
                                    
                                </div>
                                <p>{{$product->description}}</p>

                                <div class="single-add-to-cart">
                                    <form action="{{route('add-cart',$product->id)}}" class="cart-quantity d-flex">
                                        @csrf
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" class="input-text" name="quantity" value="1" title="Qty">
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add To Cart</button>
                                    </form>
                                </div>
                                <ul class="single-add-actions">
                                    <li class="add-to-wishlist">
                                        <a href="{{route('add-wishlist',$product->id)}}" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                    </li>
                                    <li class="add-to-compare">
                                        <div class="compare-button"><a href="compare.html"><i class="icon-refresh"></i> Compare</a></div>
                                    </li>
                                </ul>
                                <ul class="stock-cont">
                                    <li class="product-sku">Sku: <span>P006</span></li>
                                    <li class="product-stock-status">Categories: <a href="#">Butter & Eggs,</a> <a href="#">Cultured Butter</a></li>
                                    <li class="product-stock-status">Tag: <a href="#">Man</a></li>
                                </ul>
                                <div class="share-product-socail-area">
                                    <p>Share this product</p>
                                    <ul class="single-product-share">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-toggle="tab" role="tab" href="#reviews">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            {{$product->description}}
                                        </div>

                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">
                                        <!-- Start Single Review -->
                                        @foreach($comment as $value)
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{url('public/client')}}/images/other/reviewer-60x60.jpg">
                                            </div>
                                            
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    
                                                    <h5>{{$value->user['name']}}<span> {{$value->created_at}}</span></h5>

                                                </div>
                                                <p>{!!$value->content!!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <div class="rating_wrap mt-50">
                                        <h5 class="rating-title-1">Add a comment </h5>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        
                                        
                                    </div>
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if($count>0)
                                                <form action="{{route('addComment',$product->id)}}" method="POST" class="comment-form-area">
                                                    @csrf
                                                    <div class="row comment-input">
                                                        <div class="col-md-6 comment-form-author mt-15">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" required="required" name="Name" value="{{session('user')['name']}}">
                                                        </div>
                                                        <div class="col-md-6 comment-form-email mt-15">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" required="required" name="email" value="{{session('user')['email']}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="comment-form-comment mt-15">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes" name="content" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit mt-15">
                                                        <input type="submit" value="Submit" class="comment-submit">
                                                    </div>                                              
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3> Related Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row product-active-lg-4">
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-02.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 002</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$49.00</span>
                                        <span class="old-price">$90.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-03.png" alt="">
                                    </a>

                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 003</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$55.00</span>
                                        <span class="old-price">$76.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-04.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$64.00</span>
                                        <span class="old-price">$72.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-05.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
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
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-01.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$42.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                    </div>
                </div>

                <div class="related-product-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3>Upsell Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row product-active-lg-4">
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-12.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 002</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$49.00</span>
                                        <span class="old-price">$90.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-13.png" alt="">
                                    </a>

                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 003</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$55.00</span>
                                        <span class="old-price">$76.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-14.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 004</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$64.00</span>
                                        <span class="old-price">$72.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-15.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 005</a></h4>
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
                                    <a href="product-details.html">
                                        <img class="primary-image" src="assets/images/product/product-01.png" alt="">
                                    </a>
                                    <div class="label-product label_new">New</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <ul class="watch-color">
                                        <li class="twilight"><span></span></li>
                                        <li  class="portage"><span></span></li>
                                        <li class="pigeon"><span></span></li>
                                    </ul>
                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name"><a href="product-details.html">Simple Product 001</a></h4>
                                    <div class="price-box">
                                        <span class="new-price">$42.00</span>
                                        <span class="old-price">$49.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- main-content-wrap end -->
        @stop