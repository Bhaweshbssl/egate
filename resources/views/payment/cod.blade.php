@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <h2 class="text-center">YOUR ORDER HAS BEEN PLACED</h2>
        <p class="text-center">Thanks for your Order that use Options on Cash On Delivery</p>
        <p class="text-center">We will contact you by Your Email (<b>{{$user_order->users_email}}</b>) or Your Phone Number (<b>{{$user_order->mobile}}</b>)</p>
        <hr>
	    <p class="text-center">
	        Having trouble? <a href="{{url('/contact')}}">Contact us</a>
	    </p>
	    <p class="text-center">
	        <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue to homepage</a>
	    </p>
    </div>
    <div style="margin-bottom: 20px;"></div>

@endsection