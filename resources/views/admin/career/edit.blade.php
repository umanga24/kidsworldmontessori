@extends('layouts.admin')
@section('title','Edit Gallery')
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
	<h1>Gallery<small>Edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Gallery</a></li>
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
	<form method="post" action="{{route('gallery.update',$detail->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Edit Gallery</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Title(required)</label>
							<input type="text" name="title" class="form-control" value="{{$detail->title}}">
						</div>





						<div class="box-header with-heading">
							<h3 class="box-title">Image</h3>


							<div class="form-group">
								<label>Upload Image</label>
								<input type="file" name="image" class="form-control">
							</div>

							<!--	<div class="form-group">
								<label>Upload Multile Image</label>
								<input type="file" name="images[]" class="form-control">
							</div>
						</div>  -->


							<div class="form-group">
								<input type="submit" name="save" value="save" class="btn btn-success">
							</div>
							<!-- <div class="form-group">
						<label>Slug</label>
						<input type="text" name="slug" class="form-control" value="{{$detail->slug}}">
					</div> -->
							<!--	<div class="form-group">
						<label>Location</label>
						<input type="text" name="location" class="form-control" value="{{$detail->location}}">
					</div>
					<div class="form-group">
						<label>Number_of_openings</label>
						<input type="text" name="number_of_openings" class="form-control" value="{{$detail->number_of_openings}}">
					</div>
					<div class="form-group">
						<label>Expiry Date</label>
						<input type="date" name="expiry_date" class="form-control" value="{{$detail->expiry_date}}">
					</div> -->
							<!-- <div class="form-group">
						<label>Short Desecripton</label>
						<textarea  name="short_description" class="form-control">{{old('short_description')}}</textarea>
					</div> -->
							<!--	<div class="form-group">
						<label>Description(required)</label>
						<textarea id="my-editor" name="description" class="form-control">{{$detail->description}}</textarea>
					</div>  -->

						</div>
					</div>
				</div>

	</form>




	<form method="post" action="{{ route('gallerydetail.store') }}" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<input type="hidden" name="gallery_id" value="{{ $galleryId }}">

			<label>Upload Multile Image</label>
			<input type="file" name="image2[]" class="form-control" multiple>
		</div>
		<div class="form-group">
			<button type="submit" value="save" class="btn btn-success">Save</buttton>
		</div>
</div>



</form>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>S.N.</th>


			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		@php($i=1)
		@foreach($detail->galleryDetails as $galleryDetail)
		<tr>
			<td>{{$i}}</td>


			<td><img src="{{asset('images/listing/'.$galleryDetail->image2)}}"></td>

			<td>

				<form method="post" action="{{route('gallerydetail.destroy',$galleryDetail->id)}}" class="delete">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit" class="btn  btn-danger btn-delete" style="display:inline">Delete</button>
				</form>
			</td>

		</tr>
		@php($i++)
		@endforeach

	</tbody>
</table>










<div class="col-md-4">
	<!-- <div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Image</h3>
				</div>
				<div class="box-body">
					
					<div class="form-group">
					   <label>Upload Image</label>
					   <input type="file" name="image" class="form-control">
					</div>
				</div>
			</div> -->

	<!--	<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Publish</h3>
				</div>
				<div class="box-body">
						<div class="form-group">
								<label for="publish"><input type="checkbox" id="publish" name="publish" checked> Publish</label>
						</div>
				    
				</div>
			</div> -->
</div>
</div>

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
<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
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
	CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,ShowBlocks,About';

	$('#timepicker1').timepicker();
	$('.message').delay(5000).fadeOut(400);
</script>
@endpush