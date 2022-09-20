@extends('layouts.starlight')
@section('title')
    Edit Profile
@endsection
@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('/home') }}">Edit Profile</a>
    </nav>
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <div class="bg-primary text-white"><h3>Edit Profile</h3></div>
                    <div class="bg-info p-4">
                        <form action="{{ url('/profile/edit') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <input placeholder="Name" value="{{ App\Models\User::find(Auth::id())->name }}" class="form-control" type="text" name="name">
                            </div>
                            <div class="mb-2">
                                <input placeholder="Email" value="{{ App\Models\User::find(Auth::id())->email }}" class="form-control" type="email" name="email">
                            </div>
                            <div class="mb-2">
                            <input placeholder="Old password" class="form-control" type="password" name="old_password">
                            </div>
                            <div class="mb-2">
                            <input placeholder="New password" class="form-control" type="password" name="password">
                            </div>
                            <div class="mb-2">
                            <input placeholder="Confirm password" class="form-control" type="password" name="password_confimation">
                            </div>
                            <div class="text-center">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection
