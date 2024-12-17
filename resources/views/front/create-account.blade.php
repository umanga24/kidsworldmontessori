@extends('front.includes.app')
@section('content')
<script src="https://www.google.com/recaptcha/api.js"></script>
        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section bg-img cover-background  left-overlay-dark" data-overlay-dark="8" data-background="https://img.freepik.com/free-photo/stock-market-chart-virtual-screen-with-woman-s-hand-digital-remix_53876-124663.jpg?t=st=1695622258~exp=1695622858~hmac=8c241164fa6736843c65153357dec19fe979f5273e199edc5257d69313991ff2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>Request for Account & Portfolio Login</h1>
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </section>

       

        <!-- CONTACT FORM
        ================================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 mb-1-6 mb-xl-0">
                        <div class="pe-xl-1-9">
                            <div class="section-title left mb-1-9">
                                <h2 class="mb-0 h1 mt-2">Fill the form to Request for Your Account & Portfolio Login with us!</h2>
                            </div>
                            <p class="mb-1-9"><a  href="{{$dash_setting->phone}}" target="_blank"><i class="fa-brands fa-whatsapp"></i> Message us on WhatsApp</a></p>
                            <ul class="social-icon-style3 ps-0">
                                <li class="me-1"><a href="{{$dash_setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="me-1"><a href="{{$dash_setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                <li class="me-1"><a href="{{$dash_setting->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                <li class="me-0"><a href="{{$dash_setting->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-7">
                    @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible message">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {!! Session::get('message') !!}
            </div>
            @endif
               
                        <form class="contact form" id="account-form" action="{{route('saveAccount')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="quform-elements">
                                    <div class="row">

                                        <p><h4>Request for Account & Portfolio Login:</h4></p>

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="first_name"> First Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Your first name here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->
                                         <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="last_name"> Last Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Your surname here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email"> Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="text" name="email" placeholder="Your email here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->
                                        
                                         <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Phone Number <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Your phone no here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                  
                                       
                                     
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>ReCaptcha:</strong>
                                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.site_key')}}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif
                                    </div>  
                                </div>
                           

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="btn-style1 border-0"><span>Submit </span></button>
                                                <!--<button class="btn-style1 border-0" type="cancel"><span>cancel</span></button>-->
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>

     

@endsection
<!--@push('scripts')-->
<!-- <script src="https://www.google.com/recaptcha/api.js"></script>-->
<!--<script>-->
<!--   function onSubmit(token) {-->
<!--     document.getElementById("account-form").submit();-->
<!--   }-->
<!-- </script>-->

<!--@endpush-->
