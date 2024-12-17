@extends('front.includes.app')
@section('content')

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section bg-img cover-background  left-overlay-dark" data-overlay-dark="8" data-background="https://img.freepik.com/free-photo/stock-market-chart-virtual-screen-with-woman-s-hand-digital-remix_53876-124663.jpg?t=st=1695622258~exp=1695622858~hmac=8c241164fa6736843c65153357dec19fe979f5273e199edc5257d69313991ff2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <h1>Accounts</h1>
                        </div>
                        
                    </div>
                </div>
            </div>
        
        </section>
        
        
               <section>
            <div class="container">
                <div class="account">
                <div class="row clearfix">
                    <div class="col-lg-6">
                        <div class="acc-main">
                        <a class="account-btn" href="https://tms61.nepsetms.com.np/client-registration">Create Trading account</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="acc-main">
                        <a class="account-btn" href="https://tms61.nepsetms.com.np/login">TMS Login</a>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="acc-main">
                        <a class="account-btn" href=" https://dp.bholeganesh.com/DPForm">New DMAT</a>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="acc-main">
                        <a class="account-btn" href="https://dp.bholeganesh.com/Home/DematMeroshareRenewal">DMAT/MERO Share RENEW</a>
                        </div>
                    </div>
                     
                    
                    <div class="col-lg-6">
                        <div class="acc-main">
                        <a class="account-btn" href="{{route('create-account')}}">Request for Account & Portfolio Login</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="acc-main">
                        <a class="account-btn" href="https://client.cmt.com.np/Account/Login">Account & Portfolio Login</a>
                        </div>
                    </div>
                    
                     <!--<div class="col-lg-6">-->
                     <!--   <div class="acc-main">-->
                     <!--   <a class="account-btn" href="">Open DMAT Account</a>-->
                     <!--   </div>-->
                    </div>
                 
        
                </div>
                </div>

                </div>
            </div>
        </section>
        
        
        @endsection