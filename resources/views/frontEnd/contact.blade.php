@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

<div id="product-category" class="container">
  <ul class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
    <li><a href="{{url('/contact')}}">Contact Us</a></li>
  </ul>

  @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
      {{Session::get('message')}}
    </div>
  @endif

  <div class="row">
    <div id="content" class="col-sm-12">
      <h1>Contact Us</h1>
      <h3>Our Location</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-3"><strong>EGATE</strong><br />
              <address>
              EGATE<br>INDIA
              </address>
            </div>
            <div class="col-sm-3"><strong>Telephone</strong><br>
              1800 123 6847<br />
              <br>
            </div>
            <div class="col-sm-3">
            </div>
          </div>
        </div>
      </div>
      <form action="{{url('/contact_form')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset>
          <legend>Contact Form</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-name">Your Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" value="{{old('name')}}" id="input-name" class="form-control" />
              <span class="text-danger">{{$errors->first('name')}}</span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="{{old('email')}}" id="input-email" class="form-control" />
              <span class="text-danger">{{$errors->first('email')}}</span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-enquiry">Enquiry</label>
            <div class="col-sm-10">
              <textarea name="messages" rows="10" id="input-enquiry" class="form-control"></textarea>
              <span class="text-danger">{{$errors->first('messages')}}</span>
            </div>
          </div>          
        </fieldset>
        <div class="buttons">
          <div class="pull-right">
            <input class="btn btn-primary" type="submit" value="Submit" />
          </div>
        </div>
      </form>
    </div>
  </div>     
    
</div>

@endsection