@extends('front.includes.app')
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url(https://whitegold.placeforvisit.com/images/listing/1710849191.jpg)">
    <div class="auto-container">
        <h1>Shareholders</h1>
        <ul class="page-breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Shareholders</li>
        </ul>
    </div>
</section>
<!--End Page Title-->


<div class="shareholder pt-5 pb-5">
    <div class="container">
        <div class="sec-title text-center">
            <h2>ShareHolders</h2>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shareholders as $shareholder)
                <tr>
                    <th scope="row">{{$shareholder->id}}</th>
                    <td>{{$shareholder->name}}</td>
                    <td>{{$shareholder->address}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection