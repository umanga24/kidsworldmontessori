@extends('front.includes.app')
@section('content')

<!--Main Slider-->
@foreach($notices->take(2) as $key=>$notice)
<div class="modal fade " id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="noticeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noticeModalLabel">Important Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('images/thumbnail/'.$notice->image)}}" alt="img"> class="img-fluid">

            </div>

        </div>
    </div>
</div>
@endforeach
<h1>

</h1>
<section class="main-slider">

    <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach($sliders as $key=>$slider)
        <div class="slide" style="background-image:url('{{asset('images/thumbnail/'.$slider->image)}}')">
            <div class="auto-container">
                <div class="content">
                    <h2>{{$slider->title}}</h2>
                    <div class="text">{{$slider->sub_title}}</div>
                    <div class="link-box">
                        <a href="{{route('page',['about-us'])}}" class="theme-btn btn-style-one"><span class="arrow flaticon-right-arrow-4"></span>About Company</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach




    </div>
</section>
<!--End Main Slider-->

<!-- <div class="marquee-container" onmouseover="pauseMarquee()" onmouseout="resumeMarquee()">
    <div class="btn-title">Updates:</div>
    <marquee behavior="scroll" direction="left" scrollamount="5" id="news-marquee">
        @foreach($allnews as $key=>$news)
        @if($key === 0)
        <div class="marquee-content"> <a href="{{ route('newsInner', $news->slug) }}">{{ $news->title }}</a></div>
        @else
        <div class="marquee-content"> <a href="{{ route('newsInner', $news->slug) }}">{{ $news->title }}</alatest>
        </div>
        @endif
        @endforeach
    </marquee>
</div> -->
<!--Welcome Section-->
<div class="inner-box" style="background-image: url(images/Banner9.jpg)">
    <section class="welcome-section">


        <div class="auto-container">
            <!--Sec Title-->
            <!--<div class="sec-title">-->
            <!--    <h2>Welcome to <br> <span class="theme_color">White Gold Multi Energy</span></h2>-->
            <!--</div>-->
            <div class="row clearfix">

                <!--Image Column-->
                <div class="image-column col-lg-4 col-md-12 col-sm-12 d-lg-block d-none">
                    <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{asset('images/main/'.$dash_setting->image2)}}" alt="" />
                        </div>
                    </div>
                </div>

                <!--Content Column-->
                <div class="content-column col-lg-8 col-md-12 col-sm-12 mt-lg-5 mt-0">
                    <div class="inner-column">
                        <div class="text">
                            <p>{!!$dash_setting->about_us!!}</p>
                        </div>
                        <div class="link-box mt-4">
                            <a href="{{route('page',['about-us'])}}" class="theme-btn btn-style-two"><span class="arrow flaticon-right-arrow-4">Learn More</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--Address Box-->
        <section class="address-box">
            <div class="inner-box" style="background-image: url(images/background/pattern-1.png)">
                <div class="icon-box">
                    <span class="icon flaticon-place"></span>
                </div>
                <h2>Address</h2>
                <div class="text">{!!$dash_setting->address!!}</div>
            </div>
        </section>
        <!--End Address Box-->

    </section>
    <!--End Welcome Section-->
</div>







<!-- Service Section -->
<!-- <section class="services-section">
    <div class="outer-container">
        <div class="auto-container">

            <div class="sec-title centered">
                <div class="title-inner">
                    <h2>Our <span class="theme_color">Lates Gallery</span></h2>
                </div>
            </div>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme">


            @foreach($services as $service)
            <div class="services-block">
                <div class="inner-box">
                    <div class="image-outer">
                        <div class="image">
                    <img src="{{asset('images/thumbnail/'.$service->image)}}" alt="" />
                            <a href="{{route('serviceInner',$service->slug)}}" class="overlay-box lightbox-image"></a> 
                        </div>
                    </div>
                    <div class="lower-content">

                        <h3><a href="{{route('serviceInner',$service->slug)}}">{{$service->title}}</a></h3>
                        <div class="text">{{$service->short_description}}</div>
                    </div>
                </div>
            </div>
            @endforeach





        </div>
    </div>
