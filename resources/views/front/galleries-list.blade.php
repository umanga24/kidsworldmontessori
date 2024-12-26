@extends('front.includes.app')
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url(images/gallery.jpg)">
    <div class="auto-container">
        <h1>Gallery</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Gallery</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Gallery Section Three-->
<section class="gallery-section-three gallery-list" style="background-image: url(images/1.png)">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Gallery Block-->
            @foreach($galleries as $gallery)
            <div class="gallery-block-three col-lg-4 col-md-6 col-sm-12">
                <a href="{{route('gallerydetail',$gallery->id)}}">
                    <div class="inner-box ">
                        <figure class="image-box">
                            <img src="{{asset('images/listing/'.$gallery->image)}}" alt="">
                            <div class="gallery-box">
                                <h4>{{$gallery->title }}</h4>
                            </div>
                        </figure>
                    </div>
                </a>
            </div>
            @endforeach
           


        </div>
    </div>
</section>
<!--End Gallery Section Three-->







@endsection