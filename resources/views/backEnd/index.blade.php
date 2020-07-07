@extends('backEnd.layouts.master')
@section('title','Dashboard')
@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb span3"> <a href="{{url('/admin')}}"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                <li class="bg_lg span3"> <a href="{{route('category.index')}}"> <i class="icon-signal"></i> <span class="label label-important">{{$categories}}</span> Categories</a> </li>
                <li class="bg_ly span3"> <a href="{{route('coupon.index')}}"> <i class="icon-inbox"></i><span class="label label-success">{{$coupons}}</span> Coupons </a> </li>
                <li class="bg_lo span3"> <a href="{{route('product.index')}}"> <i class="icon-th"></i> <span class="label label-important">{{$products}}</span> Products</a> </li>
                <li class="bg_ls span3"> <a href="{{route('orderlist')}}"> <i class="icon-fullscreen"></i> <span class="label label-success">{{$orders}}</span> Orders</a> </li>
                <li class="bg_lr span3"> <a href="{{route('userlist')}}"> <i class="icon-th-list"></i> <span class="label label-important">{{$users}}</span> Users</a> </li>
                {{-- <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
                <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
                <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
                <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> --}}

            </ul>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('public/js/excanvas.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.flot.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('public/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('public/js/matrix.js')}}"></script>
    <script src="{{asset('public/js/matrix.dashboard.js')}}"></script>
    <script src="{{asset('public/js/jquery.gritter.min.js')}}"></script>
    <script src="{{asset('public/js/matrix.interface.js')}}"></script>
    <script src="{{asset('public/js/matrix.chat.js')}}"></script>
    <script src="{{asset('public/js/jquery.validate.js')}}"></script>
    <script src="{{asset('public/js/jquery.wizard.js')}}"></script>
    <script src="{{asset('public/js/jquery.uniform.js')}}"></script>
    <script src="{{asset('public/js/select2.min.js')}}"></script>
    <script src="{{asset('public/js/matrix.popover.js')}}"></script>
    <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/js/matrix.tables.js')}}"></script>
    <script src="{{asset('public/js/matrix.form_validation.js')}}"></script>
    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();
                }
                // else, send page to designated URL
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
    </script>
@endsection