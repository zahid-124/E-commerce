@extends('frontend.main')

@section('content')
 <!-- .breadcumb-area start -->
 <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{ url('/order') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>Full Name *</p>
                                <input required type="text" value="{{ Auth::user()->name }}" name="name">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input required type="email" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input required type="text" name="mobile">
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input required type="text" name="address">
                            </div>
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        <li>Subtotal <span class="pull-right"><strong>${{ session()->get('totalBill') }}</strong></span></li>
                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Total<span class="pull-right">${{ session()->get('totalBill') }}</span></li>
                    </ul>
                    <ul class="payment-method">
                        <li>
                            <input required type="radio" id="bank" value="1" name="payment">
                            <label for="bank">Pay with SSLCOMERZE</label>
                        </li>
                        <li>
                            <input required type="radio" id="delivery" value="2" name="payment">
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                    </ul>
                    <input type="hidden" name="amount" value="{{ session()->get('totalBill') }}">
                    <button type="submit">Place Order</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection
