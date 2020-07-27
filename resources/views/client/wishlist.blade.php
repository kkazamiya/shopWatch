@extends('client.master')
@section('title','wishlist')
@section('content')
<!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Wishlist Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       
                            <div class=" table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="plantmore-product-price">Unit Price</th>
                                            <th class="plantmore-product-stock-status">Stock Status</th>
                                            <th class="plantmore-product-add-cart">Add to cart</th>
                                            <th class="plantmore-product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pro as $value)
                                        <tr>
                                            <td class="plantmore-product-thumbnail"><a href="{{route('productDetail',$value->slug)}}"><img src="{{$value->image}}" alt=""></a></td>
                                            <td class="plantmore-product-name"><a href="{{route('productDetail',$value->slug)}}">{{$value->name}}</a></td>
                                            <td class="plantmore-product-price"><span class="amount">{{$value->price}}</span></td>
                                            <td class="plantmore-product-stock-status"><span class="in-stock">{{($value->status==1)? 'Instock' :'Out of stock'}}</span></td>
                                            <td class="plantmore-product-add-cart"><a href="{{route('add-cart',$value->id)}}">add to cart</a></td>


                                            <td class="plantmore-product-remove"><form action="{{route('delete-wishlist',$value->id)}}" method="post">@csrf<button type="submit" class="fa fa-times"></button></form></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
    @stop