@extends('layout.frontend.masterPage')
@section('pageHead')
    Update Information
@stop
@section('content')
    <div class="col-md-8 mt-5 mx-auto">
        <div class="login-form">
{{--            <div class="main-div">--}}
                <div class="panel">
                    @if(session()->has('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <form action="{{ route('inUpdate') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $info->name }}"  placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary text-uppercase">Update</button>
                </form>
{{--            </div>--}}
        </div>
    </div>
@stop
