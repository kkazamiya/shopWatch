 @extends('client.master')
@section('title','Account')
@section('content')
 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">My Account Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb my-account-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="account-dashboard">
                            <div class="dashboard-upper-info">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="d-single-info">
                                            <p class="user-name">Hello <span>{{session('user')['name']}}</span></p>
                                            <p>(not {{session('user')['name']}} ? <a href="{{route('logout')}}">Log Out</a>)</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="d-single-info">
                                            <p>Need Assistance? Customer service at.</p>
                                            <p>admin@devitems.com.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="d-single-info">
                                            <p>E-mail them at </p>
                                            <p>support@yoursite.com</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="d-single-info text-lg-center">
                                            <a href="{{route('view-cart')}}" class="view-cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-2">
                                    <!-- Nav tabs -->
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                        <li><a href="{{route('logout')}}" class="nav-link">logout</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-10">
                                    <!-- Tab panes -->
                                    <div class="tab-content dashboard-content">
                                        <div class="tab-pane active" id="dashboard">
                                            <h3>Dashboard </h3>
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                        <div class="tab-pane fade" id="orders">
                                            <h3>Orders</h3>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order as $value)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$value->created_at}}</td>
                                                            @if($value->status==0)
                                                            <td>Processing</td>
                                                            @elseif($value->status==1)
                                                            <td>Shipping</td>
                                                            @elseif($value->status==2)
                                                            <td>complete</td>
                                                            @endif
                                                            <td>${{$value->total}}</td>
                                                            
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                       
                                        <div class="tab-pane fade" id="account-details">
                                            <h3>Account details </h3>
                                            <div class="login">
                                                <div class="login-form-container">
                                                    <div class="account-login-form">
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <label>Social title</label>
                                                            
                                                            <div class="account-input-box">
                                                                
                                                                <label>Name</label>
                                                                <input type="text" name="name" value="{{session('user')['name']}}">
                                                                <label>Email</label>
                                                                <input type="text" name="email" value="{{session('user')['email']}}">
                                                                <label>Password</label>
                                                                <input type="password" name="password">
                                                                <label>Phone</label>
                                                                <input type="phone" name="phone" value="{{session('user')['phone']}}">
                                                                <label>Address</label>
                                                                <input type="text" name="address" value="{{session('user')['address']}}">

                                                                
                                                            </div>
                                                            
                                                            <div class="button-box">
                                                                <button class="btn default-btn" type="submit">Save</button>
                                                            </div>
                                                        </form>
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
            </div>
        </div>
        <!-- main-content-wrap end -->
        @stop