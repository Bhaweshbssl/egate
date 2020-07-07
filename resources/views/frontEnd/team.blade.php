@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

<div id="product-category" class="container">
  <ul class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
    <li><a href="{{url('/whyegate')}}">Why Egate</a></li>
    <li><a href="{{url('/team')}}">The Team</a></li>
  </ul>
  <div class="row">
    <div id="content" class="col-sm-12">
      @foreach($team_page as $team)
        <p style="text-align: center; ">
          <img src="{{url('public/page/large',$team->image)}}" style="width: 100%;"><br>
        </p>
        <?php echo $team->description; ?>
      @endforeach

      <div class="row">                 
        <div class="col-sm-10"><p><br></p></div>
      </div>
      <hr>
      <p>There are no products to list in this category.</p>
      <div class="buttons">
        <div class="pull-right">
          <a href="{{url('/')}}" class="btn btn-primary">Continue</a>
        </div>
      </div>      
    </div>
  </div>
</div>

@endsection