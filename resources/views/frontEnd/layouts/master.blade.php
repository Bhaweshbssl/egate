<!DOCTYPE html>

<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EGATE</title>
<meta name="description" content="EGATE PROJECTOR" />

<script src="{{asset('public/assets/catalog/view/javascript/jquery/jquery-2.1.1.min.js')}}" type="text/javascript"></script>
<link href="{{asset('public/assets/catalog/view/javascript/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen" />
<script src="{{asset('public/assets/catalog/view/javascript/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<link href="{{asset('public/assets/catalog/view/javascript/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
<link href="{{asset('public/assets/catalog/view/theme/default/stylesheet/stylesheet.css')}}" rel="stylesheet">
<link href="{{asset('public/assets/catalog/view/javascript/jquery/swiper/css/swiper.min.css')}}" type="text/css" rel="stylesheet" media="screen" />
<link href="{{asset('public/assets/catalog/view/javascript/jquery/swiper/css/opencart.css')}}" type="text/css" rel="stylesheet" media="screen" />
<script src="{{asset('public/assets/catalog/view/javascript/jquery/swiper/js/swiper.jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('public/assets/catalog/view/javascript/common.js')}}" type="text/javascript"></script>
<link href="{{asset('public/assets/image/catalog/eg33.png')}}" rel="icon" />
</head>
<body>

@include('frontEnd.layouts.header')
@section('slider')
    @include('frontEnd.layouts.slider')
@show
@yield('content')
@include('frontEnd.layouts.footer')
</body>
</html>