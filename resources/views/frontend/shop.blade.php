@extends('frontend.main')

@section('content')
 <!-- .breadcumb-area start -->
 <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shop Page</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- product-area start -->
<div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <li>
                            <a class="active show" data-toggle="tab" href="#all">All product</a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a data-toggle="tab" href="#id{{ $category->id }}">{{ $category->category_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <ul class="row">
                    @foreach ($products as $product)
                    @include('frontend.parts.product_list', ['product'=>$product])
                    @endforeach
                </ul>
            </div>

            @foreach ($categories as $category)
            <div class="tab-pane" id="id{{ $category->id }}">
                <ul class="row">
                    @php
                        $cnt=0;
                    @endphp
                    @foreach ($products as $product)
                    @if ($product->category_id != $category->id)
                        @continue
                    @endif
                    @php
                        $cnt++;
                    @endphp
                    @include('frontend.parts.product_list', ['product'=>$product])
                    @endforeach
                    @if ($cnt==0)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 text-center">
                            <div class="product-wrap">
                                No Product Found
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- product-area end -->
@endsection
