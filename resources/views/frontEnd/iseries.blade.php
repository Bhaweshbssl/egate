@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')

<div class="container">
  <nav id="menu" class="navbar">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="indexcac5.html?route=product/category&amp;path=75" class="dropdown-toggle" data-toggle="dropdown">Why Egate</a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">               <ul class="list-unstyled">
                                <li><a href="indexbd0f.html?route=product/category&amp;path=75_66">About Us (0)</a></li>
                                <li><a href="index4549.html?route=product/category&amp;path=75_77">The Team (0)</a></li>
                                <li><a href="index6a8b.html?route=product/category&amp;path=75_76">Advantage Egate (0)</a></li>
                                <li><a href="index9f1b.html?route=product/category&amp;path=75_79">FAQ (0)</a></li>
                              </ul>
              </div>
            <a href="indexcac5.html?route=product/category&amp;path=75" class="see-all">Show All Why Egate</a> </div>
        </li>
                                <li class="dropdown"><a href="index1647.html?route=product/category&amp;path=25" class="dropdown-toggle" data-toggle="dropdown">Projectors</a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">               <ul class="list-unstyled">
                                <li><a href="indexe177.html?route=product/category&amp;path=25_28">i Series (3)</a></li>
                                <li><a href="index00b0.html?route=product/category&amp;path=25_65">i Series HD (3)</a></li>
                                <li><a href="index68a7.html?route=product/category&amp;path=25_30">K Series (3)</a></li>
                                <li><a href="indexc219.html?route=product/category&amp;path=25_29">P Series (5)</a></li>
                                <li><a href="indexf3db.html?route=product/category&amp;path=25_31">X Series Pico (4)</a></li>
                                <li><a href="indexa5fd.html?route=product/category&amp;path=25_67">X Series Portable (3)</a></li>
                              </ul>
              </div>
            <a href="index1647.html?route=product/category&amp;path=25" class="see-all">Show All Projectors</a> </div>
        </li>
                                <li><a href="indexc957.html?route=product/category&amp;path=24">Screens</a></li>
                                <li><a href="index33b9.html?route=product/category&amp;path=81">Tools &amp; Downloads</a></li>
                                <li><a href="index70a9.html?route=product/category&amp;path=57">Accessories</a></li>
                                <li><a href="indexcd29.html?route=product/category&amp;path=63">eLearning</a></li>
                                <li><a href="index76bc.html?route=product/category&amp;path=61">Career</a></li>
                                <li><a href="index6067.html?route=product/category&amp;path=60">Support</a></li>
                                <li><a href="index0854.html?route=product/category&amp;path=62">Contact Us</a></li>
                      </ul>
    </div>
  </nav>
</div>
 
