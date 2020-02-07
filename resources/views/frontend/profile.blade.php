@extends('layout.frontend.masterPage')
@section('pageHead')
    Profile Information <br><br>
    <a class="btn btn-warning ml-auto" href="{{ route('passChange') }}">Change Password</a>
@stop
@section('content')
    <div class="col-md-4 mt-5">
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
                <a href="{{ route('ppShow') }}" class="btn btn-info btn-block">Change Profile Image</a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <table class="table table-striped table-bordered">
            <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $info->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $info->email }}</td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td>{{ $info->phone_no }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="{{ route('profileUpdate') }}" type="button" class="btn btn-info btn-block text-uppercase">Update Info</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
