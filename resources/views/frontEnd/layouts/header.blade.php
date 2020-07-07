<nav id="top">
  <div class="container"> 
    
    <div id="top-links" class="nav pull-right">
      <ul class="list-inline">
        <li><a href="#"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md">1800 123 6847</span></li>
        <li class="dropdown"><a href="indexe223.html?route=account/account" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md">My Account</span> <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right">            
            @if(Auth::check())
              <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
              <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
              </li>
            @else
              <li><a href="{{url('/register_page')}}">Register</a></li>
              <li><a href="{{url('/login_page')}}">Login</a></li>
            @endif
          </ul>
        </li>
        <li>
          @if (Auth::check())
            <a href="{{url('/wishcarts')}}" id="wishlist-total" title="Wish List"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md">Wish List</span></a>
          @else
            <a href="{{url('/login_page')}}" id="wishlist-total" title="Wish List"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md">Wish List</span></a>
          @endif
        </li>

        <li><a href="{{url('/viewcart')}}" title="Shopping Cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Shopping Cart</span></a></li>
        <li><a href="{{url('/login_page')}}" title="Checkout"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md">Checkout</span></a></li>
      </ul>
    </div>
  </div>
</nav>

<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div id="logo"><a href="{{url('/')}}">
          <img src="{{asset('public/assets/image/catalog/egate%20logo.png')}}" title="EGATE" alt="EGATE" class="img-responsive" /></a>
        </div>
      </div>

      <div class="col-sm-5">
        <form action="{{ route('result') }}" method="GET" id="search-form_3" class="mb-4">
          {{csrf_field()}}
          <div id="search" class="input-group">
            <input type="text" name="searchTerm" value="{{ isset($searchTerm) ? $searchTerm : '' }}" placeholder="Search" class="form-control input-lg" />
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
      </div>

      <div class="col-sm-3">
        <div id="cart" class="btn-group btn-block">
          <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle"><i class="fa fa-shopping-cart"></i> <span id="cart-total">item(s)</span></button>
          <ul class="dropdown-menu pull-right">
            <li>
              <p class="text-center">
                
                    <a href="{{url('/viewcart')}}" class="btn btn-primary" style="margin: 0px 20px;padding: 10px;">View Cart</a>
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">
  <nav id="menu" class="navbar">
    <div class="navbar-header">
      <span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a href="indexcac5.html?route=product/category&amp;path=75" class="dropdown-toggle" data-toggle="dropdown">Why Egate</a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">               
              <ul class="list-unstyled">
                <li><a href="{{url('/about')}}">About Us</a></li>
                <li><a href="{{url('/team')}}">The Team</a></li>
                <li><a href="{{url('/advantage')}}">Advantage Egate</a></li>
                <li><a href="{{url('/faq')}}">FAQ</a></li>
              </ul>
            </div>
            <a href="{{url('/whyegate')}}" class="see-all">Show All Why Egate</a> 
          </div>
        </li>

    
      <?php
        $categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
      ?>
      @foreach($categories as $category)
      <li class="dropdown">
          <?php
            $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->orderBy('id', 'asc')->get();
          ?>
        <a href="" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}}
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-inner">               
            <ul class="list-unstyled">
              @if(count($sub_categories)>0)
              @foreach($sub_categories as $sub_category)
                <li><a href="{{route('cats',$sub_category->id)}}">{{$sub_category->name}} </a></li>
              @endforeach
              @endif  
            </ul>
          </div>
          @if(count($sub_categories)<1)
          <a href="{{route('cats',$category->id)}}" class="see-all">Show All</a> 
          @else
          <a href="{{url('/list-products')}}" class="see-all">Show All</a>
          @endif
        </div>
      </li>
    @endforeach
        
        <li><a href="{{url('/screen')}}">Screens</a></li>
        <li><a href="{{url('/downloads')}}">Tools &amp; Downloads</a></li>
        <li><a href="{{url('/accessories')}}">Accessories</a></li>
        <li><a href="{{url('/elearning')}}">eLearning</a></li>
        <li><a href="{{url('/career')}}">Career</a></li>
        <li><a href="{{url('/support')}}">Support</a></li>
        <li><a href="{{url('/contact')}}">Contact Us</a></li>
      </ul>
    </div>
  </nav>
</div>