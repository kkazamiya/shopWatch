@extends('admin.master')

@section('title', 'Chi tiết blog')
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
		<div class="row">
			<h3>Tên blog:</h3>
			<h4>{{$blog->name}}</h4>
			<h3>Ảnh blog:</h3>
			<img src="{{$blog->image}}" alt="">
			<h3>Nội dung blog:</h3>
			<div>
				<textarea name="content" id="editor1" rows="10" cols="80">{{$blog->content}}</textarea>
					<script>
               			 CKEDITOR.inline( 'editor1' );
         			</script>
			</div>

		</div>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->

				<!-- /.nav-tabs-custom -->


				<!-- /.content-wrapper -->


				@stop