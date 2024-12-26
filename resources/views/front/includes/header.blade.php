<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KidsWord Monteshwori</title>
    <!-- Stylesheets -->
    <link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet">
    <!--MasterSlider-->
    <link rel="stylesheet" href="{{asset('front/css/masterslider/style/masterslider.css')}}" />
    <link href="{{asset('front/css/masterslider/skins/default/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/masterslider/style/ms-caro3d.css')}}" rel="stylesheet">
    <!--End MasterSlider-->

    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">


    <link rel="shortcut icon" href="{{asset('front/img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('front/img/favicon.png')}}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">



        <!-- Main Header-->
        <header class="main-header">

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="outer-container">
                    <div class="clearfix">

                        <div class="pull-left logo-box">
                            <div class="logo logo1"><a href="/"><img src="{{asset('images/main/'.$dash_setting->image1)}}" alt="" title=""></a></div>
                        </div>


                        <!-- Main Menu End-->
                        <div class="outer-box clearfix">
                            <ul class="option-list">
                                <li><span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span><strong>Tel:</strong>
                                    <a class="text-white" href="tel:{{$dash_setting->phone}}">
                                        {{$dash_setting->phone}} </a>
                                </li>
                                <li class="text-white"><a class="text-white" href=""><i class="fa fa-envelope-o text-white mr-2" aria-hidden="true"></i> <a class="text-white" href="mailto:{{$dash_setting->email}}">{{$dash_setting->email}} </a></a>
                                </li>
                            </ul>
                        </div>

                        <div class="nav-outer clearfix">

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="/">Home</a></li>
                                        <li class="dropdown"><a href="#">About Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul>
                                                <li><a href="{{route('page',['about-us'])}}">About Montessori</a></li>
                                                <!-- <li><a href="{{route('page',['teams'])}}">Our Team</a></li> -->
                                                <li><a href="{{route('page',['message'])}}">Message from Principal</a></li>
                                                <!-- <li><a href="{{route('page',['shareholders'])}}">Shareholders</a></li> -->

                                            </ul>
                                        </li>
                                        <li><a href="{{route('teams')}}">Our Team</a>




                                            <!-- 
                                        <li class="dropdown"><a href="#">Projects <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul>
                                                @foreach($dash_services as $service)
                                                <li><a href="{{route('serviceInner',$service->slug)}}">{{$service->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li> -->
                                            <!-- <li class="dropdown"><a href="#">Downloads <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul>
                                                <li><a href="{{route('downloads')}}">Documents</a></li>
                                                <li><a href="{{route('reports')}}">Report</a></li>
                                            </ul> -->
                                        </li> 
                                            <li><a href="{{route('news')}}">Updates</a>
                                        </li> 

                                        <li><a href="{{route('gallery')}}">Gallery</a>

                                        </li>

                                        <li> <a href="{{route('contactUs')}}">Contact US</a></li>
                                    </ul>
                                </div>



                            </nav>

                        </div>

                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="/" class="img-responsive"><img src="{{asset('images/main/'.$dash_setting->image1)}}" alt="" title=""></a>
                    </div>

                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                                <ul class="navigation clearfix">
                                    <li class="current"><a href="/">Home</a></li>
                                    <li class="dropdown"><a href="#">About Us <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="{{route('page',['about-us'])}}">About Montessori</a></li>
                                            <!-- <li><a href="{{route('page',['teams'])}}">Our Team</a></li> -->
                                            <li><a href="{{route('page',['message'])}}">Message from Principal</a></li>
                                            <!-- <li><a href="{{route('page',['shareholders'])}}">Shareholders</a></li> -->

                                        </ul>
                                    </li>
                                    <li><a href="{{route('teams')}}">Our Team</a>

                                        <!-- <li class="dropdown"><a href="#">Projects <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul>
                                            @foreach($dash_services as $service)
                                            <li><a href="{{route('serviceInner',$service->slug)}}">{{$service->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li> -->
                                        <!-- <li class="dropdown"><a href="#">Downloads <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="{{route('downloads')}}">Documents</a></li>
                                            <li><a href="{{route('reports')}}">Report</a></li>
                                        </ul> -->
                                    </li> 
                                         <li><a href="{{route('news')}}">Updates</a>
                                    </li> 

                                    <li><a href="{{route('gallery')}}">Gallery</a>

                                    </li>

                                    <li><a href="{{route('contactUs')}}">Contact us</a></li>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                    </div>

                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!--End Main Header -->