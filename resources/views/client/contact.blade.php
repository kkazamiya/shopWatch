@extends('client.master')
@section('title','About')

@section('content')
<!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- Page Conttent -->
        <main class="page-content section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7625.126625636124!2d-73.90588494684653!3d40.67322975516778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2zVGjDoG5oIHBo4buRIE5ldyBZb3JrLCBUaeG7g3UgYmFuZyBOZXcgWW9yaywgSG9hIEvhu7M!5e0!3m2!1svi!2s!4v1594738334839!5m2!1svi!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="contact-infor">
                            <div class="contact-title">
                                <h3>CONTACT US</h3>
                            </div>
                            <div class="contact-dec">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam nam ex odio expedita, officia temporibus ipsum, placeat magni quibusdam sint, atque distinctio </p>
                            </div>
                            <div class="contact-address">
                                <ul>
                                    <li>Address : No 40 Baria Sreet 133/2 NewYork City</li>
                                    <li>Email: Infor@Ruiztheme.com</li>
                                    <li>Phone: 0(1234) 567 890</li>
                                </ul>
                            </div>
                            <div class="work-hours">
                                <h5>Working hours</h5>
                                <p><strong>Monday &ndash; Saturday</strong>: &nbsp;08AM &ndash; 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--// Page Conttent -->
        @stop