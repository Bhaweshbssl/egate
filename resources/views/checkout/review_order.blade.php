@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')

<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-12">
                    <h2 style="text-align: center;">
                        Review Your Order & Complete Checkout
                    </h2>
                    <hr>
                    <a href="{{url('/list-products')}}" class="btn btn-info" style="width: 100%;">Add More Products & Services</a>
                    <hr>
                    <div class="shopping_cart">
                        <form action="{{url('/submit-order')}}" role="form" method="post" class="form-horizontal" id="payment-form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="users_id" value="{{$shipping_address->users_id}}">
                            <input type="hidden" name="users_email" value="{{$shipping_address->users_email}}">
                            <input type="hidden" name="name" value="{{$shipping_address->name}}">
                            <input type="hidden" name="address" value="{{$shipping_address->address}}">
                            <input type="hidden" name="city" value="{{$shipping_address->city}}">
                            <input type="hidden" name="state" value="{{$shipping_address->state}}">
                            <input type="hidden" name="pincode" value="{{$shipping_address->pincode}}">
                            <input type="hidden" name="country" value="{{$shipping_address->country}}">
                            <input type="hidden" name="mobile" value="{{$shipping_address->mobile}}">
                            <input type="hidden" name="shipping_charges" value="0">
                            <input type="hidden" name="order_status" value="success">
                            @if(Session::has('discount_amount_price'))
                                <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
                                <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
                                <input type="hidden" name="grand_total" value="{{$total_price-Session::get('discount_amount_price')}}">
                            @else
                                <input type="hidden" name="coupon_code" value="NO Coupon">
                                <input type="hidden" name="coupon_amount" value="0">
                                <input type="hidden" name="grand_total" value="{{$total_price}}">
                            @endif

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Review
                                                Your Order</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="items">
                                                <div class="col-md-9">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th></th>
                                                                <th class="text-center">Price</th>
                                                                <th class="text-center">Quantity</th>
                                                                <th class="text-center">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($cart_datas as $cart_data)
                                                                <?php
                                                                $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                                                                ?>
                                                                <tr>
                                                                    <td colspan="2" class="col-sm-8 col-md-6">
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
                                                                    <td class="col-sm-1 col-md-1 text-center">
                                                                        <strong>₹{{$cart_data->price}}</strong>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1 text-center">
                                                                        <p>{{$cart_data->quantity}}</p>
                                                                    </td>
                                                                    <td class="col-sm-1 col-md-1 text-center">
                                                                        <p class="cart_total_price">₹{{$cart_data->price*$cart_data->quantity}}</p>
                                                                    </td>
                                                                </tr>
                                                            @endforeach                
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-3">
                                                    <div style="text-align: center;">
                                                        <h4>Cart Sub Total : <span style="color:green;">₹{{$total_price}}</span>
                                                        </h4>
                                                        @if(Session::has('discount_amount_price'))
                                                            <h5>Coupon Discount : ₹{{Session::get('discount_amount_price')}}</h5>
                                                            <h3>Total : <span style="color:green;">₹{{$total_price-Session::get('discount_amount_price')}}</span></h3>
                                                        @else
                                                            <h3>Total : <span style="color:green;">₹{{$total_price}}</span></h3>
                                                        @endif
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div style="text-align: center; width:100%;">
                                            <a style="width:100%;" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class=" btn btn-success" onclick="$(this).fadeOut(); $('#payInfo').fadeIn();">Continue to Billing Information»</a>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <b>Help us keep your account safe and secure, please verify your billing information.</b>
                                        <br><br>
                                        <table class="table table-striped" style="font-weight: bold;">
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Best Email:</label></td>
                                                <td>
                                                    {{$shipping_address->users_email}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="name">Name:</label></td>
                                                <td>
                                                    {{$shipping_address->name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td>
                                                    {{$shipping_address->address}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    {{$shipping_address->city}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    {{$shipping_address->state}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">Country:</label></td>
                                                <td>
                                                    {{$shipping_address->country}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_postalcode">Postalcode:</label></td>
                                                <td>
                                                    {{$shipping_address->pincode}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Contact No.:</label></td>
                                                <td>
                                                    {{$shipping_address->mobile}}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div style="text-align: center;">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=" btn   btn-success" id="payInfo" style="width:100%;display: none;" onclick="$(this).fadeOut();document.getElementById('collapseThree').scrollIntoView()">Enter Payment Information »</a>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            <legend>What method would you like to pay with today?</legend>
                                            <span>
                                                <label><input type="radio" name="payment_method" value="COD" checked> Cash On Delivery</label>
                                            </span>
                                                <span>
                                                <label><input type="radio" name="payment_method" value="Paypal"> Online</label>
                                            </span>
                                            {{-- <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-holder-name">Name on
                                                    Card</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" stripe-data="name"
                                                           id="name-on-card" placeholder="Card Holder's Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-number">Card
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" stripe-data="number"
                                                           id="card-number" placeholder="Debit/Credit Card Number">
                                                    <br/>
                                                    <div><img class="pull-right"
                                                              src="https://s3.amazonaws.com/hiresnetwork/imgs/cc.png"
                                                              style="max-width: 250px; padding-bottom: 20px;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="expiry-month">Expiration
                                                        Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <select class="form-control col-sm-2"
                                                                        data-stripe="exp-month" id="card-exp-month"
                                                                        style="margin-left:5px;">
                                                                    <option>Month</option>
                                                                    <option value="01">Jan (01)</option>
                                                                    <option value="02">Feb (02)</option>
                                                                    <option value="03">Mar (03)</option>
                                                                    <option value="04">Apr (04)</option>
                                                                    <option value="05">May (05)</option>
                                                                    <option value="06">June (06)</option>
                                                                    <option value="07">July (07)</option>
                                                                    <option value="08">Aug (08)</option>
                                                                    <option value="09">Sep (09)</option>
                                                                    <option value="10">Oct (10)</option>
                                                                    <option value="11">Nov (11)</option>
                                                                    <option value="12">Dec (12)</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <select class="form-control" data-stripe="exp-year"
                                                                        id="card-exp-year">
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="cvv">Card CVC</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" stripe-data="cvc"
                                                               id="card-cvc" placeholder="Security Code">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    </div>
                                                </div>
                                         --}}</fieldset>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%; margin-top: 30px;">Place Order
                                        </button>
                                        <br/>
                                        <div style="text-align: left;"><br/>
                                            By submiting this order you are agreeing to our <a href="#">Billing Agreement</a>, and <a href="#">Terms of Service</a>.
                                            If you have any questions about our products or services please contact us
                                            before placing this order.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection