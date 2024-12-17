@extends('front.includes.app')
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url(https://whitegold.placeforvisit.com/images/listing/1710849191.jpg)">
    <div class="auto-container">
        <h1>Download</h1>
    </div>
</section>
<!--End Page Title-->

<!-- Blog Page Section -->
<section class="blog-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($downloads as $download)
            <div class="col-md-4">
                <div class="entry-content-wrap">
                    <div class="entry-content-top-wrap clearfix">
                        <div class="entry-post-format-icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="entry-content-top-right">
                            <h3 class="entry-title">
                                <a href="{{asset('files/'.$download->file)}}" rel="bookmark" title="">{{ $download->title}}</a>
                            </h3>
                            <div class="entry-post-meta-wrap">
                                <ul class="entry-meta">

                                    <li class="entry-meta-date">
                                        <a href="" rel="bookmark" title=""><i class="fa fa-calendar"></i> {{ $download->created_at->format('F d, Y') }}
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="entry-content clearfix mt-4">

                        <p><a href="{{asset('files/'.$download->file)}}" target="_blank" rel="noreferrer noopener">Download {{ $download->title}}</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Blog Page Section -->


@endsection