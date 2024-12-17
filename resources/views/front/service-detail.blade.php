@extends('front.includes.app')
@section('content')


<!--Page Title-->
<section class="page-title" style="background-image:url('{{asset('images/thumbnail/'.$service->banner_image)}}')">
    <div class="auto-container">
        <h1>Project Detail</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Project</li>
            <li>Project Detail</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
                <div class="blog-single">
                    <div class="inner-box">
                        {{--<div class="image">
                            <img class="w-100" src="{{asset('images/thumbnail/'.$service->image)}}" alt="" />
                        </div>--}}
                        <div class="text">
                            <h3>{{$service->title}}</h3>
                            <p>{!!$service->description!!} </p>




                        </div>


                        <!--New Posts-->


                    </div>
                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <!-- Popular Posts -->
                    <div class="sidebar-widget popular-posts">
                        <div class="sidebar-title">
                            <h3>Other Projects</h3>
                        </div>


                        @foreach($services as $service)
                        <article class="post">
                            <figure class="post-thumb"><a href="{{route('serviceInner',$service->slug)}}"><img src="{{asset('images/thumbnail/'.$service->image)}}" alt=""></a></figure>
                            <div class="text"><a href="blog-single.html">{{$service->title}}</a></div>
                        </article>

                        @endforeach

                    </div>
                </aside>
            </div>

        </div>
    </div>
</div>
<!--End Sidebar Page Container-->



@endsection