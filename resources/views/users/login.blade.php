@extends('frontEnd.layouts.master')
@section('title','Login Page')
@section('slider')
@endsection
@section('content')
    
<div id="account-login" class="container">
  <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/login_page')}}">Account</a></li>
        <li><a href="{{url('/login_page')}}">Login</a></li>
      </ul>

        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

      <div class="row">
        <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h2>New Customer</h2>
            <p><strong>Register Account</strong></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a href="{{url('/register_page')}}" class="btn btn-primary">Continue</a></div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h2>Returning Customer</h2>
            <p><strong>I am a returning customer</strong></p>
            <form action="{{url('/user_login')}}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label class="control-label" for="input-email">E-Mail Address</label>
                <input type="email" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password">Password</label>
                <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                <a href="">Forgotten Password</a></div>
              <input type="submit" value="Login" class="btn btn-primary" />
            </form>
          </div>
        </div>
      </div>
      </div>
    <aside id="column-right" class="col-sm-3 hidden-xs">
    <div class="list-group">
    <a href="{{url('/login_page')}}" class="list-group-item">Login</a> <a href="{{url('/register_page')}}" class="list-group-item">Register</a> 
    <a href="#" class="list-group-item">Forgotten Password</a>
    <a href="{{url('/login_page')}}" class="list-group-item">My Account</a>
    <a href="{{url('/login_page')}}" class="list-group-item">Address Book</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Wish List</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Order History</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Downloads</a>
    <a href="{{url('/login_page')}}" class="list-group-item">Recurring payments</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Reward Points</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Returns</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Transactions</a> 
    <a href="{{url('/login_page')}}" class="list-group-item">Newsletter</a>
  </div>

  </aside>
</div>
</div>

@endsection