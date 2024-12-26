@extends('front.includes.app')
@section('content')


<!--Page Title-->
<section class="page-title" style="background-image:url(images/updates.jpg)">
    <div class="auto-container">
        <h1>Updates</h1>
    </div>
</section>
<!--End Page Title-->

<!-- Blog Page Section -->
<section class="blog-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--News Block-->
            @foreach($allnews as $news)
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <a href="blog-detail.php"><img src="{{asset('images/thumbnail/'.$news->image)}}" alt="notice" /></a>

                    </div>
                    <div class="lower-content">
                        <div class="author">
                            Admin
                        </div>
                        <h3><a href="{{route('newsInner',$news->slug)}}">{{$news->title}}</h3></a>
                        <div class="text">{{$news->short_description}}</div>
                        <ul class="post-date">
                            <li>{{ $news->created_at->format('F d, Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            @endforeach


            <!--Pagination Outer
        <div class="pagination-outer">
            <ul class="styled-pagination">
                <li class="prev"><a href="#"><span class="fa fa-angle-double-left"></span> Prev</a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li class="next"><a href="#">Next <span class="fa fa-angle-double-right"></span></a></li>
            </ul>
        </div>-->

        </div>
</section>
<!-- End Blog Page Section -->






@endsection