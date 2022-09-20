@extends('layouts.starlight');
@section('category')
    active
@endsection
@section('title')
    Category
@endsection

@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('/home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('/addcategory') }}">Category</a>
    </nav>

    <div class="sl-pagebody">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Category List</h3>
                    </div>
                    <div class="card-body">
                        @if (session('delsuccess'))
                            <div class="alert alert-success">
                                {{ session('delsuccess') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ url('/category/delete') }}/{{ $category->id }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($categories->count()==0)
                                <tr>
                                    <td class="text-center" colspan="4">No data found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Trashed Category List</h3>
                    </div>
                    <div class="card-body">
                        @if (session('undosuccess'))
                            <div class="alert alert-success">
                                {{ session('undosuccess') }}
                            </div>
                        @endif
                        @if (session('forcedelsuccess'))
                            <div class="alert alert-success">
                                {{ session('forcedelsuccess') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach($softcategories as $softcategory)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ $softcategory->category_name }}</td>
                                    <td>{{ App\Models\User::find($softcategory->added_by)->name }}</td>
                                    <td>{{ $softcategory->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ url('/category/undo') }}/{{ $softcategory->id }}" class="btn btn-success">Undo</a>
                                        <a href="{{ url('/category/forcedelete') }}/{{ $softcategory->id }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($softcategories->count()==0)
                                <tr>
                                    <td class="text-center" colspan="4">No data found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Category</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                           <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ url('/category/insert') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            @error('category_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
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

