@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')
    

<div id="product-category" class="container">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/list-products')}}">Projectors</a></li>
    </ul>
  <div class="row">
                <div id="content" class="col-sm-12">
      <h2>Projectors</h2>
            <div class="row">                 <div class="col-sm-10"><h4 style="font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(68, 68, 68); margin-top: 10px; margin-bottom: 10px; font-size: 15px; text-align: center;">PANORAMA OF PROJECTORS TO CHOOSE FROM&nbsp;</h4><p style="font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(68, 68, 68); margin-top: 10px; margin-bottom: 10px; font-size: 15px; text-align: center;"><img src="{{asset('public/assets/image/catalog/PORTFOLIO.png')}}" style="width: 100%;"></p><p style="font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(68, 68, 68); margin-top: 10px; margin-bottom: 10px; font-size: 15px; text-align: center;"><br></p>
            <?php
              $categories=DB::table('categories')->where([['status',1],['parent_id',0]])->limit(4)->get();
            ?>
            <p style="margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 12px; text-align: center;">
              @foreach($series as $category)
              <a href="{{route('cats',$category->id)}}" target="_self">
                <img src="{{url('public/category/small/',$category->image)}}" style="width: 24%;">
              </a>
              @endforeach
            </p>
              <p style="margin-bottom: 10px; color: rgb(102, 102, 102); font-size: 12px; text-align: center;"><br></p>


<meta name="viewport" content="width=device-width, initial-scale=1">
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



<h3 style="text-align: center; "><span style="font-size: 18px;">Quick Compare Help</span></h3>

<div style="overflow-x:auto;">
  <table style="text-align: center;">
    <tbody>
                <?php
                  if($byCate!=""){
                      $products=$list_product;
                  }else{
                  }
                ?>
                <tr>
                    <th></th>
                    @foreach($products as $product)
                      @if($product->category->status==1) 
                        <th style="text-align: left;"><b>{{$product->p_name}}</b></th>
                      @endif
                    @endforeach 
                </tr>

                <tr>
                  <th>DISPLAY</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->wireless_display}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>BRIGHTNESS</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->brightness}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>RESOLUTION</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->resolution_native}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>MAX SCREEN</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->dimension}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>ANDROID</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->os}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>3D</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;"><{{$attr->dim_effect}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>THROW</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->throw_ratio}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                  <th>WEIGHT</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;">{{$attr->weight}}</th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>

                <tr>
                    <th>PRICE</th>
                    @foreach($products as $product)
                      @if($product->category->status==1) 
                        <th style="text-align: left;">{{$product->price}}</th>
                      @endif
                    @endforeach 
                </tr>

                <tr>
                  <th>DETAILS</th>
                  @foreach($products as $product)
                    @if($product->category->status==1)  
                      @foreach($productsattr as $attr)
                        @if($product->id == $attr->products_id)
                          <th style="text-align: left;"><b><a href="{{url('/product-detail',$product->id)}}">CLICK HERE</a></b></th>
                        @endif
                      @endforeach
                    @endif
                  @endforeach  
                </tr>
                
              </tbody>
  </table>
  </div><div style="overflow-x:auto;"><br><table style="text-align: center;"><tbody></tbody></table>
</div>
</div>
        </div>
      <hr>
                  <h3>Refine Search</h3>
                  <div class="row">  
                    @foreach($categories as $category)
                      <?php
                        $categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
                      ?>
                    
                      <?php
                        $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->get();
                      ?>
                      @if(count($sub_categories)>0)
                      @foreach($sub_categories as $sub_category)
                        <div class="col-sm-3">
                          <ul>
                            <li>
                              <a href="{{route('cats',$sub_category->id)}}">{{$sub_category->name}} </a>
                            </li>
                          </ul>
                        </div>
                      @endforeach
                      @endif       
                    @endforeach
                  </div>
                  <br>
                        <div class="row">
        <div class="col-md-4 col-sm-6 hidden-xs">
          <div class="btn-group btn-group-sm">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="form-group"><a href="{{url('/viewcompare')}}" id="compare-total" class="btn btn-link">Product Compare</a></div>
        </div>
        <div class="col-md-4 col-xs-6">
          <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-sort">Sort By:</label>
            <select id="input-sort" class="form-control" onchange="location = this.value;"> 
              <option value="{{url('/list-products')}}">Default</option>
              <option value="{{url('/list-productsaz')}}">Name (A - Z)</option>
              <option value="{{url('/list-productsza')}}" selected="selected">Name (Z - A)</option>
              <option value="{{url('/list-productsplh')}}">Price (Low &gt; High)</option>
              <option value="{{url('/list-productsphl')}}">Price (High &gt; Low)</option>
            </select>
          </div>
        </div>
        {{-- <div class="col-md-3 col-xs-6">
          <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-limit">Show:</label>
            <select id="input-limit" class="form-control" onchange="location = this.value;">
              <option value="{{url('/list-products')}}">15</option>
              <option value="{{url('/list-products')}}">25</option>
              <option value="{{url('/list-products')}}">50</option>
              <option value="{{url('/list-products')}}">75</option>
              <option value="{{url('/list-products')}}">100</option>
            </select>
          </div>
        </div> --}}
      </div>
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
          <?php if($count == 50) break; ?>       
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="{{url('/product-detail',$product->id)}}"><img src="{{url('public/products/small/',$product->image)}}" alt="{{$product->p_name}}" title="{{$product->p_name}}" class="img-responsive" style="width: 228px;"></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="{{url('/product-detail',$product->id)}}">{{$product->p_name}}</a></h4>
                    <p>{{ str_limit(strip_tags(html_entity_decode($product->description)), $limit = 100, $end = '...') }}</p>
                    <p class="price">  
                        <span class="price-new">
                          <?php $count = 0; ?> 
                          @foreach($productsattr as $attr)
                              @if($product->id == $attr->products_id)
                                  <?php if($count == 1) break; ?>
                                      ₹ {{$attr->price}}
                                  <?php $count++; ?>    
                              @endif    
                          @endforeach
                        </span> 
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
            </div>
          <?php $count++; ?>
          @endif
        @endforeach
      </div>
      <div class="row">
        <div class="col-sm-12 text-left">
          {{ $products->links() }}
        </div>
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
</div>
    </div>
</div>

@endsection