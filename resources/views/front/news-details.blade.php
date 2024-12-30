@extends('front.includes.app')
@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image:url(images/updates.jpg)">
	<div class="auto-container">
		<h1> Detail</h1>
		<ul class="page-breadcrumb">
			<li><a href="/">Home</a></li>
			<li>Updates</li>
			<li> Detail</li>
		</ul>
	</div>
</section> -->
<!--End Page Title-->

<!--Sidebar Page Container-->


	<div class="sidebar-page-container">
		<div class="auto-container">
			<div class="row clearfix">

				<!--Content Side-->
				<div class="content-side col-lg-9 col-md-12 col-sm-12">
					<div class="blog-single">
						<div class="inner-box">
							<div class="upper-box">
								<!--Author-->
								<div class="author">
									Admin
								</div>
								<h2>{{$news->title}}</h2>
								<ul class="post-date">
									<li>{{$news->created_at->format('F d, Y')}}</li>
								</ul>
							</div>
							<div class="text">


								<div class="image">
									<img src="{{asset('images/thumbnail/'.$news->image)}}" alt="news" />
								</div>

								<blockquote>
									<div class="quote-inner">
										<p>
											{!! $news->description !!}
										</p>
									</div>
								</blockquote>


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
								<h3>Recent News</h3>
							</div>
							@foreach($other_news as $news)
							<article class="post">
								<figure class="post-thumb"><a href="blog-single.html"><img src="{{asset('images/thumbnail/'.$news->image)}}" alt=""></a></figure>
								<div class="text"><a href="{{route('newsInner',$news->slug)}}">{{$news->title}}</a></div>
								<div class="post-date"><span>{{$news->created_at->format('F d, Y')}}</span></div>
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