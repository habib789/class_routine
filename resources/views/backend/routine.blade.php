@extends('layout.frontend.masterPage')
@section('pageHead') Routine @stop
@section('content')

    <div class="col-md-8">
        @if(session()->has('message'))
            <div class="text-center alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Routine</h3>
            </div>

            <form role="form" action="{{ route('routines.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="subject">Select Subject</label>
                        <select name="subject"
                                class="form-control @error('subject') is-invalid @enderror">
                            <option class="hidden" selected disabled>Select Subject</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                        </select>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject">Select Time</label>
                        <select name="time"
                                class="form-control @error('time') is-invalid @enderror">
                            <option class="hidden" selected disabled>Select Time</option>
                            @foreach($times as $time)
                                <option value="{{ $time->id }}">{{ $time->time_duration }}</option>
                            @endforeach
                        </select>
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="weeks">Add Week</label>
                        <div class="form-group">
                            <select name="weeks"
                                    class="form-control @error('weeks') is-invalid @enderror">
                                <option class="hidden" selected disabled>Select class time</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                            </select>
                            @error('weeks')
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
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>


    {{--    <div class="col-md-7">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-header">--}}
    {{--                <h3 class="card-title">Subject List</h3>--}}
    {{--            </div>--}}
    {{--            <div class="card-body p-0">--}}
    {{--                <table class="table table-striped table-sm">--}}
    {{--                    <thead>--}}
    {{--                    <tr>--}}
    {{--                        <th style="width: 10px">#</th>--}}
    {{--                        <th>Name</th>--}}
    {{--                        <th>Status</th>--}}
    {{--                        <th>Action</th>--}}
    {{--                    </tr>--}}
    {{--                    </thead>--}}
    {{--                    <tbody>--}}

    {{--                    @php--}}
    {{--                        $i=1;--}}
    {{--                    @endphp--}}
    {{--                    @foreach($subjects as $sub)--}}
    {{--                        <tr>--}}
    {{--                            <td>{{$i++}}</td>--}}
    {{--                            <td>{{ $sub->subject_name }}</td>--}}
    {{--                            <td>--}}
    {{--                                @if($sub->status == 1)--}}
    {{--                                    <span class="badge bg-success">--}}
    {{--                                        Active--}}
    {{--                                    </span>--}}
    {{--                                @else--}}
    {{--                                    <span class="badge bg-warning">--}}
    {{--                                       Inactive--}}
    {{--                                                @endif--}}
    {{--                                    </span>--}}
    {{--                            </td>--}}
    {{--                            <td>--}}
    {{--                                <a class="text-info" href="{{ route('subjects.edit', $sub->id) }}">--}}
    {{--                                    <i class="nav-icon fas fa-edit"></i>--}}
    {{--                                </a>--}}
    {{--                            </td>--}}
    {{--                            <td>--}}
    {{--                                <form action="{{ route('subjects.destroy', $sub->id) }}" method="post">--}}
    {{--                                    @csrf--}}
    {{--                                    @method('DELETE')--}}
    {{--                                    <button class="btn text-danger">--}}
    {{--                                        <i class="fas fa-trash-alt"></i>--}}
    {{--                                    </button>--}}
    {{--                                </form>--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}
    {{--                    @endforeach--}}
    {{--                    </tbody>--}}
    {{--                </table>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@stop
