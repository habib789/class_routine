@extends('layout.frontend.masterPage')
@section('pageHead')
    Profile Information
@stop
@section('content')
    <div class="col-md-4 mt-5">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('uploads/images/'.auth()->user()->photo) }}"
                         alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                @if(auth()->user()->role == 0)
                    <p class="text-muted text-center">Student</p>
                @elseif(auth()->user()->role == 1)
                    <p class="text-muted text-center">Admin</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <div class="login-form">
            <div class="panel">
                @if(session()->has('message'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form id="Login" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input type="file" name="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary text-uppercase">Update</button>
            </form>
        </div>
    </div>
@stop
