@extends('front.includes.app')
@section('content')


<!--Page Title-->
<section class="page-title" style="background-image:url(https://whitegold.placeforvisit.com/images/listing/1710849191.jpg)">
    <div class="auto-container">
        <h1>Our Team</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Our Teamss</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Team Section-->
<div class="backgroundimage"  style="background-image: url(images/Banner1.jpg)">
<div class="auto-container" >
    <ul class="nav nav-pills mb-2 mt-5" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Management Team </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Staff Team</button>
        </li>

    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <section class="team-section">
                <!--Sec Title-->
                <div class="sec-title text-center">
                    <h2>Management <span class="theme_color">Team</span></h2>
                </div>
                <div class="row justify-content-center">
                    <!--Team Block-->

                    @foreach($teams as $team)

                    @if( $team->teamCategory->title == "Management Team" && $team->sort_order == 1)
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{asset('images/thumbnail/'.$team->image)}}" alt="" style="height:350px; width:100%;" />

                            </div>

                            <div class="lower-content">
                                <h3>{{$team->name}}</h3>
                                <div class="designation">{{$team->position}}</div>

                            </div>

                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="row clearfix">
                    @foreach($teams as $team)
                    @if($team->teamCategory->title == "Management Team" && $team->sort_order != 1)
                    <!--Team Block-->
                    <div class="team-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{asset('images/thumbnail/'.$team->image)}}" alt="" />

                            </div>
                            <div class="lower-content">
                                <h3>{{$team->name}}</h3>
                                <div class="designation">{{$team->position}}</div>

                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach



                </div>
            </section>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <section class="team-section">
                <!--Sec Title-->
                <div class="sec-title text-center">
                    <h2>Staff <span class="theme_color">Team</span></h2>
                </div>

                <div class="row clearfix">




                    <!--Team Block-->
                    @foreach($teams as $team)
                    @if($team->teamCategory->title == "Staff Team")
                    <div class="team-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{asset('images/thumbnail/'.$team->image)}}" alt="" />

                            </div>
                            <div class="lower-content">
                                <h3><a href="#">{{$team->name}}</a></h3>
                                <div class="designation">{{$team->position}}</div>

                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach



                </div>
            </section>
        </div>
    </div>
</div>

</div>

@endsection