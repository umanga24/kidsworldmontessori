@extends('layouts.admin')
@section('title','Edit Slider')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
	<h1>Slider<small>edit</small></h1>
	<ol class="breadcrumb">
		<li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Slider</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>
<div class="content">
	@if (count($errors) > 0)
	<div class="alert alert-danger message">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('slider.update',$detail->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Edit Slider</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Title(required)</label>
							<input type="text" name="title" class="form-control" value="{{$detail->title}}">
						</div>
						<div class="form-group">
							<label>Sub Title</label>
							<input type="text" name="sub_title" class="form-control" value="{{$detail->sub_title}}">
						</div>
							<div class="form-group">
							<label>Link</label>
							<input type="text" name="link" class="form-control" value="{{$detail->link}}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				
				<div class="box box-warning">
					<div class="box-header with-heading">
						<h3 class="box-title">Image</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Upload Image</label>
							<input type="file" name="image" class="form-control">
							@if($detail->image)
							<img src="{{asset('images/listing/'.$detail->image)}}">
							@endif
						</div>
						
					</div>
				</div>
				<div class="box box-warning">
					<div class="box-header with-heading">
						<h3 class="box-title">Publish</h3>
					</div>
					<div class="box-body">
						

						<div class="form-group">
							<label for="publish"><input type="checkbox" id="publish" name="publish" {{$detail->publish==1?'checked':''}}> Publish</label>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-info"> publish</button>
							<!-- <input type="submit" name="publish" class="btn btn-success"> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@push('script')

<script>

	
	

  	
  	$('.message').delay(5000).fadeOut(400);
  	
</script>
@endpush