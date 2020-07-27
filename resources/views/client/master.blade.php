
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ruiz - @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/client')}}/images/favicon.ico">

    <!-- CSS
        ============================================ -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('public/client')}}/css/vendor/bootstrap.min.css">
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{url('public/client')}}/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('public/client')}}/css/vendor/simple-line-icons.css">

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{url('public/client')}}/css/plugins/animation.css">
        <link rel="stylesheet" href="{{url('public/client')}}/css/plugins/slick.css">
        <link rel="stylesheet" href="{{url('public/client')}}/css/plugins/animation.css">
        <link rel="stylesheet" href="{{url('public/client')}}/css/plugins/nice-select.css">
        <link rel="stylesheet" href="{{url('public/client')}}/css/plugins/fancy-box.css">
        <link rel="stylesheet" href="{{url('public/client')}}/css/plugins/jqueryui.min.css">

        <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="{{url('public/client')}}/js/vendor/vendor.min.js"></script>
    <script src="{{url('public/client')}}/js/plugins/plugins.min.js"></script>
-->

<!-- Main Style CSS (Please use minify version for better website load performance) -->
<link rel="stylesheet" href="{{url('public/client')}}/css/style.css">
<!--<link rel="stylesheet" href="{{url('public/client')}}/css/style.min.css">-->

</head>

