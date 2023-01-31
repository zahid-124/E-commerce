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
                        <li><a href="{{ url('/') }}}}">Home</a></li>
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
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img style="height: 250px" src="{{ asset('uploads/products') }}/{{ $product->product_image }}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $product->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        {{-- <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li> --}}
                                        <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></h3>
                                <p class="pull-left">${{ $product->product_price }}

                                </p>
                                <ul class="pull-right d-flex">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Modal start -->
                    <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body d-flex">
                                    <div class="product-single-img w-50">
                                        <img src="{{ asset('uploads/products') }}/{{ $product->product_image }}" alt="">
                                    </div>
                                    <div class="product-single-content w-50">
                                        <h3>{{ $product->product_name }}</h3>
                                        <div class="rating-wrap fix">
                                            <span class="pull-left">${{ $product->product_price }}</span>
                                            <ul class="rating pull-right">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li>(05 Customar Review)</li>
                                            </ul>
                                        </div>
                                        <p>{{ $product->product_desc }}</p>
                                        {{-- <ul class="input-style">
                                            <li class="quantity cart-plus-minus">
                                                <input type="text" value="1" />
                                            </li>
                                            <li><a href="">Add to Cart</a></li>
                                        </ul> --}}
                                        @if ($product->product_quantity > 0)
                                        <form action="{{ url('/addtocart') }}" method="POST">
                                            @csrf
                                            <ul class="input-style">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <li class="quantity cart-plus-minus">
                                                    <input type="text" name="product_quantity" value="1" />
                                                </li>
                                                <li><button type="submit" style="margin-top: -23px; marigin-left: 4px" class="btn btn-danger text-white">Add to Cart</button></li>
                                            </ul>
                                        </form>
                                        @else
                                        <ul class="input-style">
                                            <li class="quantity cart-plus-minus">
                                                <input type="text" value="1" />
                                            </li>
                                            <li><a class="text-white">Stock out</a></li>
                                        </ul>
                                        @endif
                                        <ul class="cetagory">
                                            <li>Categories:</li>
                                            <li><a href="#">{{ App\Models\Category::find($product->category_id)->category_name }} ></a></li>
                                            <li><a href="#">{{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }} </a></li>
                                        </ul>
                                        <ul class="socil-icon">
                                            <li>Share :</li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal area end -->

                    @endforeach
                </ul>
            </div>

            @foreach ($categories as $category)
            <div class="tab-pane"  id="id{{ $category->id }}">
                <ul class="row">
                    @foreach ($products as $product)
                    @if ($product->category_id != $category->id)
                        @continue
                    @endif
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img style="height: 250px" src="{{ asset('uploads/products') }}/{{ $product->product_image }}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $product->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        {{-- <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li> --}}
                                        <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></h3>
                                <p class="pull-left">${{ $product->product_price }}

                                </p>
                                <ul class="pull-right d-flex">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Modal start -->
                    <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body d-flex">
                                    <div class="product-single-img w-50">
                                        <img src="{{ asset('uploads/products') }}/{{ $product->product_image }}" alt="">
                                    </div>
                                    <div class="product-single-content w-50">
                                        <h3>{{ $product->product_name }}</h3>
                                        <div class="rating-wrap fix">
                                            <span class="pull-left">${{ $product->product_price }}</span>
                                            <ul class="rating pull-right">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li>(05 Customar Review)</li>
                                            </ul>
                                        </div>
                                        <p>{{ $product->product_desc }}</p>
                                        {{-- <ul class="input-style">
                                            <li class="quantity cart-plus-minus">
                                                <input type="text" value="1" />
                                            </li>
                                            <li><a href="">Add to Cart</a></li>
                                        </ul> --}}
                                        @if ($product->product_quantity > 0)
                                        <form action="{{ url('/addtocart') }}" method="POST">
                                            @csrf
                                            <ul class="input-style">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <li class="quantity cart-plus-minus">
                                                    <input type="text" name="product_quantity" value="1" />
                                                </li>
                                                <li><button type="submit" style="margin-top: -23px; marigin-left: 4px" class="btn btn-danger text-white">Add to Cart</button></li>
                                            </ul>
                                        </form>
                                        @else
                                        <ul class="input-style">
                                            <li class="quantity cart-plus-minus">
                                                <input type="text" value="1" />
                                            </li>
                                            <li><a class="text-white">Stock out</a></li>
                                        </ul>
                                        @endif
                                        <ul class="cetagory">
                                            <li>Categories:</li>
                                            <li><a href="#">{{ App\Models\Category::find($product->category_id)->category_name }} ></a></li>
                                            <li><a href="#">{{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }} </a></li>
                                        </ul>
                                        <ul class="socil-icon">
                                            <li>Share :</li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal area end -->

                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- product-area end -->
@endsection
