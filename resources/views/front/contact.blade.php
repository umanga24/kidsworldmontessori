@extends('front.includes.app')
@section('content')

<section class="page-title" style="background-image:url(images/Banner6.jpg)">
    <div class="auto-container">
        <h1>Get Touch With Us</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Contact</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Office Section-->
<section class="office-section" style="background-image: url(images/Banner4.jpg)">
    <div class="auto-container">
        <div class="inner-container">
            <!--Title Box-->
            <div class="title-box">
                <h2>Contact Us</h2>
            </div>
            <div class="row clearfix justify-content-center">

                <!--Office Block-->
                <div class="office-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-place"></span>
                        </div>
                        <h3>Visit Our Place</h3>
                        <div class="text">{!! $dash_setting->address !!}</div>
                    </div>
                </div>

                <!--Office Block-->
                <div class="office-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span>
                        </div>
                        <h3>24/7 Quick Contact</h3>
                        <div class="text"> <a style="color:#7c7b7b" href="tel:{{$dash_setting->phone}}"> {{$dash_setting->phone}} </a> <br> <a style="color:#7c7b7b"href="malto:{{$dash_setting->email}}"> {{$dash_setting->email}}</a></div>
                    </div>
                </div>

                <!--Office Block-->


            </div>
        </div>
    </div>
</section>
<!--End Office Section-->

<!--Fullwidth Map Section-->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.31397712412!2d85.3261328!3d27.708960349999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1693544264762!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!--End Fullwidth Map Section-->

<!--Contact Form Section-->
<section class="contact-form-section" style="background-image: url(images/Banner1.jpg)">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Title Column-->
            <div class="title-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h3 class="text-white">For Enquiries,</h3>
                    <h2>Just Say Hello.</h2>
                    <div class="text">For questions or concerns please contact us via telephone or simply complete the contact form and one of our knowledgeable representatives will respond in a timely manner.</div>
                </div>
            </div>

            <!--Form Column-->
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!--Contact Form-->
                    <div class="contact-form">

                        <form method="post" action="{{route('saveContact')}}" method="post" enctype="multipart/form-data" id="contact-form">
                        @csrf    
                        <div class="row clearfix">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" name="name" value="" placeholder="Name" required>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" name="phone" value="" placeholder="Phone" required>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="text" name="subject" value="" placeholder="Subject" required>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <input type="email" name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <textarea name="message" placeholder="Message..."></textarea>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="theme-btn btn-style-four"><span class="arrow flaticon-right-arrow-4"></span>Submit Now</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!--End Contact Form Section-->



@endsection