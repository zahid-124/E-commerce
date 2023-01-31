@extends('layouts.starlight');
@section('customer')
    active
@endsection
@section('title')
    Customer
@endsection

@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('/home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('/customer') }}">Customer</a>
    </nav>

    <div class="sl-pagebody">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Order List</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Total TK</th>
                                <th>Discount</th>
                                <th>Payment Method</th>
                                <th>Payment Time</th>
                                <th>Action</th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->discount }}</td>
                                    <td>@if ($order->payment_method == 1)
                                        SSL Commerze
                                    @else
                                        Hand on Cash
                                    @endif</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="#">Download Invoice</a></td>
                                </tr>
                            @endforeach
                            @if ($orders->count()==0)
                                <tr>
                                    <td class="text-center" colspan="4">No data found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

