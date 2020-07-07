@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('slider')
@endsection
@section('content')

<link href="{{asset('public/frontEnd/css/style.css')}}" rel="stylesheet">
<link href="{{asset('public/frontEnd/css/reset.css')}}" rel="stylesheet">

<section class="cd-products-comparison-table container">
	<ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/list-products')}}">Products</a></li>
        <li><a href="{{url('/viewcompare')}}">Compare Products</a></li>
    </ul>
	<header>
		<h2>Compare Products</h2>

		<div class="actions">
			<a href="#0" class="reset btn btn-primary">Reset</a>
			<a href="#0" class="filter btn btn-default">Filter</a>
		</div>
	</header>

	@if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

	<div class="cd-products-table">

		<div class="features">
			<div class="top-info">Product</div>
			<ul class="cd-features-list">
				<li>Price</li>
				<li>Brand</li>
			</ul>
		</div> <!-- .features -->
		
		<div class="cd-products-wrapper">
			<ul class="cd-products-columns">
				@foreach($cart_datas as $cart_data)
                    <?php                                    
                        $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                    ?>
					<li class="product">
						<div class="top-info">
							<div class="check"></div>
							@foreach($image_products as $image_product)
							<img src="{{url('public/products/small',$image_product->image)}}" alt="product image" style="width: 100%; height: auto; max-height: 200px;">
							<h3>{{$cart_data->product_name}}</h3>
							@endforeach
						</div> <!-- .top-info -->

						<ul class="cd-features-list">
							<li>₹{{$cart_data->price}}</li>
							<li>{{$cart_data->product_color}}</li>
						</ul>
					</li>
				@endforeach	
			</ul>
		</div>
		
		<ul class="cd-table-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul>
	</div> <!-- .cd-products-table -->
</section>

<script src="{{asset('public/frontEnd/js/compare.js')}}" type="text/javascript"></script>

@endsection