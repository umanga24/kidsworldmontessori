@extends('layouts.admin')
@section('title','Edit Page')
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
	<h1>Page<small>Edit</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Page</a></li>
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
	<form method="post" action="{{route('page.update',$detail->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Edit Page</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" value="{{$detail->title}}" disabled>
						</div>
						@if($detail->slug=='message' ||$detail->slug=='suggestion')
						<div class="form-group">
							<label>Name</label>
							<input id="name" name="name" class="form-control" value="{{$detail->name}}" />
						</div>

						<div class="form-group">
							<label>Position</label>
							<input id="position" name="position" class="form-control" value="{{$detail->position}}" />
						</div>
						@endif


						<div class="form-group">
							<label>Description(required)</label>
							<textarea id="my-editor" name="description" class="form-control">{{$detail->description}}</textarea>
						</div>

					</div>
				</div>
				@if($detail->slug=='about-us' || $detail->slug=='company-profile')
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Our Mission</h3>
					</div>
					<div class="box-body">


						<div class="form-group">
							<label>Description</label>
							<textarea id="my-editor1" name="our_mission_desc" class="form-control">{{$detail->our_mission_desc}}</textarea>
						</div>

					</div>
				</div>
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Our Vission</h3>
					</div>
					<div class="box-body">


						<div class="form-group">
							<label>Description</label>
							<textarea id="my-editor2" name="our_vission_desc" class="form-control">{{$detail->our_vission_desc}}</textarea>
						</div>

					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Message to Our Partners</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Description</label>
							<textarea id="my-editor3" name="partner_desc" class="form-control">{{$detail->partner_desc}}</textarea>
						</div>

					</div>
				</div>
				@endif
				@if($detail->slug=='services')
				<div class="box box-primary">
					<div class="box-header with-heading">
						<h3 class="box-title">Quote</h3>
					</div>
					<div class="box-body">


						<div class="form-group">
							<label>Description</label>
							<textarea name="quote" class="form-control">{{$detail->quote}}</textarea>
						</div>

					</div>
				</div>
				@endif

			</div>
			<div class="col-md-4">
				<div class="box box-warning">
					<div class="box-header with-heading">
						<h3 class="box-title">Images</h3>
					</div>
					<div class="box-body">

						<div class="form-group">
							<label>Imagess </label>
							<input type="file" name="image1" class="form-control">
							@if($detail->image1)
							<img src="{{asset('images/main/'.$detail->image1)}}" width="150" height="150" class="img-responsive">
							@endif
						</div>
						@if($detail->slug=='message' || $detail->slug=='about-us' || $detail->slug=='suggestion')
						<div class="form-group">
							<label>Banner Image</label>
							<input type="file" name="image2" class="form-control">
							@if($detail->image2)
							<img src="{{asset('images/main/'.$detail->image2)}}" width="150" height="150" class="img-responsive">
							@endif
						</div>

						@endif



						@if( $detail->slug=='about-us')
						<div class="form-group">
							<label>Why Choose use Image</label>
							<input type="file" name="image3" class="form-control">
							@if($detail->image3)
							<img src="{{asset('images/main/'.$detail->image3)}}" width="150" height="150" class="img-responsive">
							@endif
						</div>

						<div class="form-group">
							<label>Our Services Image</label>
							<input type="file" name="image4" class="form-control">
							@if($detail->image4)
							<img src="{{asset('images/main/'.$detail->image4)}}" width="150" height="150" class="img-responsive">
							@endif
						</div>
						
						@endif


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
<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
<!-- datepicker -->
<script>
	CKEDITOR.replace('my-editor');
	CKEDITOR.config.height = 200;
	CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
	CKEDITOR.config.colorButton_enableMore = true;
	CKEDITOR.config.floatpanel = true;
	CKEDITOR.config.format_tags = 'p;h2;h3;h4;h5;h6;pre;address;div';
	CKEDITOR.config.panel = true;
	CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,ShowBlocks,About';


	CKEDITOR.replace('my-editor1');
	CKEDITOR.config.height = 200;
	CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
	CKEDITOR.config.colorButton_enableMore = true;
	CKEDITOR.config.floatpanel = true;
	CKEDITOR.config.format_tags = 'p;h2;h3;h4;h5;h6;pre;address;div';
	CKEDITOR.config.panel = true;
	CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,ShowBlocks,About';

	CKEDITOR.replace('my-editor2');
	CKEDITOR.config.height = 200;
	CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
	CKEDITOR.config.colorButton_enableMore = true;
	CKEDITOR.config.floatpanel = true;
	CKEDITOR.config.format_tags = 'p;h2;h3;h4;h5;h6;pre;address;div';
	CKEDITOR.config.panel = true;
	CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,ShowBlocks,About';


	CKEDITOR.replace('my-editor3');
	CKEDITOR.config.height = 200;
	CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
	CKEDITOR.config.colorButton_enableMore = true;
	CKEDITOR.config.floatpanel = true;
	CKEDITOR.config.format_tags = 'p;h2;h3;h4;h5;h6;pre;address;div';
	CKEDITOR.config.panel = true;
	CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,ShowBlocks,About';




	$('#timepicker1').timepicker();
	$('.message').delay(5000).fadeOut(400);
</script>
@endpush