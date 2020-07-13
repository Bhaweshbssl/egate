@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

<div id="common-home" class="container">
  <div class="row">
    <div id="content" class="col-sm-12">
      <div class="swiper-viewport">
        <div id="slideshow0" class="swiper-container">
          <div class="swiper-wrapper">       
            <div class="swiper-slide text-center">
              <img src="{{asset('public/assets/image/cache/catalog/egate%20banner%202-1140x380.jpg')}}" alt="egate projector banner 2" class="img-responsive" />
            </div>
            <div class="swiper-slide text-center">
              <img src="{{asset('public/assets/image/cache/catalog/egate%20banner%201-1140x380.jpg')}}" alt="egate projectors banner 1" class="img-responsive" />
            </div>
          </div>
        </div>
        <div class="swiper-pagination slideshow0"></div>
        <div class="swiper-pager">
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
      <script type="text/javascript">
      $('#slideshow0').swiper({
        mode: 'horizontal',
        slidesPerView: 1,
        pagination: '.slideshow0',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
          prevButton: '.swiper-button-prev',
          spaceBetween: 30,
        autoplay: 2500,
          autoplayDisableOnInteraction: true,
        loop: true
      });
      </script>
      <div>  
        <h4 style="text-align: center; ">PANORAMA OF PROJECTORS TO CHOOSE FROM&nbsp;</h4>
        <p style="text-align: center; ">
          @foreach($series as $category)
          <a href="{{route('cats',$category->id)}}" target="_self">
            <img src="{{url('public/category/small/',$category->image)}}" style="width: 24%;">
          </a>
          @endforeach
        </p>
        <p style="text-align: center; ">
          <span style="font-size: 18px;">. . . . .</span>
        </p>
        <p style="text-align: center; ">
          <span style="font-size: 18px;">&nbsp;
            <style type="text/css">
              .html-marquee {height:30px;width:1140px;background-color:#FFFFFF;font-family:Garamond;font-size:18pt;color:#6699FF;border-width:0;border-style:dashed;border-color:#ff0000;}
            </style>
            <!-- HTML Codes by HTMLCodes.ws -->
            <style type="text/css">
            .html-marquee {height:30px;width:390px;background-color:#FFFFFF;font-family:Garamond;font-size:18pt;color:#6699FF;border-width:0;border-style:dashed;border-color:#ff0000;}
            </style>
            <marquee class="html-marquee" direction="left" behavior="scroll" scrollamount="12">Special limited time discount use promo code eg0090 for 10% flat discount</marquee>
          </span>
        </p>
        <p style="text-align: center; ">
          <span style="font-size: 18px;">INNOVATIVE ELECTRONICS MADE EASY</span>
        </p>
        <p style="text-align: center; ">
          <span style="font-size: 18px;"><br></span>
        </p>
        <p style="text-align: center;">

          <?php
            $categories=DB::table('categories')->where([['status',1],['id',38]])->get();
          ?>
          @foreach($categories as $category)
          
            <?php
              $sub_categories=DB::table('categories')->select('id','name')->where([['id',38],['status',1]])->get();
            ?>
          
            @if(count($sub_categories)>0)
            @foreach($sub_categories as $sub_category)
              <a href="{{route('cats',$sub_category->id)}}"><img src="{{asset('public/assets/image/catalog/egate%20gif.gif')}}" style="width: 50%;"></a><img src="{{asset('public/assets/image/catalog/TRUE1.png')}}" style="width: 50%;"><span style="font-size: 18px;"><br></span>
            @endforeach
            @endif 
            
          @endforeach        </p>
        <p style="text-align: center;">
          <span style="font-size: 18px;">. . . . .</span>
        </p>
        <p style="text-align: left;"><br></p>
        <p style="text-align: center;">viunevuniriugvnrugn</p><hr>
        <p style="text-align: center;">okoijkidchbcr</p>
        <p style="text-align: center;">amamkkkakkk</p><hr>
        <p style="text-align: center;"><br></p>
      </div>

      <h3>Featured</h3>
      <div class="row">
        @foreach($featured as $product)
          @if($product->category->status==1)            
            <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="product-thumb transition">
                <div class="image">
                  <a href="{{url('/product-detail',$product->id)}}">
                    <img src="{{url('public/products/small/',$product->image)}}" alt="{{$product->p_name}}" title="{{$product->p_name}}" class="img-responsive" style="width: 200px;">
                  </a>
                </div>
                <div class="caption">
                  <h4>
                    <a href="{{url('/product-detail',$product->id)}}"> {{$product->p_name}} </a>
                  </h4>
                  <p style="word-break: break-word;"> {{ str_limit(strip_tags(html_entity_decode($product->description)), $limit = 100, $end = '..') }}
                  <div class="rating">
                  </div>
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
          @endif
        @endforeach
      </div>

      <div class="swiper-viewport">
        <div id="carousel0" class="swiper-container">
          <div class="swiper-wrapper">      
            <div class="swiper-slide text-center">
              <a href="https://www.amazon.in/stores/node/18471963031?_encoding=UTF8&amp;field-lbr_brands_browse-bin=EGate&amp;ref_=bl_dp_s_web_18471963031">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20amazon-130x100%20(1)-130x100.png')}}" alt="AMAZON" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <a href="https://www.croma.com/search/?text=EGATE">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/croma%20egate-130x100-130x100.png')}}" alt="CROMA" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <img src="{{asset('public/assets/image/cache/catalog/vendor/tata%20egate-130x100-130x100.jpg')}}" alt="TATA CLIQ" class="img-responsive" />
            </div>
            <div class="swiper-slide text-center">
              <a href="https://paytmmall.com/shop/search?q=egate&amp;from=organic&amp;child_site_id=6&amp;site_id=2&amp;category=6452&amp;brand=108403">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20paytm-130x100-130x100.jpg')}}" alt="PAYTM" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <a href="https://www.flipkart.com/search?q=egate&amp;otracker=search&amp;otracker1=search&amp;marketplace=FLIPKART&amp;as-show=on&amp;as=off&amp;as-pos=0&amp;as-type=HISTORY">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20flipkart-130x100-130x100.png')}}" alt="FLIPKART" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <a href="https://www.snapdeal.com/search?keyword=EGATE&amp;santizedKeyword=&amp;catId=&amp;categoryId=0&amp;suggested=false&amp;vertical=&amp;noOfResults=20&amp;searchState=&amp;clickSrc=go_header&amp;lastKeyword=&amp;prodCatId=&amp;changeBackToAll=false&amp;found">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20snapdeal-130x100-130x100.png')}}" alt="SNAPDEAL" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <a href="https://www.shopclues.com/search?q=EGATE&amp;sc_z=1111&amp;z=0&amp;count=11">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/egate%20shopclues-130x100-130x100.png')}}" alt="SHOPCLUES" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <img src="{{asset('public/assets/image/cache/catalog/vendor/digi%20cartz-130x100-130x100.png')}}" alt="DIGI" class="img-responsive" />
            </div>
            <div class="swiper-slide text-center">
              <a href="https://www.vplak.com/?searchKey=EGATE&amp;getProduct=true">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/vplak%20egate-130x100-130x100.png')}}" alt="VPLAK" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <a href="https://www.moglix.com/search?controller=search&amp;orderby=position&amp;orderway=desc&amp;search_query=EGATE%20PROJECTORS&amp;submit_search=Search&amp;sC=no">
                <img src="{{asset('public/assets/image/cache/catalog/vendor/mogilic%20egate-130x100-130x100.png')}}" alt="MOGILIX" class="img-responsive" />
              </a>
            </div>
            <div class="swiper-slide text-center">
              <img src="{{asset('public/assets/image/cache/catalog/vendor/tanotis%20egate-130x100-130x100.png')}}" alt="Nintendo" class="img-responsive" />
            </div>
          </div>
        </div>
        <div class="swiper-pagination carousel0"></div>
        <div class="swiper-pager">
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
      <script type="text/javascript">
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
      </script>

    </div>
  </div>
</div>

@endsection