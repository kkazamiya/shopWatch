@extends('admin.master')

@section('title', 'Thêm mới danh mục')
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
			<div class="col-md-8">
				<form action="{{route('admin.category.update',$category[0]->id)}}" method="POST" role="form">
					@method('PUT')
					@csrf
					<legend>Thêm mới danh mục</legend>
				
					<div class="form-group">
						<label for="">Tên danh mục</label>
						<input type="text" class="form-control" id="name" placeholder="Input field" name="name" value="{{$category[0]->name}}" onkeyup="ChangeToSlug()">
					</div>
					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" class="form-control" id="slug" placeholder="Input field" name="slug" value="{{$category[0]->slug}}">
					</div>
						<div class="form-group">
					<label for="">Trạng thái</label>
					<div class="radio">
						<label>
							<input type="radio" name="status" id="input" value="1" {{($category[0]->status == 1)?'checked':''}}>Hiện
						</label>
						<label>
							<input type="radio" name="status" id="input" value="0" {{($category[0]->status == 0)?'checked':''}}>Ẩn
						</label>
					</div>
				</div>
				
					
				
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
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