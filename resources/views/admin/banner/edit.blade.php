@extends('layouts.admin')
@section('title','Edit Banner')
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
    <h1>Banner<small>Edit</small></h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="">Banner</a></li>
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
    <form method="post" action="{{route('banner.update',$detail->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-heading">
                        <h3 class="box-title">Edit Banner</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-header with-heading">
                            <h3 class="box-title">Upload Banners</h3>
                            <div class="form-group">
                                <label>Updates Banner</label>
                                <input type="file" name="updates" class="form-control">
                                @if($detail->updates)
							<img src="{{asset('images/main/'.$detail->updates)}}" width="150" height="150" class="img-responsive">
							@endif
                            </div>
                            <div class="form-group">
                                <label>Contact Us Banner</label>
                                <input type="file" name="contactus" class="form-control">
                                @if($detail->contactus)
							<img src="{{asset('images/main/'.$detail->contactus)}}" width="150" height="150" class="img-responsive">
							@endif
                            </div>
                            <div class="form-group">
                                <label>Team Banner</label>
                                <input type="file" name="team" class="form-control">
                                @if($detail->team)
							<img src="{{asset('images/main/'.$detail->team)}}" width="150" height="150" class="img-responsive">
							@endif
                            </div>
                            <div class="form-group">
                                <label>Gallery Banner</label>
                                <input type="file" name="gallery" class="form-control">
                                @if($detail->gallery)
							<img src="{{asset('images/main/'.$detail->gallery)}}" width="150" height="150" class="img-responsive">
							@endif
                            </div>

                            <div class="form-group">
                                <input type="submit" name="save" value="save" class="btn btn-success">
                            </div>


                        </div>
                    </div>
                </div>

    </form>

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