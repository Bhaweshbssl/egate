<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Master Page')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/select2.css') }}" />
    <link rel="stylesheet" href="{{asset('public/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/css/jquery.gritter.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('backEnd.layouts.header')
@include('backEnd.layouts.nav')

<!--main-container-part-->
<div id="content">
    @yield('content')
</div>
@include('backEnd.layouts.footer')
@yield('jsblock')
</body>
</html>
