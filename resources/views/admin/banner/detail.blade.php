@extends('admin.master')

@section('title', 'Chi tiết banner')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<h3>Ảnh banner</h3>
		<img src="{{$banner->image}}" alt="">
		<h3>Nội dung banner</h3>
		<p>{{$banner->content}}</p>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->

				<!-- /.nav-tabs-custom -->


				<!-- /.content-wrapper -->


				@stop