<body>

    <div class="main-wrapper">

        <!--  Header Start -->
        <header class="header">

            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="language">English <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-info-wrap text-right">
                                <ul class="my-account-container">
                                    @if(session('user'))
                                    <li><a href="{{route('account')}}">{{session('user')['name']}}</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                    <li><a href="{{route('view-cart')}}">Cart</a></li>
                                    <li><a href="{{route('wishlist')}}">Wishlist</a></li>
                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                    @else
                                    <li><a href="{{route('clientRegister')}}">login &amp; register</a></li>
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Header Top End -->

            <!-- haeader Mid Start -->
            <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="{{route('clientHome')}}"><img src="{{url('public/client')}}/images/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form action="{{route('search')}}" method="post" class="search-box-inner">
                                        @csrf
                                        <div class="search-field-wrap">
                                            <input type="text" class="search-field" name="name" placeholder="Search product...">

                                            <div class="search-btn">
                                                <button type="submit"><i class="icon-magnifier"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            @if(session('user'))
                            <div class="right-blok-box text-white d-flex">

                                <div class="user-wrap">
                                    @if($wish>0)
                                    <a href="{{route('wishlist')}}"><span class="cart-total">{{$wish}}</span> <i class="icon-heart"></i></a>
                                    @else
                                    <a href="{{route('wishlist')}}"><i class="icon-heart"></i></a>
                                    @endif
                                </div>

                                <div class="shopping-cart-wrap">
                                    @if(session('cart'))
                                    <a href="{{route('view-cart')}}"><i class="icon-basket-loaded"></i><span class="cart-total">{{count(session('cart'))}}</span></a>
                                    <ul class="mini-cart">                                        
                                        @foreach(session('cart') as $value)
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="{{route('productDetail',$value['id'])}}"><img alt="" src="{{$value['image']}}"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="{{route('productDetail',$value['slug'])}}">
                                                    <h4>{{$value['name']}}</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">{{$value['quantity']}}x</span>
                                                    <div class="price-box"><span class="new-price">{{$value['price']}}đ</span></div>
                                                </div>
                                                <!--  <a class="remove_from_cart" href=""><i class="icon_close"></i></a> -->
                                            </div>
                                        </li>
                                        @endforeach
                                            <!-- <div class="subtotal-title">
                                                <h3>Sub-Total :</h3><span>$ 260.99</span>
                                            </div> -->
                                        </li>
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="{{route('view-cart')}}">View cart</a>
                                                <a href="{{route('checkout')}}">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="shopping-cart-wrap">
                                 <a href="{{route('view-cart')}}"><i class="icon-basket-loaded"></i></a>
                             </div>
                             @endif
                         </div>
                         @endif
                     </div>
                     
                 </div>
             </div>
         </div>
         <!-- haeader Mid End -->

         <!-- haeader bottom Start -->
         <div class="haeader-bottom-area bg-gren header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 d-none d-lg-block">
                        <div class="main-menu-area white_text">
                            <!--  Start Mainmenu Nav-->
                            <nav class="main-navigation text-center">
                                <ul>
                                    <li class="active"><a href="{{route('clientHome')}}">Home

                                       <li><a href="#">Shop <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($category as $value)
                                            <li>
                                                <a href="{{route('product',$value->slug)}}">{{$value->name}}</a>                                                
                                            </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                    <li><a href="{{route('blog')}}">Blog</a>

                                        
                                    </li>

                                    
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    
                                    
                                    
                                </ul>
                            </nav>

                        </div>
                    </div>

                    <div class="col-5 col-md-6 d-block d-lg-none">
                        <div class="logo"><a href="index.html"><img src="{{url('public/client')}}/images/logo/logo.png" alt=""></a></div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                        <div class="right-blok-box text-white d-flex">

                            <div class="user-wrap">
                                <a href="wishlist.html"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                            </div>

                            <div class="shopping-cart-wrap">
                                <a href="#"><i class="icon-basket-loaded"></i><span class="cart-total">2</span></a>
                                <ul class="mini-cart">
                                    <li class="cart-item">
                                        <div class="cart-image">
                                            <a href="product-details.html"><img alt="" src="{{url('public/client')}}/images/product/product-02.png"></a>
                                        </div>
                                        <div class="cart-title">
                                            <a href="product-details.html">
                                                <h4>Product Name 01</h4>
                                            </a>
                                            <div class="quanti-price-wrap">
                                                <span class="quantity">1 ×</span>
                                                <div class="price-box"><span class="new-price">$130.00</span></div>
                                            </div>
                                            <a class="remove_from_cart" href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                    <li class="cart-item">
                                        <div class="cart-image">
                                            <a href="product-details.html"><img alt="" src="{{url('public/client')}}/images/product/product-03.png"></a>
                                        </div>
                                        <div class="cart-title">
                                            <a href="product-details.html">
                                                <h4>Product Name 03</h4>
                                            </a>
                                            <div class="quanti-price-wrap">
                                                <span class="quantity">1 ×</span>
                                                <div class="price-box"><span class="new-price">$130.00</span></div>
                                            </div>
                                            <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                        </div>
                                    </li>
                                    <li class="subtotal-box">
                                        <div class="subtotal-title">
                                            <h3>Sub-Total :</h3><span>$ 260.99</span>
                                        </div>
                                    </li>
                                    <li class="mini-cart-btns">
                                        <div class="cart-btns">
                                            <a href="cart.html">View cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="mobile-menu-btn d-block d-lg-none">
                                <div class="off-canvas-btn">
                                    <a href="#"><img src="{{url('public/client')}}/images/icon/bg-menu.png" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- haeader bottom End -->

        <!-- off-canvas menu start -->

        <!-- off-canvas menu end -->

    </header>

    @yield('content')

    <!-- footer Start -->
    <footer>
        <div class="footer-top section-pb section-pt-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">

                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Contact Info</h6>

                            <div class="footer-addres">
                                <div class="widget-content mb--20">
                                    <p>Address: 123 Main Street, Anytown, <br> CA 12345 - USA.</p>
                                    <p>Phone: <a href="tel:">(012) 800 000 789</a></p>
                                    <p>Fax: <a href="tel:">(012) 800 888 789</a></p>
                                    <p>Email: <a href="tel:">demo@hashthemes.com</a></p>
                                </div>
                            </div>

                            <ul class="social-icons">
                                <li>
                                    <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Information</h6>
                            <ul class="footer-list">
                                <li><a href="{{route('clientHome')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('contact')}}">Quick Contact</a></li>
                                <li><a href="{{route('blog')}}">Blog Pages</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Category</h6>
                            <ul class="footer-list">
                                @foreach($category as $value)
                                <li><a href="{{route('product',$value->slug)}}">{{$value->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-footer mt-40">
                            <h6 class="title-widget">Get the app</h6>
                            <p>GreenLife App is now available on Google Play & App Store. Get it now.</p>
                            <ul class="footer-list">
                                <li><img src="{{url('public/client')}}/images/brand/img-googleplay.jpg" alt=""></li>
                                <li><img src="{{url('public/client')}}/images/brand/img-appstore.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-left-text">
                            <p>Copyright &copy; <a href="#">Ruiz</a> 2019. All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-right-image">
                            <img src="{{url('public/client')}}/images/icon/img-payment.png" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End -->




    <!-- Modal -->
    
</div>

    <!-- JS
        ============================================ -->

        <!-- Modernizer JS -->
        <script src="{{url('public/client')}}/js/vendor/modernizr-3.6.0.min.js"></script>
        <!-- jQuery JS -->
        <script src="{{url('public/client')}}/js/vendor/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="{{url('public/client')}}/js/vendor/popper.min.js"></script>
        <script src="{{url('public/client')}}/js/vendor/bootstrap.min.js"></script>

        <!-- Plugins JS -->
        <script src="{{url('public/client')}}/js/plugins/slick.min.js"></script>
        <script src="{{url('public/client')}}/js/plugins/jquery.nice-select.min.js"></script>
        <script src="{{url('public/client')}}/js/plugins/countdown.min.js"></script>
        <script src="{{url('public/client')}}/js/plugins/image-zoom.min.js"></script>
        <script src="{{url('public/client')}}/js/plugins/fancybox.js"></script>
        <script src="{{url('public/client')}}/js/plugins/scrollup.min.js"></script>
        <script src="{{url('public/client')}}/js/plugins/jqueryui.min.js"></script> 
        <script src="{{url('public/client')}}/js/plugins/ajax-contact.js"></script>

        <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="{{url('public/client')}}/js/vendor/vendor.min.js"></script>
<script src="{{url('public/client')}}/js/plugins/plugins.min.js"></script>
-->

<!-- Main JS -->
<script src="{{url('public/client')}}/js/main.js"></script>

</body>

</html>