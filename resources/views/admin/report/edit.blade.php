@extends('layouts.admin')	
@section('title','Edit Report')
@push('admin.styles')
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
@endpush
@section('content')
<section class="content-header">
	<h1>Report<small>edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Report</a></li>
		<li><a href="">Edit</a></li>
	</ol>
</section>
<div class="content">
	@if (count($errors) > 0)
	<div class="alert alert-danger message">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{route('report.update',$detail->id)}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Edit item</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Title(required)</label>
						<input type="text" name="title" class="form-control" value="{{$detail->title}}">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" >{{$detail->description}}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">File</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
					   <label>Upload File</label>
					   <input id="fileUpload" type="file" name="file" class="form-control">
					   @if($detail->file)
					   <a href="{{asset('files/'.$detail->file)}}" download="">Report</a>
					   @else
					   <p>N/A</p>
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
				    	<input type="submit" name="" class="btn btn-success">
				    </div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
  <!-- datepicker -->
  <script>

  	$("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "width" : '50%'
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
  	// CKEDITOR.replace('description');
   //  CKEDITOR.config.height = 200;
  	$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  	
  	$('.message').fadeOut(4000);
    </script>
@endpush