 @extends('client.master')
 @section('title','checkout')
 @section('content')
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout Page</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb checkout-page">
    <div class="container">

        <!-- checkout-details-wrapper start -->
        <div class="checkout-details-wrapper">
            <div class="row">
                
                <div class="col-lg-6 col-md-6">
                    <form action="" method="POST">
                        @csrf
                    <!-- billing-details-wrap start -->
                    <div class="billing-details-wrap">
                        
                            <h3 class="shoping-checkboxt-title">Billing Details</h3>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <p class="single-form-row">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="Name" value="{{session('user')['name']}}">
                                    </p>
                                </div>
                                
                                <div class="col-lg-6">
                                    <p class="single-form-row">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="text" name="email" value="{{session('user')['email']}}">
                                    </p>
                                </div>
                                

                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="House number and street name" name="address" value="{{session('user')['address']}}">
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="{{session('user')['phone']}}">
                                    </p>
                                </div>
                                
                               
                               
                                
                            </div>
                        
                    </div>
                    <!-- billing-details-wrap end -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- your-order-wrapper start -->
                    <div class="your-order-wrapper">
                        <h3 class="shoping-checkboxt-title">Your Order</h3>
                        <!-- your-order-wrap start-->
                        <div class="your-order-wrap">
                            <!-- your-order-table start -->
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sum=0
                                        @endphp
                                        @foreach(session('cart') as $value)
                                        @php                                      
                                        $total=$value['price']*$value['quantity'];
                                        $sum=$sum+$total;
                                        @endphp
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{$value['name']}} <strong class="product-quantity"> × {{$value['quantity']}}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{$total}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{$sum}}</span></strong>
                                                <input type="hidden" name="total_price" value="{{$sum}}">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                            </div>
                            <!-- your-order-table end -->

                            <!-- your-order-wrap end -->
                            <div class="payment-method">

                                <div class="order-button-payment">
                                    <button type="submit">Place order</button>
                                   </form>
                                </div>
                            </div>
                            <!-- your-order-wrapper start -->

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- checkout-details-wrapper end -->
    </div>
</div>
<!-- main-content-wrap end -->
@stop