<div id="product-category" class="container">
  <ul class="breadcrumb">
        <li><a href="index9328.html?route=common/home"><i class="fa fa-home"></i></a></li>
        <li><a href="index1647.html?route=product/category&amp;path=25">Projectors</a></li>
        <li><a href="indexe177.html?route=product/category&amp;path=25_28">i Series</a></li>
      </ul>
  <div class="row">
                <div id="content" class="col-sm-12"><div>  <p style="text-align: right; "><img src="image/catalog/e31.png" style="width: 50%;"><img src="image/catalog/e30.gif" style="width: 50%;"><br></p></div>


      <h2>i Series</h2>
                        <div class="row">
        <div class="col-md-2 col-sm-6 hidden-xs">
          <div class="btn-group btn-group-sm">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="form-group"><a href="index6431.html?route=product/compare" id="compare-total" class="btn btn-link">Product Compare (0)</a></div>
        </div>
        <div class="col-md-4 col-xs-6">
          <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-sort">Sort By:</label>
            <select id="input-sort" class="form-control" onchange="location = this.value;">
              
              
              
                                          
              
              
              <option value="https://www.egateindia.in/index.php?route=product/category&amp;path=25_28&amp;sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
              
              
              
                                                        
              
              
              <option value="index7704.html?route=product/category&amp;path=25_28&amp;sort=pd.name&amp;order=ASC">Name (A - Z)</option>
              
              
              
                                                        
              
              
              <option value="indexfe1a.html?route=product/category&amp;path=25_28&amp;sort=pd.name&amp;order=DESC">Name (Z - A)</option>
              
              
              
                                                        
              
              
              <option value="indexa6aa.html?route=product/category&amp;path=25_28&amp;sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
              
              
              
                                                        
              
              
              <option value="indexb92f.html?route=product/category&amp;path=25_28&amp;sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
              
              
              
                                                        
              
              
              <option value="index9848.html?route=product/category&amp;path=25_28&amp;sort=rating&amp;order=DESC">Rating (Highest)</option>
              
              
              
                                                        
              
              
              <option value="index205c.html?route=product/category&amp;path=25_28&amp;sort=rating&amp;order=ASC">Rating (Lowest)</option>
              
              
              
                                                        
              
              
              <option value="index4309.html?route=product/category&amp;path=25_28&amp;sort=p.model&amp;order=ASC">Model (A - Z)</option>
              
              
              
                                                        
              
              
              <option value="index0c60.html?route=product/category&amp;path=25_28&amp;sort=p.model&amp;order=DESC">Model (Z - A)</option>
              
              
              
                                        
            
            
            </select>
          </div>
        </div>
        <div class="col-md-3 col-xs-6">
          <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-limit">Show:</label>
            <select id="input-limit" class="form-control" onchange="location = this.value;">
              
              
              
                                          
              
              
              <option value="https://www.egateindia.in/index.php?route=product/category&amp;path=25_28&amp;limit=15" selected="selected">15</option>
              
              
              
                                                        
              
              
              <option value="index5fb4.html?route=product/category&amp;path=25_28&amp;limit=25">25</option>
              
              
              
                                                        
              
              
              <option value="indexc3cf.html?route=product/category&amp;path=25_28&amp;limit=50">50</option>
              
              
              
                                                        
              
              
              <option value="index63c2.html?route=product/category&amp;path=25_28&amp;limit=75">75</option>
              
              
              
                                                        
              
              
              <option value="index0a37.html?route=product/category&amp;path=25_28&amp;limit=100">100</option>
              
              
              
                                        
            
            
            </select>
          </div>
        </div>
      </div>
      <div class="row">         <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image"><a href="index15b0.html?route=product/product&amp;path=25_28&amp;product_id=61"><img src="image/cache/catalog/products/i%20series/i9%20android/egate%20i9%20android1-228x228.png" alt="I9  Android" title="I9  Android" class="img-responsive" /></a></div>
            <div>
              <div class="caption">
                <h4><a href="index15b0.html?route=product/product&amp;path=25_28&amp;product_id=61">I9  Android</a></h4>
                <p>2400 Lumens LED Projector with Full HD 1080P Support, Amazon Fire TV Stick Compatible, 150" (381 cm)..</p>
                                <p class="price">  <span class="price-new">₹9,990</span> <span class="price-old">₹12,990</span>                    </p>
                                 </div>
              <div class="button-group">
                <button type="button" onclick="cart.add('61', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('61');"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('61');"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
        </div>
                <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image"><a href="index74a4.html?route=product/product&amp;path=25_28&amp;product_id=59"><img src="image/cache/catalog/products/i%20series/i9%20black/i9%20Black%201-228x228.jpg" alt="I9  Black " title="I9  Black " class="img-responsive" /></a></div>
            <div>
              <div class="caption">
                <h4><a href="index74a4.html?route=product/product&amp;path=25_28&amp;product_id=59">I9  Black </a></h4>
                <p>2900 Lumens LED Projector with Full HD 1080P Support, Amazon Fire TV Stick Compatible, 150" (381 cm)..</p>
                                <p class="price">  <span class="price-new">₹6,490</span> <span class="price-old">₹9,990</span>                    </p>
                                 </div>
              <div class="button-group">
                <button type="button" onclick="cart.add('59', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('59');"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('59');"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
        </div>
                <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image"><a href="index5f4f.html?route=product/product&amp;path=25_28&amp;product_id=60"><img src="image/cache/catalog/products/i%20series/i9%20black/1-228x228.jpg" alt="I9  Miracast" title="I9  Miracast" class="img-responsive" /></a></div>
            <div>
              <div class="caption">
                <h4><a href="index5f4f.html?route=product/product&amp;path=25_28&amp;product_id=60">I9  Miracast</a></h4>
                <p>2400 Lumens LED Projector with Full HD 1080P Support, Amazon Fire TV Stick Compatible, 150" (381 cm)..</p>
                                <p class="price">  <span class="price-new">₹7,490</span> <span class="price-old">₹9,990</span>                    </p>
                                 </div>
              <div class="button-group">
                <button type="button" onclick="cart.add('60', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('60');"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
        </div>
         </div>
      <div class="row">
        <div class="col-sm-6 text-left"></div>
        <div class="col-sm-6 text-right">Showing 1 to 3 of 3 (1 Pages)</div>
      </div>
                  </div>
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