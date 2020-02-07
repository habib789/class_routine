@extends('layout.frontend.masterPage')
@section('pageHead') Class Times @stop
@section('content')

    <div class="col-md-5">
        @if(session()->has('message'))
            <div class="text-center alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Class Time</h3>
            </div>

            <form role="form" action="{{ route('times.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="time_duration">Class time</label>
                        <div class="form-group">
                            <select name="time_duration"
                                    class="form-control @error('time_duration') is-invalid @enderror">
                                <option class="hidden" selected disabled>Select class time</option>
                                <option value="8am-10am">8am-10am</option>
                                <option value="11am-1pm">11am-1pm</option>
                                <option value="2pm-4m">2pm-4m</option>
                                <option value="5pm-7pm">5pm-7pm</option>
                                <option value="8pm-10pm">8pm-10pm</option>
                            </select>
                            @error('time_duration')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
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
                <h3 class="card-title">Class Time</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $i=1;
                    @endphp
                    @foreach($times as $time)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $time->time_duration }}</td>
                            <td>
                                @if($time->status == 1)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                       Inactive
                                                @endif
                                    </span>
                            </td>
{{--                            <td>--}}
{{--                                <a class="text-info" href="{{ route('departments.edit', $department->id) }}">--}}
{{--                                    <i class="nav-icon fas fa-edit"></i>--}}
{{--                                </a>--}}
{{--                            </td>--}}
                            <td>
                                <form action="{{ route('times.destroy', $time->id) }}" method="post" onsubmit="return confirm('Are you sure? Want to delete?')">
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
