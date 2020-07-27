 @extends('client.master')
@section('title','search')

@section('content')
 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Search</li>
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
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- shop-sidebar-wrap start -->
                        <div class="shop-sidebar-wrap">
                            <div class="shop-box-area">

                                <!--sidebar-categores-box start  -->
                                <div class="sidebar-categores-box shop-sidebar mb-30">
                                    <h4 class="title">Product categories</h4>
                                    <!-- category-sub-menu start -->
                                    <div class="category-sub-menu">
                                         @foreach($category as $value)
                                                <li>
                                                    <a href="{{route('product',$value->slug)}}">{{$value->name}}</a>                                                
                                                </li>
                                                 @endforeach
                                    </div>
                                    <!-- category-sub-menu end -->
                                </div>
                                <!--sidebar-categores-box end  -->

                                <!-- shop-sidebar start -->
                                <div class="shop-sidebar mb-30">
                                    <h4 class="title">Filter By Price</h4>
                                    <!-- filter-price-content start -->
                                    <div class="filter-price-content">
                                        <form action="#" method="post">
                                            <div id="price-slider" class="price-slider"></div>
                                            <div class="filter-price-wapper">

                                                <a class="add-to-cart-button" href="#">
                                                    <span>FILTER</span>
                                                </a>
                                                <div class="filter-price-cont">

                                                    <span>Price:</span>
                                                    <div class="input-type">
                                                        <input type="text" id="min-price" readonly="" />
                                                    </div>
                                                    <span>—</span>
                                                    <div class="input-type">
                                                        <input type="text" id="max-price" readonly="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- filter-price-content end -->
                                </div>
                                <!-- shop-sidebar end -->

                                

                                

                            </div>
                        </div>
                        <!-- shop-sidebar-wrap end -->
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">

                        <!-- shop-product-wrapper start -->
                        <div class="shop-product-wrapper">
                            <div class="row align-itmes-center">
                                <div class="col">
                                    <!-- shop-top-bar start -->
                                    <div class="shop-top-bar">
                                        <!-- product-view-mode start -->

                                        <div class="product-mode">
                                            <!--shop-item-filter-list-->
                                            <ul class="nav shop-item-filter-list" role="tablist">
                                                <li class="active"><a class="active grid-view" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>
                                                <li><a class="list-view" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a></li>
                                            </ul>
                                            <!-- shop-item-filter-list end -->
                                        </div>
                                        <!-- product-view-mode end -->
                                        <!-- product-short start -->
                                        <div class="product-short">
                                            <p>Sort By :</p>
                                            <select class="nice-select" name="sortby">
                                                <option value="1">Relevance</option>
                                                <option value="2">Name(A - Z)</option>
                                                <option value="3">Name(Z - A)</option>
                                                <option value="4">Price(Low > High)</option>
                                                <option value="5">Price(High > Low)</option>
                                                
                                            </select>
                                        </div>
                                        <!-- product-short end -->
                                    </div>
                                    <!-- shop-top-bar end -->
                                </div>
                            </div>

                            <!-- shop-products-wrap start -->
                            <div class="shop-products-wrap">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="grid">
                                        <div class="shop-product-wrap">
                                            <div class="row">
                                                @foreach($product as $pro)
                                                <div class="col-lg-4 col-md-6">
                                                    <!-- single-product-area start -->
                                                    <div class="single-product-area mt-30">
                                                        <div class="product-thumb">
                                                            <a href="{{route('productDetail',$pro->slug)}}">
                                                                <img class="primary-image" src="{{$pro->image}}" alt="">
                                                            </a>
                                                            <div class="label-product label_new">New</div>
                                                            <div class="action-links">
                                                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
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
                                    <div class="tab-pane" id="list">
                                        <div class="shop-product-list-wrap">
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{route('productDetail',$pro->slug)}}"><img src="assets/images/product/product-01.png" alt="Produce Images"></a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">
                                                       
                                                        <h4><a href="{{route('productDetail',$pro->slug)}}" class="product-name">Auctor gravida enim</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">$99.00</span>
                                                            <span class="old-price">$110.00</span>
                                                        </div>

                                                        <div class="product-rating">
                                                            <ul class="d-flex">
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto suscipit aliquam, dignissimos nesciunt, quos voluptas tenetur necessitatibus voluptate vitae quo quibusdam nihil.</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            <li class="product-sku">Sku: <span>P006</span></li>
                                                            <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>
                                                        </ul>
                                                        <div class="product-button">
                                                           
                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                                                </li>
                                                            </ul>
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    <a href="#" class="add-to-cart">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shop-product-list-wrap">
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{route('productDetail',$pro->slug)}}"><img src="assets/images/product/product-02.png" alt="Produce Images"></a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">
                                                       
                                                        <h4><a href="{{route('productDetail',$pro->slug)}}" class="product-name">Auctor gravida enim</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">$99.00</span>
                                                            <span class="old-price">$110.00</span>
                                                        </div>

                                                        <div class="product-rating">
                                                            <ul class="d-flex">
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto suscipit aliquam, dignissimos nesciunt, quos voluptas tenetur necessitatibus voluptate vitae quo quibusdam nihil.</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            <li class="product-sku">Sku: <span>P006</span></li>
                                                            <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>
                                                        </ul>
                                                        <div class="product-button">
                                                           
                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                                                </li>
                                                            </ul>
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    <a href="#" class="add-to-cart">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{route('productDetail',$pro->slug)}}"><img src="assets/images/product/product-03.png" alt="Produce Images"></a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">
                                                       
                                                        <h4><a href="{{route('productDetail',$pro->slug)}}" class="product-name">Auctor gravida enim</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">$99.00</span>
                                                            <span class="old-price">$110.00</span>
                                                        </div>

                                                        <div class="product-rating">
                                                            <ul class="d-flex">
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto suscipit aliquam, dignissimos nesciunt, quos voluptas tenetur necessitatibus voluptate vitae quo quibusdam nihil.</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            <li class="product-sku">Sku: <span>P006</span></li>
                                                            <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>
                                                        </ul>
                                                        <div class="product-button">
                                                           
                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                                                </li>
                                                            </ul>
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    <a href="#" class="add-to-cart">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{route('productDetail',$pro->slug)}}"><img src="assets/images/product/product-04.png" alt="Produce Images"></a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">
                                                       
                                                        <h4><a href="{{route('productDetail',$pro->slug)}}" class="product-name">Auctor gravida enim</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">$99.00</span>
                                                            <span class="old-price">$110.00</span>
                                                        </div>

                                                        <div class="product-rating">
                                                            <ul class="d-flex">
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto suscipit aliquam, dignissimos nesciunt, quos voluptas tenetur necessitatibus voluptate vitae quo quibusdam nihil.</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            <li class="product-sku">Sku: <span>P006</span></li>
                                                            <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>
                                                        </ul>
                                                        <div class="product-button">
                                                           
                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                                                </li>
                                                            </ul>
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    <a href="#" class="add-to-cart">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrap end -->
                             {{ $product->links() }}

                            <!-- paginatoin-area start -->
                            <!-- <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="pagination-box">
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a class="Next" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
        @stop