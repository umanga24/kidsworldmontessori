@extends('front.includes.app')
@section('content')
        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section bg-img cover-background  left-overlay-dark" data-overlay-dark="8" data-background="https://img.freepik.com/free-photo/stock-market-chart-virtual-screen-with-woman-s-hand-digital-remix_53876-124663.jpg?t=st=1695622258~exp=1695622858~hmac=8c241164fa6736843c65153357dec19fe979f5273e199edc5257d69313991ff2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>{{$notice->title}}</h1>
                        </div>
                      
                    </div>
                </div>
            </div>
         
        </section>

        <!-- BLOG DETAILS
        ================================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <article class="card border-0 primary-shadow">
                                    <img src="{{asset('images/thumbnail/'.$notice->image)}}" alt="news">
                                    <div class="card-body p-1-6 p-sm-1-9">
                                        <ul class="list-unstyled mb-3">
                                            <li class="d-inline-block me-3"><a href="#!" class="display-31"><i class="ti-calendar me-1 text-primary"></i> {{ $notice->created_at->format('F d, Y') }}</a></li>
                                        </ul>
                                        
                                        <p>
                                            {!! $notice->description !!}
                                        </p>
                                    </div>
                                </article>
                            </div>

                      

                    

                        </div>
                    </div>
                    <div class="col-lg-4 ps-xl-5">
                        <div class="sidebar">
                           
                          
                            <div class="widget bg-secondary mb-1-9">
                                <div class="widget-content">
                                    <h5 class="mb-4 text-white">Related Notice</h5>
                                    <ul class="category-list list-unstyled mb-0">
                                    @foreach($other_notices as $notice)
                                        <li class="d-flex"><img src="{{asset('images/thumbnail/'.$notice->image)}}" alt="...">
                                                        <a href="{{route('noticeInner',$notice->slug)}}"><span>{{$notice->title}}</span></a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget bg-secondary">
                                <div class="widget-content">
                                    <h5 class="mb-4 text-white">Follow Us</h5>
                                    <ul class="social-icon-style2 list-unstyled ps-0">
                                        <li><a href="{{$dash_setting->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{$dash_setting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{$dash_setting->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="{{$dash_setting->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection