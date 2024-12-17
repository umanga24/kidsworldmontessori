@extends('layouts.admin')
@section('title','Edit Branch')
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
	<h1>ShareHolder<small>Edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">ShareHolder</a></li>
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
	<form method="post" action="{{route('branch.update',$detail->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Add ShareHolder</h3>
					</div>
					<div class="box-body">

						<div class="form-group">
							<label>Name(required)</label>
							<input type="text" name="name" class="form-control" value="{{$detail->name}}">
						</div>
						<!--	<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" value="{{$detail->phone}}">
						</div> -->
						<!--<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="{{$detail->email}}">
						</div> -->
						<!--	<div class="form-group">
							<label>Timing</label>
							<input type="text" name="timing" class="form-control" value="{{$detail->timing}}">
						</div> -->
						<div class="form-group">
							<label>Full Address</label>
							<textarea class="form-control" name="address" rows="6">{{$detail->address}}</textarea>
						</div>
						<!--	<div class="form-group">
							<label>Map</label>
							<textarea class="form-control" name="map" rows="6">{{$detail->map}}</textarea>
						</div> -->


					</div>
				</div>
			</div>
			<div class="col-md-4">

			<!--	<div class="box box-warning">
					<div class="box-header with-heading">
						<h3 class="box-title">Publish</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="publish"><input type="checkbox" id="publish" name="publish" {{$detail->publish==1?'checked':''}}> Publish</label>
						</div>-->
						<div class="form-group">
							<label>Sort Order</label>
							<input type="text" name="sort_order" class="form-control" value="{{$detail->sort_order}}">
						</div>
						<div class="form-group">
							<input type="submit" name="save" value="save" class="btn btn-success">
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
	var options = {
		filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
		filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
		filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
	};
	CKEDITOR.replace('my-editor', options);
	CKEDITOR.config.height = 200;
	CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
	CKEDITOR.config.colorButton_enableMore = true;
	CKEDITOR.config.floatpanel = true;
	CKEDITOR.config.panel = true;
	CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,Format,ShowBlocks,About';

	$('#timepicker1').timepicker();
	$('.message').delay(5000).fadeOut(400);
</script>
@endpush