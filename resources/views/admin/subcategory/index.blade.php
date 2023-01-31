@extends('layouts.starlight')
@section('subcategory')
    active
@endsection
@section('title')
    Subcategory
@endsection

@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('/home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('/subcategory') }}">Subcategory</a>
    </nav>

    <div class="sl-pagebody">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Subcategory List</h3>
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

                        <table class="table table-striped">
                            <tr>
                                <th>Mark</th>
                                <th>SL</th>
                                <th>Subcategory Name</th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="mark" name="alldelete[]" value="{{ $subcategory->id }}">
                                    </td>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>{{ App\Models\Category::find($subcategory->category_id)->category_name }}</td>
                                    <td>
                                        @if ($subcategory->created_at->diffInDays(\Carbon\Carbon::today())>7)
                                            {{ $subcategory->created_at->format('d:m:Y h:i A') }}
                                        @else
                                            {{ $subcategory->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/subcategory/delete') }}/{{ $subcategory->id }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($subcategories->count()==0)
                                <tr>
                                    <td class="text-center" colspan="4">No data found</td>
                                </tr>
                            @endif

                        </table>
                        <button type="submit" class="btn btn-danger">Delete marked</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Trashed Subcategory List</h3>
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
                        <input type="checkbox" onclick="forcetoggle(this)" id="forcemark">
                        <label for="forcemark">MarkAll</label>
                        <form action="{{ url('subcategory/forcemarkdelete') }}" method="POST">
                            @csrf
                            <table class="table table-striped">
                                <tr>
                                    <th>Mark</th>
                                    <th>SL</th>
                                    <th>Subcategory Name</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($deletedSubcategories as $delSubcategory)
                                    <tr>
                                        <td>
                                            <input class="markid" type="checkbox" id="markid" name="forcemarkdelete[]" value="{{ $delSubcategory->id }}">
                                        </td>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $delSubcategory->subcategory_name }}</td>
                                        <td>{{ App\Models\Category::find($delSubcategory->category_id)->category_name }}</td>
                                        <td>
                                            @if ($delSubcategory->created_at->diffInDays(\Carbon\Carbon::today())>7)
                                                {{ $delSubcategory->created_at->format('d:m:Y h:i A') }}
                                            @else
                                                {{ $delSubcategory->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/subcategory/undo') }}/{{ $delSubcategory->id }}" class="btn btn-success">Undo</a>
                                            <a href="{{ url('/subcategory/forcedelete') }}/{{ $delSubcategory->id }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($deletedSubcategories->count()==0)
                                    <tr>
                                        <td class="text-center" colspan="4">No data found</td>
                                    </tr>
                                @endif
                            </table>
                            <button value="delete" name="name" type="submit" class="btn btn-danger">Delete marked</button>
                            <button value="undo" name="name" type="submit" class="btn btn-success">Undo marked</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Subcategory</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                           <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('exist'))
                           <div class="alert alert-danger">
                                {{ session('exist') }}
                            </div>
                        @endif
                        <form action="{{ url('/subcategory/insert') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category List</label>
                                <select required class="form-control" name="category_id">
                                    <option value="">--select--</option>
                                    @foreach ($categories as $category)
                                        <option @if (old('category_id')==$category->id)
                                            {{ 'selected' }}
                                        @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label class="form-label">Subcategory Name</label>
                                <input required value="{{ old('subcategory_name') }}" type="text" class="form-control" name="subcategory_name">
                            </div>
                            @error('subcategory_name')
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
