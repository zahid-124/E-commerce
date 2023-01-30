@extends('layouts.starlight')
@section('products')
    active
@endsection

@section('title')
    Products
@endsection

@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('/home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('/products') }}">Products</a>
    </nav>

    <div class="sl-pagebody">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h3>Products List</h3>
                    </div>
                    <div class="card-body">
                        @if (session('delsuccess'))
                            <div class="alert alert-success">
                                {{ session('delsuccess') }}
                            </div>
                        @endif
                        @if (session('alldelsuccess'))
                            <div class="alert alert-success">
                                {{ session('alldelsuccess') }}
                            </div>
                        @endif
                        <input id="ck" type="checkbox" class="btn btn-success" onClick="toggle(this)">
                         <label for="ck">MarkAll</label>
                        <form action="{{ url('subcategory/markdelete') }}" method="POST">
                        @csrf

                        <table class="table table-striped" style="table-layout: fixed; width: 100%;">
                            <tr>
                                <th>Mark</th>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Sub category</th>
                                <th>Product description</th>
                                <th>Product price</th>
                                <th>Product quantity</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td style="word-wrap: break-word;">
                                        <input type="checkbox" id="mark" name="alldelete[]" value="{{ $product->id }}">
                                    </td>
                                    <td style="word-wrap: break-word;">{{$loop->index+1}}</td>
                                    <td style="word-wrap: break-word;">{{ $product->product_name }}</td>
                                    <td style="word-wrap: break-word;">{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                    <td style="word-wrap: break-word;">{{ App\Models\Subcategory::find($product->subcategory_id)->subcategory_name }}</td>
                                    <td class="text-truncate" style="max-width: 150px; word-wrap: break-word;">{{ $product->product_desc }}</td>
                                    <td style="word-wrap: break-word;">{{ $product->product_price }}</td>
                                    <td style="word-wrap: break-word;">{{ $product->product_quantity }}</td>
                                    {{-- <td>
                                        @if ($product->created_at->diffInDays(\Carbon\Carbon::today())>7)
                                            {{ $product->created_at->format('d:m:Y h:i A') }}
                                        @else
                                            {{ $product->created_at->diffForHumans() }}
                                        @endif
                                    </td> --}}
                                    <td style="word-wrap: break-word;">
                                        <img width="50" src="{{ asset('uploads/products')}}/{{ $product->product_image }}" alt="">
                                    </td>
                                    <td style="word-wrap: break-word;">
                                        <a href="{{ url('/product/delete') }}/{{ $product->id }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($products->count()==0)
                                <tr>
                                    <td class="text-center" colspan="4">No data found</td>
                                </tr>
                            @endif

                        </table>
                        <button type="submit" class="btn btn-danger">Delete marked</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('product/insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                @if (session('success'))
                                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                                @endif
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">--Select category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Subcategory</label>
                                <select name="subcategory_id" class="form-control">
                                    <option value="">--Select subcategory--</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label">Product Price</label>
                                <input type="text" name="product_price" class="form-control">
                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label">Product Description</label>
                                <textarea name="product_desc" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label">Product Quantity</label>
                                <input type="text" name="product_quantity" class="form-control">
                            </div>
                            <div class="form-group mb-1">
                                <label class="form-label">Product image</label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                            <div class="form-group mb-1 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('footer_script')
<script>
    function toggle(source) {
        var checkboxes = document.getElementsByName('alldelete[]');
        for(var i=0; i<checkboxes.length; i++){
            checkboxes[i].checked=source.checked;
        }
    }

    function forcetoggle(src){
        var checkboxes=document.getElementsByClassName('markid');
        for(var i=0; i<checkboxes.length; i++){
            checkboxes[i].checked=src.checked;
        }
    }
</script>
@endsection
