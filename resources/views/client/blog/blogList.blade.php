@extends('client.master')
@section('title','blog')
@section('content')
 <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('clientHome')}}">Home</a></li>
                            <li class="breadcrumb-item active">Large Blog  Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
        <div class="main-content-wrap blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- blog-sidebar-wrap start -->
                        <div class="blog-sidebar-wrap section-pt">
                            <div class="blog-sidebar-widget-area">

                                <!--single-widget start  -->
                                <div class="single-widget search-widget mb-30">
                                    <h4 class="widget-title">Search</h4>
                                    <form action="{{route('search')}}" method="POST">
                                        @csrf
                                        <div class="form-input">
                                            <input type="text" name="name" placeholder="Search... ">
                                            <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <!--single-widget start end -->

                                <!--single-widget start  -->
                                <div class="single-widget mb-30">
                                    <h4 class="widget-title">Categories</h4>
                                    <!-- category-widget start -->
                                    <div class="category-widget-list">
                                        <ul>
                                            @foreach($category as $value)
                                            <li><a href="#">{{$value->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- category-widget end -->
                                </div>
                                <!--single-widget end  -->

                                <!--single-widget start  -->
                                <div class="single-widget mb-30">
                                    <h4 class="widget-title">Recent Posts</h4>

                                    <div class="recent-post-widget">
                                        @foreach($recent as $value)
                                        <div class="single-widget-post">
                                            <div class="post-thumb">
                                                <a href="{{route('blogDetail',$value->slug)}}"><img src="{{$value->image}}" alt=""></a>
                                            </div>
                                            <div class="post-info">
                                                <h6 class="post-title"><a href="{{route('blogDetail',$value->slug)}}">{{$value->name}}</a></h6>
                                                <div class="post-date">{{$value->created_at}}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <!--single-widget end  -->

                               

                               
                            </div>
                        </div>
                        <!-- blog-sidebar-wrap end -->
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">

                        <div class="blog-wrapper section-pt">
                            <div class="row">
                                @foreach($blog as $value)
                                <div class="col-lg-6 col-md-6">
                                    <div class="singel-latest-blog">
                                        <div class="articles-image">
                                            <a href="{{route('blogDetail',$value->slug)}}">
                                                <img src="{{$value->image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="aritcles-content">
                                            <div class="author-name">
                                                post at: {{$value->created_at}}
                                            </div>
                                            <h4><a href="{{route('blogDetail',$value->slug)}}" class="articles-name">{{$value->name}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                                {{ $blog->links() }}
                            <!-- paginatoin-area start -->
                         <!--    <div class="paginatoin-area">
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

                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
        @stop