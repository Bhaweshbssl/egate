@extends('frontEnd.layouts.master')
@section('title','My Account Page')
@section('slider')
@endsection
@section('content')
    <div id="account-login" class="container">
      <ul class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{url('/myaccount')}}">My Account</a></li>
        <li><a href="{{url('/orderhistory')}}">Order History</a></li>
      </ul>

        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

    <div class="row">
        <div id="content" class="col-sm-9">
            <div class="table-responsive cart_info">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Net Amount</th>
                                <th>Order Date</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $c)
                            <tr>
                                <td class="col-sm-3 col-md-3">
                                    <strong>{{$c->name}}</strong>
                                </td>
                                <td class="col-sm-3 col-md-3">
                                    <strong>{{$c->address}}</strong>
                                </td>
                                <td class="col-sm-2 col-md-2">
                                    <strong>₹{{$c->grand_total}}</strong>
                                </td>
                                <td class="col-sm-2 col-md-2">
                                    <strong>{{ Carbon\Carbon::parse($c->created_at)->format('d-M-Y') }}</strong>
                                </td>
                                <td class="col-sm-3 col-md-3">
                                    <a href="#">
                                        <button class="btn btn-primary"><i class="fa fa-eye"></i> View Details</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    <aside id="column-right" class="col-sm-3 hidden-xs">
        <div class="list-group">
            <a href="{{url('/myaccount')}}" class="list-group-item">My Account</a>
            <a href="{{url('/viewcart')}}" class="list-group-item">Shopping Cart</a>
            <a href="{{url('/myaccount')}}" class="list-group-item">Address Book</a> 
            <a href="{{url('/wishcarts')}}" class="list-group-item">Wish List</a> 
            <a href="{{url('/orderhistory')}}" class="list-group-item">Order History</a> 
            <a href="{{url('/myaccount')}}" class="list-group-item">Downloads</a>
            <a href="{{url('/myaccount')}}" class="list-group-item">Recurring payments</a> 
            <a href="{{url('/myaccount')}}" class="list-group-item">Reward Points</a> 
            <a href="{{url('/myaccount')}}" class="list-group-item">Returns</a>
            <a href="{{url('/myaccount')}}" class="list-group-item">Transactions</a> 
            <a href="{{url('/myaccount')}}" class="list-group-item">Newsletter</a>
        </div>

    </aside>
</div>
</div>
@endsection