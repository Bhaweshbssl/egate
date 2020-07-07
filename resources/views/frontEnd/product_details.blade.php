@extends('frontEnd.layouts.master')
@section('title','Detial Page')
@section('slider')
@endsection
@section('content')

<link href="{{asset('public/assets/catalog/view/javascript/jquery/magnific/magnific-popup.css')}}" type="text/css" rel="stylesheet" media="screen" />

<script src="{{asset('public/assets/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>

<div id="product-product" class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/list-products')}}">Projectors</a></li>
        <li><a href="#">{{$detail_product->p_name}}</a></li>
    </ul>
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="row">                         
                <div class="col-sm-8">           
                    <ul class="thumbnails">
                        <li>
                            <a class="thumbnail" href="{{url('public/products/small',$detail_product->image)}}" title="{{$detail_product->p_name}}">
                                <img src="{{url('public/products/small',$detail_product->image)}}" title="{{$detail_product->p_name}}" alt="{{$detail_product->p_name}}" style="width: 228px;">
                            </a>
                        </li>

                        @foreach($imagesGalleries as $imagesGallery)
                        <li class="image-additional">
                            <a class="thumbnail" href="{{url('public/products/small',$imagesGallery->image)}}" title="K9 Basic"> 
                                <img src="{{url('public/products/small',$imagesGallery->image)}}" title="K9 Basic" alt="K9 Basic" />
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-description" data-toggle="tab">Description</a>
                        </li>
                        <li>
                            <a href="#tab-specification" data-toggle="tab">Specification</a>
                        </li>
                        <li>
                            <a href="#tab-review" data-toggle="tab">Reviews ({{$totalReview}})</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-description">

                            <div class="row" style="margin-bottom: 30px;">
                                <div class="col-md-4 text-left">
                                    <img src="{{asset('public/assets/image/catalog/DOWN3.png')}}">
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{asset('public/assets/image/catalog/I9SER.png')}}">
                                </div>
                                <div class="col-md-4 text-right">
                                    <img src="{{asset('public/assets/image/catalog/WHATS3.png')}}">
                                </div>
                            </div>
                            
                            <?php echo $detail_product->description; ?>

                            <style>
                            table {
                              border-collapse: collapse;
                              border-spacing: 0;
                              width: 100%;
                              border: 1px solid #ddd;
                            }

                            th, td {
                              text-align: left;
                              padding: 8px;
                            }

                            tr:nth-child(even){background-color: #f2f2f2}
                            </style>

                            </h3>
                            <h3 style="text-align: center; ">
                                <span style="font-size: 18px;">Quick Compare Help</span>
                            </h3>

                            <div style="overflow-x:auto;">
                                <table style="text-align: center;">
    <tbody>
        <tr>
            <th></th>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                @if($detail_product->categories_id == $product->categories_id) 
                <?php if($count == 5) break; ?>
                    <th style="text-align: left;"><b>{{-- <a href="{{url('/product-detail',$product->id)}}"> --}}{{$product->p_name}} {{-- </a> --}}</b></th>
                <?php $count++; ?>
                @endif
                @endif
            @endforeach  
        </tr>

        <tr>
            <td><strong>DISPLAY</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->wireless_display}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>BRIGHTNESS</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->brightness}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>RESOLUTION</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->resolution_native}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>MAX SCREEN</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->dimension}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>ANDROID</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->os}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>3D</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->dim_effect}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>THROW</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->throw_ratio}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <td><strong>WEIGHT</strong></td>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id)
                        <?php if($count == 5) break; ?>
                            @foreach($productsattr as $attr)
                                @if($product->id == $attr->products_id)                
                                    <td style="text-align: left;">{{$attr->weight}}</td>
                                @endif
                            @endforeach    
                        <?php $count++; ?>
                    @endif
                @endif
            @endforeach 
        </tr>

        <tr>
            <th>PRICE</th>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                @if($detail_product->categories_id == $product->categories_id) 
                <?php if($count == 5) break; ?>
                    <th style="text-align: left;"><b>₹{{$product->price}}</b></th>
                <?php $count++; ?>
                @endif
                @endif
            @endforeach  
        </tr>

        <tr>
            <th>DETAILS</th>
            <?php $count = 0; ?> 
            @foreach($products as $product)
                @if($product->category->status==1)
                @if($detail_product->categories_id == $product->categories_id) 
                <?php if($count == 5) break; ?>
                    <th style="text-align: left;"><b><a href="{{url('/product-detail',$product->id)}}">CLICK HERE </a></b></th>
                <?php $count++; ?>
                @endif
                @endif
            @endforeach  
        </tr>
    </tbody>
                                </table>
                            </div>
                            <div style="overflow-x:auto;"><br>
                                <table style="text-align: center;">
                                    <tbody></tbody>
                                </table>
                            </div>

                            <p><br></p>
                            <p>
                                <img src="{{asset('public/assets/image/catalog/down.gif')}}" style="width: 25%; float: right;">
                                <a href="https://www.dropbox.com/s/u9wo5cfqz277ujl/test.pdf?dl=1" target="_self"></a><br>
                            </p>
                            <ul>
                            </ul>
                        </div>
                        <div class="tab-pane" id="tab-specification">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="2"><strong>Identification</strong></td>
                                    </tr>
                                </thead>
                                <?php $count = 0; ?> 
                                @foreach($productsattr as $attr)
                                    @if($detail_product->id == $attr->products_id)
                                    <?php if($count == 1) break; ?>
                                        <tbody>
                                            <tr>
                                                <td>Model Name</td>
                                                <td>{{$detail_product->p_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Model Numb.</td>
                                                <td>{{$detail_product->p_code}}</td>
                                            </tr>
                                            <tr>
                                                <td>Item Part/Sku No</td>
                                                <td>{{$attr->products_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>EAN</td>
                                                <td>{{$attr->ean}}</td>
                                            </tr>
                                        </tbody>
                                    <?php $count++; ?>    
                                    @endif    
                                @endforeach

                                <thead>
                                    <tr>
                                        <td colspan="2"><strong>Light Engine</strong></td>
                                    </tr>
                                </thead>
                                <?php $count = 0; ?> 
                                @foreach($productsattr as $attr)
                                    @if($detail_product->id == $attr->products_id)
                                    <?php if($count == 1) break; ?>
                                        <tbody>
                                            <tr>
                                                <td>Projector Type </td>
                                                <td>{{$attr->projector_type}}</td>
                                            </tr>
                                            <tr>
                                                <td>Light Source </td>
                                                <td>{{$attr->light_source}}</td>
                                            </tr>
                                            <tr>
                                                <td>Design </td>
                                                <td>{{$attr->design}}</td>
                                            </tr>
                                        </tbody>
                                    <?php $count++; ?>    
                                    @endif    
                                @endforeach
                                
                                <thead>
                                    <tr>
                                        <td colspan="2"><strong>Performance</strong></td>
                                    </tr>
                                </thead>
                                <?php $count = 0; ?> 
                                @foreach($productsattr as $attr)
                                    @if($detail_product->id == $attr->products_id)
                                    <?php if($count == 1) break; ?>
                                        <tbody>
                                            <tr>
                                                <td>Brightness</td>
                                                <td>{{$attr->brightness}}</td>
                                            </tr>
                                            <tr>
                                                <td>ANSI (less than)</td>
                                                <td>{{$attr->ansi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Resolution ( Native )</td>
                                                <td>{{$attr->resolution_native}}</td>
                                            </tr>
                                            <tr>
                                                <td>Resolution (Support)</td>
                                                <td>{{$attr->resolution_support}}</td>
                                            </tr>
                                            <tr>
                                                <td>Video Compatibility</td>
                                                <td>{{$attr->video_compatibility}}</td>
                                            </tr>
                                            <tr>
                                                <td>Aspect Ratio </td>
                                                <td>{{$attr->aspect_ratio}}</td>
                                            </tr>
                                            <tr>
                                                <td>Contrast Ratio </td>
                                                <td>{{$attr->contrast_ratio}}</td>
                                            </tr>
                                            <tr>
                                                <td>Projection Size</td>
                                                <td>{{$attr->size}}</td>
                                            </tr>
                                            <tr>
                                                <td>Throw Ratio : 1</td>
                                                <td>{{$attr->throw_ratio}}</td>
                                            </tr>
                                            <tr>
                                                <td>Digital Zoom</td>
                                                <td>{{$attr->digital_zoom}}</td>
                                            </tr>
                                            <tr>
                                                <td>Keys tone</td>
                                                <td>{{$attr->keys_tone}}</td>
                                            </tr>
                                            <tr>
                                                <td>Voltage / FrQ</td>
                                                <td>{{$attr->voltage}}</td>
                                            </tr>
                                            <tr>
                                                <td>Power </td>
                                                <td>{{$attr->power}}</td>
                                            </tr>
                                            <tr>
                                                <td>CPU/GPU/RAM/ROM </td>
                                                <td>{{$attr->cpu}}</td>
                                            </tr>
                                            <tr>
                                                <td>OS</td>
                                                <td>{{$attr->os}}</td>
                                            </tr>
                                            <tr>
                                                <td>3D </td>
                                                <td>{{$attr->dim_effect}}</td>
                                            </tr>
                                            <tr>
                                                <td>Power Backup</td>
                                                <td>{{$attr->power_backup}}</td>
                                            </tr>
                                            <tr>
                                                <td>VGA RGB</td>
                                                <td>{{$attr->vga}}</td>
                                            </tr>
                                            <tr>
                                                <td>Audio Out </td>
                                                <td>{{$attr->audio_out}}</td>
                                            </tr>
                                        </tbody>
                                    <?php $count++; ?>    
                                    @endif    
                                @endforeach
                                
                                <thead>
                                    <tr>
                                        <td colspan="2"><strong>Connectivity</strong></td>
                                    </tr>
                                </thead>
                                <?php $count = 0; ?> 
                                @foreach($productsattr as $attr)
                                    @if($detail_product->id == $attr->products_id)
                                    <?php if($count == 1) break; ?>
                                        <tbody>
                                            <tr>
                                                <td>AV (3.5mm/RCA)</td>
                                                <td>{{$attr->av}}</td>
                                            </tr>
                                            <tr>
                                                <td>HDMI </td>
                                                <td>{{$attr->hdmi}}</td>
                                            </tr>
                                            <tr>
                                                <td>SD/mSD Slot</td>
                                                <td>{{$attr->sd}}</td>
                                            </tr>
                                            <tr>
                                                <td>USB </td>
                                                <td>{{$attr->usb}}</td>
                                            </tr>
                                            <tr>
                                                <td>Wireless Display</td>
                                                <td>{{$attr->wireless_display}}</td>
                                             </tr>
                                            <tr>
                                                <td>Wifi</td>
                                                <td>{{$attr->wifi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Bluetooth</td>
                                                <td>{{$attr->bluetooth}}</td>
                                            </tr>
                                            <tr>
                                                <td>Speaker </td>
                                                <td>{{$attr->speaker}}</td>
                                            </tr>
                                        </tbody>
                                    <?php $count++; ?>    
                                    @endif    
                                @endforeach
                                
                                <thead>
                                    <tr>
                                        <td colspan="2"><strong>Misc</strong></td>
                                    </tr>
                                </thead>
                                <?php $count = 0; ?> 
                                @foreach($productsattr as $attr)
                                    @if($detail_product->id == $attr->products_id)
                                    <?php if($count == 1) break; ?>
                                        <tbody>
                                            <tr>
                                                <td>Dim. (mm) Box</td>
                                                <td>{{$attr->dimension}}</td>
                                            </tr>
                                            <tr>
                                                <td>Weight (w/o Box) </td>
                                                <td>{{$attr->weight}}</td>
                                            </tr>
                                            <tr>
                                                <td>Weight (with Box) </td>
                                                <td>{{$attr->weight_box}}</td>
                                            </tr>
                                            <tr>
                                                <td>Dim. (mm) Prod.</td>
                                                <td>{{$attr->dimension_product}}</td>
                                            </tr>
                                            <tr>
                                                <td>MRP </td>
                                                <td>₹ {{$detail_product->price}}</td>
                                            </tr>
                                            <tr>
                                                <td>Note *</td>
                                                <td>{{$attr->note}}</td>
                                            </tr>
                                        </tbody>
                                    <?php $count++; ?>    
                                    @endif    
                                @endforeach
                                
                            </table>
                        </div>
                        <div class="tab-pane" id="tab-review">
                            <form action="{{route('reviews')}}" method="post" role="form" class="form-horizontal">
                                <div id="review"></div>
                                <h2>Write a review</h2>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label class="control-label" for="input-name">Your Name</label>
                                        <input type="text" name="name" value="" id="input-name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label class="control-label" for="input-review">Your Review</label>
                                        <textarea name="message" rows="5" id="input-review" class="form-control"></textarea>
                                        <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label class="control-label">Rating</label>&nbsp;&nbsp;&nbsp; Bad&nbsp;
                                        <input type="radio" name="rating" value="1" />&nbsp;
                                        <input type="radio" name="rating" value="2" />&nbsp;
                                        <input type="radio" name="rating" value="3" />&nbsp;
                                        <input type="radio" name="rating" value="4" />&nbsp;
                                        <input type="radio" name="rating" value="5" />&nbsp;Good
                                    </div>
                                </div>
                            
                                <div class="buttons clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Continue</button>
                                    </div>
                                </div>
                            </form>

                            <h2>Recent reviews</h2>
                            <div>
                                @if(count($reviews) > 0)
                                @foreach($reviews as $r)
                                <div class="row" style="border-bottom: 2px solid #204d74; margin: 0px 0px 20px; padding: 10px 0px; border-radius: 5px;">
                                    <div class="col-md-6 text-left">
                                        <p style="font-size: 15px;    text-transform: capitalize;">
                                            <strong>{{$r->name}}</strong>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @for ($i = 0; $i < 5; $i++)
                                          @if ($i < $r->rating)
                                            <span class="fa fa-star" style="color: #dcdc14;"></span>
                                          @else
                                            <span class="fa fa-star" style="color: #80808030;"></span>
                                          @endif
                                        @endfor
                                    </div>
                                    <div class="col-md-12 text-left">
                                        <p>{{$r->message}}</p>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <strong>{{ Carbon\Carbon::parse($r->created_at)->format('d-M-Y') }}</strong>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="btn-group" style="display: flex;">

                        @if (Auth::check())

                        <form action="{{route('wishList')}}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                            <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                            <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                            <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                            <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">

                            <button type="submit" data-toggle="tooltip" class="btn btn-default" title="Add to Wish List" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;"><i class="fa fa-heart"></i></button>
                        </form>

                        @else

                        <a href="{{url('/login_page')}}">
                            <button type="submit" data-toggle="tooltip" class="btn btn-default" title="Add to Wish List" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;"><i class="fa fa-heart"></i></button>
                        </a>

                        @endif

                        <form action="{{route('comparison')}}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                            <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                            <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                            <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                            <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-default" title="Compare this Product" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                <i class="fa fa-exchange"></i>
                            </button>
                        </form>




                        
                    </div>
                    <form action="{{route('addToCart')}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                        <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                        <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                        <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                        <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                        <h1>{{$detail_product->p_name}}</h1>
                        <ul class="list-unstyled">
                            <li>Brand: <a href="{{-- {{url('/list-products')}} --}}#"> {{$detail_product->p_color}}</a></li>
                            <li>Product Code: {{$detail_product->p_code}}</li>
                            <li>
                            Availability: 
                                @if($totalStock>0)
                                    <span id="availableStock">In Stock</span>
                                @else
                                    <span id="availableStock">Out of Stock</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><span style="text-decoration: line-through;">₹{{$detail_product->price}}</span>
                            </li>
                            <li>
                                <h2>
                                    {{-- ₹{{$detail_product->price}} --}}
                                    <?php $count = 0; ?> 
                                    @foreach($productsattr as $attr)
                                        @if($detail_product->id == $attr->products_id)
                                            <?php if($count == 1) break; ?>
                                                ₹ {{$attr->price}}
                                            <?php $count++; ?>    
                                        @endif    
                                    @endforeach
                                </h2>
                            </li>
                        </ul>
                        <div id="product"><hr>
                            <h3>Available Options</h3>

            <div class="form-group required ">
                <label class="control-label">Warranty Choice Option</label>
                <div id="input-option259">                 
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="option[259][]" value="107" />1 Year Warranty (+ ₹0.0)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="option[259][]" value="108" />2 Year Warranty (+₹990)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="option[259][]" value="109" />3 Year Warranty (+₹1,590)
                        </label>
                    </div>
                </div>
            </div>

                            <div class="form-group">
                                <label class="control-label" for="input-quantity">Qty</label>
                                <input type="text" name="quantity" value="1" id="inputStock" class="form-control"/>
                                @if($totalStock>0)
                                <button type="submit" class="btn btn-primary btn-lg btn-block" id="buttonAddToCart" style="margin-top: 20px;">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                                @endif
                            </div>
                        </div>
                        <div class="rating">
                            <p>              
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <a href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{$totalReview}} review's</a> / <a href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
                            </p>
                            <hr>
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style" data-url="indexa52d.html?route=product/product&amp;product_id=76">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script> 
                            <!-- AddThis Button END --> 
                        </div>
                    </form>
                </div>
            </div>
            <h3>Related Products</h3>
            <div class="row">
               
                <?php
                    if($byCate!=""){
                        $products=$list_product;
                    }else{
                    }
                ?>
                <?php $count = 0; ?>
                @foreach($products as $product)
                    @if($product->category->status==1)
                    @if($detail_product->categories_id == $product->categories_id) 
                    <?php if($count == 4) break; ?> 
                        <div class="col-xs-6 col-sm-3">
                            <div class="product-thumb transition">
                                <div class="image">
                                    <a href="{{url('/product-detail',$product->id)}}"><img src="{{url('public/products/small/',$product->image)}}" alt="{{$product->p_name}}" title="{{$product->p_name}} " class="img-responsive" style="width: 228px;"></a>
                                </div>
                                <div class="caption">
                                    <h4>
                                        <a href="{{url('/product-detail',$product->id)}}">{{$product->p_name}} </a>
                                    </h4>
                                    <p>{{ str_limit(strip_tags(html_entity_decode($product->description)), $limit = 100, $end = '...') }}</p>
                                    {{-- <div class="rating">                  
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>                  
                                    </div> --}}
                                    <p class="price">  
                                        
                                        <?php $count = 0; ?> 
                                        @foreach($productsattr as $attr)
                                            @if($detail_product->id == $attr->products_id)
                                                <?php if($count == 1) break; ?>
                                                    <span class="price-new">₹ {{$attr->price}}</span> 
                                                <?php $count++; ?>    
                                            @endif    
                                        @endforeach
                                        <span class="price-old">₹{{$product->price}}</span>                  
                                    </p>
                                </div>
                                <div class="button-group">
                                  <a href="{{url('/product-detail',$product->id)}}">
                                    <button type="button" style="width: 60%;">
                                      <i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span>
                                    </button>
                                  </a>
                                  <a href="{{url('/login_page')}}">
                                    <button type="button" data-toggle="tooltip" title="Add to Wish List" style="width: 20%;">
                                      <i class="fa fa-heart"></i>
                                    </button>
                                  </a>
                                  <a href="#">
                                    <button type="button" data-toggle="tooltip" title="Compare this Product" style="width: 20%;">
                                      <i class="fa fa-exchange"></i>
                                    </button>
                                  </a>
                                </div>
                            </div>
                        </div>
                    <?php $count++; ?>    
                    @endif
                    @endif
                @endforeach    
            </div>
            <div class="swiper-viewport">
              <div id="carousel0" class="swiper-container">
                <div class="swiper-wrapper">      <div class="swiper-slide text-center"><a href="https://www.amazon.in/stores/node/18471963031?_encoding=UTF8&amp;field-lbr_brands_browse-bin=EGate&amp;ref_=bl_dp_s_web_18471963031"><img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20amazon-130x100%20(1)-130x100.png')}}" alt="AMAZON" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><a href="https://www.croma.com/search/?text=EGATE"><img src="{{asset('public/assets/image/cache/catalog/vendor/croma%20egate-130x100-130x100.png')}}" alt="CROMA" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><img src="{{asset('public/assets/image/cache/catalog/vendor/tata%20egate-130x100-130x100.jpg')}}" alt="TATA CLIQ" class="img-responsive" /></div>
                        <div class="swiper-slide text-center"><a href="https://paytmmall.com/shop/search?q=egate&amp;from=organic&amp;child_site_id=6&amp;site_id=2&amp;category=6452&amp;brand=108403"><img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20paytm-130x100-130x100.jpg')}}" alt="PAYTM" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><a href="https://www.flipkart.com/search?q=egate&amp;otracker=search&amp;otracker1=search&amp;marketplace=FLIPKART&amp;as-show=on&amp;as=off&amp;as-pos=0&amp;as-type=HISTORY"><img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20flipkart-130x100-130x100.png')}}" alt="FLIPKART" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><a href="https://www.snapdeal.com/search?keyword=EGATE&amp;santizedKeyword=&amp;catId=&amp;categoryId=0&amp;suggested=false&amp;vertical=&amp;noOfResults=20&amp;searchState=&amp;clickSrc=go_header&amp;lastKeyword=&amp;prodCatId=&amp;changeBackToAll=false&amp;found"><img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20snapdeal-130x100-130x100.png')}}" alt="SNAPDEAL" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><a href="https://www.shopclues.com/search?q=EGATE&amp;sc_z=1111&amp;z=0&amp;count=11"><img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20shopclues-130x100-130x100.png')}}" alt="SHOPCLUES" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><img src="{{asset('public/assets/image/cache/catalog/vendor/digi%20cartz-130x100-130x100.png')}}" alt="DIGI" class="img-responsive" /></div>
                        <div class="swiper-slide text-center"><a href="https://www.vplak.com/?searchKey=EGATE&amp;getProduct=true"><img src="{{asset('public/assets/image/cache/catalog/vendor/vplak%20egate-130x100-130x100.png')}}" alt="VPLAK" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><a href="https://www.moglix.com/search?controller=search&amp;orderby=position&amp;orderway=desc&amp;search_query=EGATE%20PROJECTORS&amp;submit_search=Search&amp;sC=no"><img src="{{asset('public/assets/image/cache/catalog/vendor/mogilic%20egate-130x100-130x100.png')}}" alt="MOGILIX" class="img-responsive" /></a></div>
                        <div class="swiper-slide text-center"><img src="{{asset('public/assets/image/cache/catalog/vendor/tanotis%20egate-130x100-130x100.png')}}" alt="Nintendo" class="img-responsive" /></div>
                  </div>
              </div>
              <div class="swiper-pagination carousel0"></div>
              <div class="swiper-pager">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript"><!--
$('#carousel0').swiper({
    mode: 'horizontal',
    slidesPerView: 5,
    pagination: '.carousel0',
    paginationClickable: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    autoplay: 2500,
    loop: true
});
--></script>

 
<script type="text/javascript"><!--
$(document).ready(function() {
    $('.thumbnails').magnificPopup({
        type:'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });
});
//--></script>

@endsection