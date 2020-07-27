@extends('client.master')
@section('title','Cart')
@section('content')
 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cart Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        
        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="plantmore-product-price">Unit Price</th>
                                            <th class="plantmore-product-quantity">Quantity</th>
                                            <th class="plantmore-product-subtotal">Total</th>
                                            <th class="plantmore-product-subtotal">Update</th>
                                            <th class="plantmore-product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(session('cart'))
                                        @php
                                        $sum=0
                                        @endphp
                                        @foreach($cart->items as $value)
                                        @php                                      
                                        $total=$value['price']*$value['quantity'];
                                        $sum=$sum+$total;
                                        @endphp
                                        <tr>
                                            <td class="plantmore-product-thumbnail"><a href="{{route('productDetail',$value['slug'])}}"><img src="{{$value['image']}}" alt=""></a></td>
                                            <td class="plantmore-product-name"><a href="{{route('productDetail',$value['slug'])}}">{{$value['name']}}</a></td>
                                            <td class="plantmore-product-price"><span class="amount">{{$value['price']}}</span></td>
                                            <td class="">
                                                <form action="{{route('update-cart')}}" method="GET" class="form-inline" role="form">
                                                    <input type="hidden" name="id" value="{{$value['id']}}">
                                                    <input value="{{$value['quantity']}}" type="number" name="quantity" >
                                                                                                  
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{$total}}</span></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-xs">update</button>
                                                </form>
                                            </td>
                                            <td class="plantmore-product-remove">
                                             
                                                <a href="{{route('delete-cart',$value['id'])}}"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coupon-all">

                                        <div class="coupon2">
                                            <a href="{{route('clientHome')}}" class=" continue-btn">Continue Shopping</a>
                                        </div>

                                        
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                           
                                            <li>Total <span>{{$sum}}đ</span></li>
                                        </ul>
                                        <a href="{{route('checkout')}}" class="proceed-checkout-btn">Proceed to checkout</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
        @stop