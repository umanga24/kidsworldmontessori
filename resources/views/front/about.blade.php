@extends('front.includes.app')
@section('content')

<!--Page Title-->
<div class="inner-box" style="background-image: url(images/Banner15.jpg)">

<section class="page-title" style="background-image:url('{{asset('images/main/'.$page->image2)}}')">
    <div class="auto-container">
        <h1>About Our Company</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>About Us</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Company Section-->
<section class="company-section">
    <div class="auto-container">

        <!--Sec Title-->
        <div class="sec-title">
            <h2>Kids world <span class="theme_color">Montessori</span> </h2>
        </div>
        <div class="row clearfix">

            <!--Mission Column-->
            <div class="mission-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="text">
                        <p>
                            {!!$page->description!!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <img class="ab-img" src="{{asset('images/main/'.$page->image1)}}">
            </div>


        </div>

    </div>
</section>
<!--End Company Section-->



{{--<!--Fun Facts Section-->
<div class="fact-counter-section style-two">
    <div class="fact-counter">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Column-->
                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="6000" data-stop="5">0</span>k
                            <h4 class="counter-title">Satisfied Customer</h4>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="6000" data-stop="20">0</span>
                            <h4 class="counter-title">Years Active</h4>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="6000" data-stop="57">0</span>
                            <h4 class="counter-title">Expert Team Members</h4>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column counter-column col-lg-3 col-md-5 col-sm-12">
                    <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="8000" data-stop="219">0</span>
                            <h4 class="counter-title">Corporate Partners</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!--End Fun Facts Section-->--}}



@endsection