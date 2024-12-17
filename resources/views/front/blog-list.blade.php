@extends('front.includes.app')
@section('content')

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section bg-img cover-background  left-overlay-dark" data-overlay-dark="8" data-background="https://img.freepik.com/free-photo/stock-market-chart-virtual-screen-with-woman-s-hand-digital-remix_53876-124663.jpg?t=st=1695622258~exp=1695622858~hmac=8c241164fa6736843c65153357dec19fe979f5273e199edc5257d69313991ff2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>Blogs</h1>
                        </div>
                       
                    </div>
                </div>
            </div>
          
        </section>

        <!-- BLOG LIST
        ================================================== -->
        <section>
            <div class="container">
            <div class="row g-xl-5 mt-n2-2">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4 mt-2-2">
                <article class="card card-style-04 h-100 rounded-0">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="{{asset('images/thumbnail/'.$blog->image)}}"
                            alt="notice">
                       
                    </div>
                    <div class="card-body p-1-9">
                        <span class="text-primary d-block mb-2 font-weight-600">{{ $blog->created_at->format('F d, Y') }}</span>
                        <h3 class="h4 mb-0"><a href="">{{$blog->title}}</a>
                        </h3>
                    </div>
                    <div class="d-flex fw-bold border-top px-1-9 py-3 border-color-light-black justify-content-between">
                        <a href="{{route('blogDetails',$blog->slug)}}">Read more</a>
                        <a href="{{route('blogDetails',$blog->slug)}}"><i class="ti-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

            </div>
        </section>
@endsection