@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

<div id="product-category" class="container">
  <ul class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
    <li><a href="{{url('/elearning')}}">eLearning</a></li>
  </ul>

  <div class="row">
    <div id="content" class="col-sm-12">
      @foreach($content as $c)
        <p style="text-align: center; ">
          @if($c->image)
          <img src="{{url('public/page/large',$c->image)}}" style="width: 100%;"><br>
          @else
          <img src="{{url('public/page/large',$c->image)}}" style="display: none;"><br>
          @endif
        </p>
        <?php echo $c->description; ?>
      @endforeach

      <div class="row">                 
        <div class="col-sm-10"><p><br></p></div>
      </div>
      <hr>
      <p>There are no products to list in this category.</p>      
    
  
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