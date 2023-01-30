@extends('frontend.main')
@section('content')

<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ url('/cart/update') }}" method="POST">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total=0;
                                $outOfStock=0;
                            @endphp
                            @foreach ($cart_products as $cart_product)
                            <tr>
                                <td class="images"><img src="{{ asset('uploads/products') }}/{{ App\Models\Product::find($cart_product->product_id)->product_image }}" alt=""></td>
                                <td class="product"><a href="{{ url('/product/details') }}/{{ $cart_product->product_id }}">{{ App\Models\Product::find($cart_product->product_id)->product_name }}</a>
                                @if (App\Models\Product::find($cart_product->product_id)->product_quantity < $cart_product->product_quantity)
                                <span class="badge badge-danger">Stock Out</span>
                                @php
                                    $outOfStock=1;
                                @endphp
                                @endif
                                <span class="badge badge-success">In Stock {{ App\Models\Product::find($cart_product->product_id)->product_quantity }}</span>

                                </td>
                                <td class="ptice">${{ App\Models\Product::find($cart_product->product_id)->product_price }}</td>
                                <td class="quantity cart-plus-minus">
                                    <input type="text" name="product_quantity[{{ $cart_product->id }}]" value="{{ $cart_product->product_quantity }}" />
                                </td>
                                <td class="total">${{ $cart_product->product_quantity * App\Models\Product::find($cart_product->product_id)->product_price }}</td>
                                <td class="remove">
                                    <a href="{{ url('/deletefromcart') }}/{{ $cart_product->id }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @php
                                $total += $cart_product->product_quantity * App\Models\Product::find($cart_product->product_id)->product_price;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button type="submit">Update Cart</button>
                                    </li>
                                </form>
                                    <li><a href="shop.html">Continue Shopping</a></li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" placeholder="Cupon Code">
                                    <button>Apply Cupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left"> Total </span> ${{ $total }}</li>
                                    <li><span class="pull-left"> Discout </span> $180.00</li>
                                    <li><span class="pull-left">Subtotal </span>${{ $total }}</li>
                                </ul>
                                @if ($outOfStock)
                                <a class="btn btn-danger text-white">Product is out of Stock</a>
                                @else
                                <a href="checkout.html">Proceed to Checkout</a>
                                @endif

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->

@endsection
