@extends('front.includes.app')
@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image:url('{{asset('images/main/'.$page->image2)}}')">
    <div class="auto-container">
        <h1>Message from Chairman</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Message from Chairman</li>
        </ul>
    </div>
</section> -->


<section class="page-title" style="background-image:url('{{asset('images/main/'.$page->image2)}}')">
    <div class="auto-container">
        <h1>Suggestion from Mananging Director</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Suggestion from Director</li>
        </ul>
    </div>
</section>




<!--End Page Title-->

<!--Company Section-->
<section class="faq-page-section message-page-section" style="background-image: url(images/Banner15.jpg)>
    <div class="auto-container">
        <div class="message-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/main/'.$page->image1)}}" alt="">
                    <div class="message-info">
                        <h3>{{$page->position}}</h3>
                        <p>{{$page->name}}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Suggestion from {{$page->position}}</h3>
                    <p>{!!$page->description!!}</p>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Company Section-->

@endsection