</section> -->


<!--End Service Section -->

<section class="colorful-stats-section">
    <div>
        <h1>School at a Glance</h1>
    </div>
    <div class="container">
        <div class="stat-item">
            <div class="iconn">
                <i class="fa fa-child" style="color: white;"></i>
            </div>
            <div class="number" data-target="100">0<span>+</span></div>
            <p class="title">Student Activities</p>
        </div>
        <div class="stat-item">
            <div class="iconn">
                <i class="fa fa-futbol-o" style="color: white;"></i>
            </div>
            <div class="number" data-target="20">0<span>+</span></div>
            <p class="title">ECA & CCA Activities</p>
        </div>
        <div class="stat-item">
            <div class="iconn">
                <i class="fa fa-graduation-cap" style="color: white;"></i>
            </div>
            <div class="number" data-target="900">0<span>+</span></div>
            <p class="title">Students Enrolled</p>
        </div>
    </div>
</section>

<!-- Gallery Section-->
<section class="gallery-section">
    <div class="colorful-stats-section">
        <h1>Our Latest One</h1>
    </div>
    <div class="gallery-container owl-carousel owl-theme">
        @foreach($galleries as $gallery)
        <div class="gallery-item">
            <a href="{{ route('gallerydetail', $gallery->id) }}">
                <div class="image-wrapper">
                    <img src="{{ asset('images/listing/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                </div>
                <div class="title-wrapper">
                    <h4>{{ $gallery->title }}</h4>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>


<!--End Gallery Section -->
<!--Blog Section-->
<!-- <section class="blog-section">
    <div class="auto-container">
      
        <div class="sec-title centered">
            <h2>Updates</h2>
        </div>
        <div class="row clearfix justify-content-center">

        
            @foreach($allnews->take(3) as $new)
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <a href="{{route('newsInner',$new->slug)}}"><img src="{{asset('images/thumbnail/'.$new->image)}}" alt="" /></a>

                    </div>
                    <div class="lower-content">
                        <div class="author">
                            Admin
                        </div>
                        <h3><a href="{{route('newsInner',$new->slug)}}">{{$new->title}}</a></h3>
                        <div class="text">{{$new->short_description}}</div>
                        <ul class="post-date">
                            <li>{{ $new->created_at->format('F d, Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="link-box text-center mt-4">
            <a href="{{route('news')}}" class="theme-btn btn-style-two"><span class="arrow flaticon-right-arrow-4">View More</span></a>
        </div>
    </div>
</section> -->
<!--End Blog Section-->
<!--Fun Facts Section-->
<!--<div class="fact-counter-section style-two">-->
<!--    <div class="fact-counter">-->
<!--        <div class="auto-container">-->
<!--            <div class="row clearfix">-->

<!--Column-->
<!--                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">-->
<!--                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">-->
<!--                    	<div class="count-outer count-box">-->
<!--                        	<span class="count-text" data-speed="6000" data-stop="5">0</span>k-->
<!--                            <h4 class="counter-title">Satisfied Customer</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--Column-->
<!--                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">-->
<!--                    <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">-->
<!--                    	<div class="count-outer count-box">-->
<!--                        	<span class="count-text" data-speed="6000" data-stop="20">0</span>-->
<!--                            <h4 class="counter-title">Years Active</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--Column-->
<!--                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">-->
<!--                    <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">-->
<!--                    	<div class="count-outer count-box">-->
<!--                        	<span class="count-text" data-speed="6000" data-stop="57">0</span>-->
<!--                            <h4 class="counter-title">Expert Team Members</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--Column-->
<!--                <div class="column counter-column col-lg-3 col-md-5 col-sm-12">-->
<!--                    <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">-->
<!--                    	<div class="count-outer count-box">-->
<!--                        	<span class="count-text" data-speed="8000" data-stop="219">0</span>-->
<!--                            <h4 class="counter-title">Corporate Partners</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--End Fun Facts Section-->





@endsection