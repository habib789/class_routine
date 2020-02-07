@extends('layout.frontend.masterPage')
@section('pageHead') Subjects @stop
@section('content')

        <div class="col-md-5">
{{--            @if(session()->has('message'))--}}
{{--                <div class="text-center alert alert-{{ session('type') }}">--}}
{{--                    {{ session('message') }}--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Subjects</h3>
                </div>

                <form role="form" action="{{ route('subjects.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="subject">Subject Name</label>
                            <input type="text" name="subject_name"
                                   class="form-control @error('subject_name') is-invalid @enderror"
                                   id="subject" value="{{ old('subject_name') }}"
                                   placeholder="Enter subject name">
                            @error('subject_name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}" id="">
                    <input type="hidden" name="updated_by" value="{{ auth()->user()->id }}" id="">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Subject List</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $i=1;
                        @endphp
                        @foreach($subjects as $sub)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $sub->subject_name }}</td>
                                <td>
                                    @if($sub->status == 1)
                                        <span class="badge bg-success">
                                        Active
                                    </span>
                                    @else
                                        <span class="badge bg-warning">
                                       Inactive
                                                @endif
                                    </span>
                                </td>
                                <td>
                                    <a class="text-info" href="{{ route('subjects.edit', $sub->id) }}">
                                        <i class="nav-icon fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('subjects.destroy', $sub->id) }}" method="post" onsubmit="return confirm('Are you sure? Want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@stop
