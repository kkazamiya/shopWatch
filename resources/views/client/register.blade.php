@extends('client.master')
@section('title','Register')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">login &amp; register</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb lagin-and-register-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <!-- login-register-tab-list start -->
                    <div class="login-register-tab-list nav">

                        <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <!-- login-register-tab-list end -->
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="login-input-box">
                                            <input type="text" name="name" placeholder="User Name">
                                            @if($errors->has('name'))
                                            <div class="helper" style="color:red">
                                                <span>{{$errors->first('name')}}</span>
                                            </div>
                                            @endif

                                            <input type="password" name="password" placeholder="Password">
                                            @if($errors->has('password'))
                                            <div class="helper" style="color:red">
                                                <span>{{$errors->first('password')}}</span>
                                            </div>
                                            @endif
                                            
                                            <input name="email" placeholder="Email" type="email">
                                            @if($errors->has('email'))
                                            <div class="helper" style="color:red">
                                                <span>{{$errors->first('email')}}</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="button-box">
                                            <div>
                                                <button class="register-btn btn" type="submit"><span>Register</span></button>
                                            </div>


                                        </div>
                                        <div>
                                            <a href="{{route('clientLogin')}}" title="">All ready have acount? Login.</a>  
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
<!-- main-content-wrap end -->
@stop