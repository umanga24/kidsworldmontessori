<!--Main Footer-->

<footer class="main-footer">
    <div class="inner-box" style="background-image: url(images/Banner3.jpg)">
        <div class="auto-container">

            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget links-widget">
                            <h2>Quick Links</h2>
                            <div class="row clearfix">

                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <ul class="footer-link">
                                        <li><a href="{{route('page',['about-us'])}}">About Us</a></li>
                                        <li><a href="{{route('page',['teams'])}}">Our Team</a></li>

                                        <!-- <li><a href="{{route('downloads')}}">Download</a></li> -->
                                        <!-- <li><a href="{{route('news')}}">News</a></li> -->
                                        <li><a href="{{route('galleries')}}"> Gallery</a></li>
                                        <li><a href="{{route('contactUs')}}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget links-widget">
                        <h2>Payment Mode</h2>
                        <div class="row clearfix">

                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="footer-link">
                                    <li><a href="">www.nea.org.np</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <!--Footer Column-->
                    <!-- <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget news-widget">
                        <h2>Updates</h2>

                      
                        @foreach($dash_news->take(2) as $site)
                        <div class="news-widget-block">
                            <div class="widget-inner">
                                <div class="image">
                                    <img src="{{asset('images/thumbnail/'.$site->image)}}" alt="" />
                                </div>
                                <h3><a href="{{route('newsInner',$site->slug)}}">{{$site->title}}</a></h3>
                                <div class="post-date">{{$site->created_at}}</div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div> -->

                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget newsletter-widget">
                            <!-- <h2>Newsletter Sign Up</h2> -->
                            <div class="widget-content">
                                <!-- <div class="message-icon flaticon-letter"></div>
                            <div class="text">Subcribe us for latest news and updates.</div> -->
                                <!--Newsletter Form-->
                                <!-- <div class="newsletter-form">
                                <form method="post" action="contact.html">
                                    <div class="form-group clearfix">
                                        <input type="text" name="name" value="" placeholder="Name" required>
                                        <input type="email" name="email" value="" placeholder="Email Address" required>
                                        <button type="submit" class="theme-btn"><span class="icon flaticon-right-arrow-5"></span></button>
                                    </div>
                                </form>
                            </div> -->
                                <!--Social Icon One-->
                                <h2>Social Media</h2>
                                <ul class="social-icon-one">
                                    <li><a href="{{$dash_setting->facebook}}"target="_blank"><span class="icon fa fa-facebook"></span>facebook</a></li>
                                    <!-- <li><a href="{{$dash_setting->twitter}}"><span class="icon fa fa-twitter"></span>twitter</a></li>
                                <li><a href="{{$dash_setting->linkedin}}"><span class="icon fa fa-linkedin"></span>linkedin</a></li> -->
                                    <li><a href="{{$dash_setting->instagram}}"target="_blank"><span class="icon fa fa-instagram"></span>instagram</a></li>
                                    <li><a href="{{$dash_setting->linkedin}}"target="_blank"><span class="icon fa fa-youtube"></span>Youtube</a></li>
                                </ul>
                               
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="column col-lg-7 col-md-12 col-sm-12">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('images/main/'.$dash_setting->image1)}}" alt="" /></a>
                    </div>
                    <div class="copyright"> All rights reserved <br> KidsWord Monteshwori.</div>
                </div>


                <div class="column col-lg-5 col-md-12 col-sm-12">
                    <ul class="footer-nav clearfix">
                        <li><a href="https://www.facebook.com/umanga.bhattarai/" target="_blank">Developed By: Umanga Bhattarai</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</footer>
<!--End Main Footer-->

</div>
<!--End pagewrapper-->

<script src="{{asset('front/js/jquery.js')}}"></script>
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('front/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('front/js/appear.js')}}"></script>
<script src="{{asset('front/js/owl.js')}}"></script>
<script src="{{asset('front/js/wow.js')}}"></script>
<script src="{{asset('front/js/slick.js')}}"></script>
<script src="{{asset('front/js/jquery-ui.js')}}"></script>
<!-- Master Slider -->
<script src="{{asset('front/js/masterslider/jquery.easing.min.js')}}"></script>
<script src="{{asset('front/js/masterslider/masterslider.min.js')}}"></script>
<!--End Master Slider -->

<script src="{{asset('front/js/script.js')}}"></script>
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
<script src="{{asset('front/js/gmaps.js')}}"></script>
<script src="{{asset('front/js/map-script.js')}}"></script>
<!--End Google Map APi-->
<script>
    var marquee = document.getElementById("news-marquee");
    var isPaused = false;

    function pauseMarquee() {
        marquee.stop();
        isPaused = true;
    }

    function resumeMarquee() {
        if (isPaused) {
            marquee.start();
            isPaused = false;
        }
    }
</script>
<script>
    $(document).ready(function() {
        // Show the modal on the first load
        $('#noticeModal').modal('show');
    });
</script>


</body>

</html>