@extends('layout.frontend.masterPage')
@section('pageHead')
    Password Change
@stop
@section('content')
        <div class="col-md-6 mx-auto">
            <div class="login-form">
                    <div class="panel">
                        @if(session()->has('message'))
                            <div class="alert alert-{{ session('type') }}">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h2>Change Password</h2>

                    </div>
                    <form id="Login" action="{{ route('pass.Change') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="password" class="form-control @error('current_pass') is-invalid @enderror" name="current_pass" id="" placeholder="Current Password">
                            @error('current_pass')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                            @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
    @stop
