@extends('layouts.admin')	
@section('title','Setting')
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
	<h1>Setting<small>edit</small></h1>
	<!-- <ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Page</a></li>
		<li><a href="">Edit</a></li>
	</ol> -->
</section>

<div class="content">
	
		@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible message">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	      		<span aria-hidden="true">&times;</span>
	    	</button>
	    	{!! Session::get('message') !!}
		</div>
		@endif
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
<form method="post" action="{{route('setting.update',$detail->id)}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="row">
		<div class="col-md-7">
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Contact Info</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control" value="{{$detail->address}}" >
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" value="{{$detail->phone}}" >
					</div>
					
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" value="{{$detail->email}}">
					</div>
					
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Social Media</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Facebook</label>
						<input type="text" name="facebook" value="{{$detail->facebook}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Instagram</label>
						<input type="text" name="instagram" value="{{$detail->instagram}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Twitter</label>
						<input type="text" name="twitter" value="{{$detail->twitter}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Youtube</label>
						<input type="text" name="linkedin" value="{{$detail->linkedin}}" class="form-control">
					</div>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Texts</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>About Us</label>
						<textarea id="my-editor" class="form-control" name="about_us">{{$detail->about_us}}</textarea>
					</div>
					
					
					
					
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-header with-heading">
					<h3 class="box-title">Map</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Map</label>
						<textarea name="map" class="form-control" rows="3">{!!$detail->map!!}</textarea>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<!-- <div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Banking Hour</h3>
				</div>
				<div class="box-body">
					
					<div class="form-group">
						<label>Sunday</label>
						<input type="text" name="sunday" value="{{$detail->sunday}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Monday</label>
						<input type="text" name="monday" value="{{$detail->monday}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Tuesday</label>
						<input type="text" name="tuesday" value="{{$detail->tuesday}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Wednesday</label>
						<input type="text" name="wednesday" value="{{$detail->wednesday}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Thursday</label>
						<input type="text" name="thursday" value="{{$detail->thursday}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Friday</label>
						<input type="text" name="friday" value="{{$detail->friday}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Saturday</label>
						<input type="text" name="saturday" value="{{$detail->saturday}}" class="form-control">
					</div>
				</div>
			</div>
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Stock Exchange</h3>
				</div>
				<div class="box-body">
					
					<div class="form-group">
						<label>As Of</label>
						<input type="text" name="as_of" value="{{$detail->as_of}}" class="form-control" placeholder="2022-10-15 12:00:00">
					</div>
					<div class="form-group">
						<label>Max Price</label>
						<input type="text" name="max_price" value="{{$detail->max_price}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Min Price</label>
						<input type="text" name="min_price" value="{{$detail->min_price}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Closing Price</label>
						<input type="text" name="closing_price" value="{{$detail->closing_price}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Previous Closing</label>
						<input type="text" name="previous_closing" value="{{$detail->previous_closing}}" class="form-control">
					</div>
					<div class="form-group">
						<label>Difference</label>
						<input type="text" name="difference" value="{{$detail->difference}}" class="form-control">
					</div>
					
				</div>
			</div> -->
			<div class="box box-warning">
				<div class="box-header with-heading">
					<h3 class="box-title">Image</h3>
				</div>
				<div class="box-body">
					
					<div class="form-group">
					   <label>Upload Image 1 </label>
					   <input type="file" name="image1" class="form-control">
					   @if($detail->image1)
					   <img src="{{asset('images/main/'.$detail->image1)}}" width="150" height="150" class="img-responsive">
					   @endif
					</div>
					<div class="form-group">
					   <label>Upload Image 2</label>
					   <input type="file" name="image2" class="form-control">
					   @if($detail->image2)
					   <img src="{{asset('images/main/'.$detail->image2)}}" width="150" height="150" class="img-responsive">
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
    config.removeButtons = 'Save,NewPage,ExportPdf,Preview,Source,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Unlink,Flash,PageBreak,Iframe,Styles,ShowBlocks,About';

  	$('#timepicker1').timepicker();
  	$('.message').delay(5000).fadeOut(400);
    </script>
@endpush