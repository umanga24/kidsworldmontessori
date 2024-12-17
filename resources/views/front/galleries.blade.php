@extends('front.includes.app')
@section('content')


<!--Page Title-->
<section class="page-title" style="background-image:url(https://whitegold.placeforvisit.com/images/listing/1710849191.jpg)">
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

<section class="gallery-section-three" style="background-image: url(images/Banner18.jpg)">
    <div class="auto-container">
        <div class="row clearfix">

            @foreach($galleryDetail as $gallery)

            <div class="gallery-block-three col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="{{asset('images/listing/'.$gallery->image2)}}" alt="">

                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <a href="{{asset('images/listing/'.$gallery->image2)}}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                </div>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
</section>
<!--End Gallery Section Three-->



@endsection