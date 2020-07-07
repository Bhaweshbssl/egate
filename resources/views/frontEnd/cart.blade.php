@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('slider')
@endsection
@section('content')

<div id="error-not-found" class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/viewcart')}}">Shopping Cart</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1>Shopping Cart</h1>

            <div>
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                @if(Session::has('message_coupon'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{Session::get('message_coupon')}}
                    </div>
                @endif
                @if(Session::has('message_apply_sucess'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message_apply_sucess')}}
                    </div>
                @endif
                <div class="table-responsive cart_info">
                    <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_datas as $cart_data)
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
                                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <div class="center">
                                <div class="input-group" style="    display: flex;">     

                                    @if($cart_data->quantity>1)
                                        <a href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                        </a>
                                    @endif

                                    <input type="text" name="quantity" value="{{$cart_data->quantity}}" autocomplete="off" size="2" class="form-control input-number">
                                    
                                    <a href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> 
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span> 
                                    </a>
                                </div> 
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>₹{{$cart_data->price}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>₹{{$cart_data->price*$cart_data->quantity}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <a href="{{url('/cart/deleteItem',$cart_data->id)}}">
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td>
                            <div class="heading">
                                <h3 style="margin: 0px;">What would you like to do next?</h3>
                                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                            </div>
                        </td>
                        <td colspan="4" class="text-right">
                            <form action="{{url('/apply-coupon')}}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="Total_amountPrice" value="{{$total_price}}">
                            <div class="form-group" style="display: inline-flex;">
                                <div class="controls {{$errors->has('coupon_code')?'has-error':''}}">
                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Promotion By Coupon">
                                    <span class="text-danger">{{$errors->first('coupon_code')}}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </div>
                        </form>
                        </td>
                    </tr>

                    @if(Session::has('discount_amount_price'))
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Subtotal</h5></td>
                            <td class="text-right">
                                <h5>
                                    <strong>₹{{$total_price}}</strong>
                                </h5>
                            </td>
                        </tr>

                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Coupon Discount (<strong>Code : {{Session::get('coupon_code')}}</strong>)</h5>
                            </td>
                            <td class="text-right">
                                <h5>
                                    <strong>₹{{Session::get('discount_amount_price')}}</strong>
                                </h5>
                            </td>
                        </tr>

                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right">
                                <h3>
                                    <strong>₹{{$total_price-Session::get('discount_amount_price')}}</strong>
                                </h3>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right">
                                <h3>
                                    <strong>₹{{$total_price}}</strong>
                                </h3>
                            </td>
                        </tr>
                    @endif               
                    
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a href="{{url('/')}}">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{url('/check-out')}}">
                                <button type="button" class="btn btn-success">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection