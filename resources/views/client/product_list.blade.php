 @extends('client.master')
 @section('title')
 {{$cate->name}}
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
                    <li class="breadcrumb-item active">{{$cate->name}}</li>
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
                                <form action="{{route('productSort',$cate->slug)}}"  role="form">
                                    @csrf
                                    <select class="nice-select" name="sortby" id="sortby" onchange="this.form.submit()">
                                        <option value="1">Relevance</option>
                                        <option value="2">Name(A - Z)</option>
                                        <option value="3">Name(Z - A)</option>
                                        <option value="4">Price(Low > High)</option>
                                        <option value="5">Price(High > Low)</option>
                                    </select>
                                    <noscript><input type="submit" value="Submit"></noscript>
                                </form>


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