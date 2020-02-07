@extends('layout.frontend.masterPage')
@section('pageHead') Subject update @stop

@section('content')
        <div class="col-md-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Update Subject</h3>
                </div>

                <form role="form" action="{{ route('subjects.update', $sub->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="subject_name">Subject Name</label>
                            <input type="text" name="subject_name"
                                   class="form-control @error('subject_name') is-invalid @enderror"
                                   id="subject_name" value="{{ $sub->subject_name }}"
                                   placeholder="Enter subject name">
                            @error('subject_name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                <option class="hidden" selected disabled>Active Status</option>
                                <option value="1" @if($sub->status == 1) selected @endif>Active</option>
                                <option value="0" @if($sub->status == 0) selected @endif>Inactive</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>

@stop
