@extends('frontEnd.layouts.master')
@section('title','Register Page')
@section('slider')
@endsection
@section('content')

<div id="account-register" class="container">
  <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/login_page')}}">Account</a></li>
        <li><a href="{{url('/register_page')}}">Register</a></li>
      </ul>

        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

    <div class="row">
      <div id="content" class="col-sm-9">
      <h1>Register Account</h1>
      <p>If you already have an account with us, please login at the <a href="{{url('/login_page')}}">login page</a>.</p>
      <form action="{{url('/register_user')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset id="account">
          <legend>Your Personal Details</legend>
          <div class="form-group required" style="display:  none ;">
            <label class="col-sm-2 control-label">Customer Group</label>
            <div class="col-sm-10">                            
              <div class="radio">
                <label>
                  <input type="radio" name="customer_group_id" value="1" checked="checked" />
                Default</label>
              </div>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Name" name="name" value="{{old('name')}}" class="form-control"/>
              <span class="text-danger">{{$errors->first('name')}}</span>
            </div>
          </div>
          <input type="hidden" name="admin" value="2"/>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="email" placeholder="Email Address" name="email" value="{{old('email')}}" class="form-control"/>
              <span class="text-danger">{{$errors->first('email')}}</span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
            <div class="col-sm-10">
              <input type="number" placeholder="Telephone" name="mobile" value="{{old('mobile')}}" class="form-control"/>
              <span class="text-danger">{{$errors->first('mobile')}}</span>
            </div>
          </div>
                  </fieldset>
        <fieldset>
          <legend>Your Password</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-password">Password</label>
            <div class="col-sm-10">
              <input type="password" placeholder="Password" name="password" value="{{old('password')}}" class="form-control"/>
              <span class="text-danger">{{$errors->first('password')}}</span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
            <div class="col-sm-10">
              <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control"/>
              <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Newsletter</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label">Subscribe</label>
            <div class="col-sm-10">               <label class="radio-inline">
                <input type="radio" name="newsletter" value="1" />
                Yes</label>
              <label class="radio-inline">
                <input type="radio" name="newsletter" value="0" checked="checked" />
                No</label>
               </div>
          </div>
        </fieldset>
        
                <div class="buttons">
          <div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Privacy Policy</b></a>
                        <input type="checkbox" name="agree" value="1" />
                        &nbsp;
            <input type="submit" value="Continue" class="btn btn-primary" />
          </div>
        </div>
              </form>
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