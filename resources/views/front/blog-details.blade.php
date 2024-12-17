@extends('front.includes.app')
@section('content')

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section bg-img cover-background  left-overlay-dark" data-overlay-dark="8" data-background="{{asset('images/main/'.$blog->banner_image)}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>{{$blog->title}}</h1>
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
                                    <img src="{{asset('images/thumbnail/'.$blog->image)}}" alt="...">
                                    <div class="card-body p-1-6 p-sm-1-9">
                                        <ul class="list-unstyled mb-3">
                                            <li class="d-inline-block me-3"><a href="#!" class="display-31"><i class="ti-calendar me-1 text-primary"></i> {{$blog->created_at->format('F d, Y') }}</a></li>
                                            <!--<li class="d-inline-block"><a href="#!" class="display-31"><i class="fas fa-comment me-1 text-primary"></i> 10 Comment</a></li>-->
                                        </ul>
                                        
                                        
                                        <p>{!! $blog->description !!}</p>
                                    </div>
                                </article>
                            </div>

                      

                    

                        </div>
                    </div>
                    <div class="col-lg-4 ps-xl-5">
                        <div class="sidebar">
                           
                          
                            <div class="widget bg-secondary mb-1-9">
                                <div class="widget-content">
                                    <h5 class="mb-4 text-white">Other Blogs</h5>
                                    <ul class="category-list list-unstyled mb-0">
                                         @foreach($other_blogs as $blogs)
                                         <li><img src="{{asset('images/thumbnail/'.$blogs->image)}}" alt="...">
                                                        <a href="{{route('blogDetails',$blogs->slug)}}"><span>{{$blogs->title}}</span></a></li>
                                         @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                            
                            
                            <!--<div class="widget bg-secondary mb-1-9">-->
                            <!--    <div class="widget-content">-->
                            <!--        <h5 class="mb-4 text-white">Categories</h5>-->
                            <!--        <ul class="category-list list-unstyled mb-0">-->
                            <!--            <li><a href="#!"><span>IT Management</span></a></li>-->
                            <!--            <li><a href="#!"><span>Technology</span></a></li>-->
                            <!--            <li><a href="#!"><span>UI/UX Design</span></a></li>-->
                            <!--            <li><a href="#!"><span>Digital Marketing</span></a></li>-->
                            <!--            <li><a href="#!"><span>SEO Implements</span></a></li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="widget bg-secondary mb-1-9">-->
                            <!--    <div class="widget-content">-->
                            <!--        <h5 class="mb-3 text-white">Tags</h5>-->
                            <!--        <div class="blog-tags mt-n2">-->
                            <!--            <a href="#!">Marketing</a>-->
                            <!--            <a href="#!">Solutions</a>-->
                            <!--            <a href="#!">App</a>-->
                            <!--            <a href="#!">Development</a>-->
                            <!--            <a href="#!">Security</a>-->
                            <!--            <a href="#!">Design</a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
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