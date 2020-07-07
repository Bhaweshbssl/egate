@extends('frontEnd.layouts.master')
@section('title','My Account Page')
@section('slider')
@endsection
@section('content')

<div id="error-not-found" class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/viewcart')}}">Shopping Cart</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>My WishList</h1>

            <div>
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif

                <div class="table-responsive cart_info">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Price</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $cart_data)
                                <?php
                                    $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                                ?>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        
                                        @foreach($image_products as $image_product)
                                            <a class="thumbnail pull-left" href="#" style="margin-right: 20px;">
                                                <img class="media-object" src="{{url('public/products/small',$image_product->image)}}" alt="" style="width: 72px; height: 72px;">
                                            </a>
                                        @endforeach
                                        
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                    {{$cart_data->product_name}}
                                                </a>
                                            </h4>
                                            <h5 class="media-heading"> <a href="#">{{$cart_data->product_code}}</a></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-2 col-md-2 text-center"><strong>₹{{$cart_data->price}}</strong></td>
                                
                                <td class="col-sm-2 col-md-2">
                                    <a href="{{url('/wish/deleteItem',$cart_data->id)}}">
                                        <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <aside id="column-right" class="col-sm-3 hidden-xs">
            <div class="list-group">
                <a href="{{url('/myaccount')}}" class="list-group-item">My Account</a>
                <a href="{{url('/viewcart')}}" class="list-group-item">Shopping Cart</a>
                <a href="{{url('/myaccount')}}" class="list-group-item">Address Book</a> 
                <a href="{{url('/wishcarts')}}" class="list-group-item">Wish List</a> 
                <a href="{{url('/orderhistory')}}" class="list-group-item">Order History</a> 
                <a href="{{url('/myaccount')}}" class="list-group-item">Downloads</a>
                <a href="{{url('/myaccount')}}" class="list-group-item">Recurring payments</a> 
                <a href="{{url('/myaccount')}}" class="list-group-item">Reward Points</a> 
                <a href="{{url('/myaccount')}}" class="list-group-item">Returns</a>
                <a href="{{url('/myaccount')}}" class="list-group-item">Transactions</a> 
                <a href="{{url('/myaccount')}}" class="list-group-item">Newsletter</a>
            </div>

        </aside>
    </div>
</div>
@endsection