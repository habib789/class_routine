@extends('layout.frontend.masterPage')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Class Routine</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Day</th>
                        <th colspan="2">Course & Class time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($routines as $flt)
                        <tr>
                            <td><h4 class="text-capitalize">{{ $flt->weeks }}</h4></td>
                            @if($flt->weeks == 'tuesday')
                                <?php
                                $tue = \App\Models\routine::with('subject', 'class_time')
                                    ->select(['id', 'subject_id', 'class_time_id', 'weeks'])
                                    ->where('status', 1)
                                    ->where('weeks', 'tuesday')
                                    ->get();

                                ?>

                                @foreach($tue as $t)
                                    <td>
                                        <h6 class="text-capitalize">{{ $t->subject->subject_name }}</h6>
                                        <span class="text-info">{{ $t->class_time->time_duration }}</span>
                                    </td>
                                @endforeach

                            @elseif($flt->weeks == 'thursday')
                                <?php
                                $tue = \App\Models\routine::with('subject', 'class_time')
                                    ->select(['id', 'subject_id', 'class_time_id', 'weeks'])
                                    ->where('status', 1)
                                    ->where('weeks', 'thursday')
                                    ->get();

                                ?>
                                    @foreach($tue as $t)
                                        <td>
                                            <h6 class="text-capitalize">{{ $t->subject->subject_name }}</h6>
                                            <span class="text-info">{{ $t->class_time->time_duration }}</span>
                                        </td>
                                    @endforeach
                            @elseif($flt->weeks == 'wednesday')
                                <?php
                                $tue = \App\Models\routine::with('subject', 'class_time')
                                    ->select(['id', 'subject_id', 'class_time_id', 'weeks'])
                                    ->where('status', 1)
                                    ->where('weeks', 'wednesday')
                                    ->get();

                                ?>
                                    @foreach($tue as $t)
                                        <td>
                                            <h6 class="text-capitalize">{{ $t->subject->subject_name }}</h6>
                                            <span class="text-info">{{ $t->class_time->time_duration }}</span>
                                        </td>
                                    @endforeach
                            @elseif($flt->weeks == 'friday')
                                <?php
                                $tue = \App\Models\routine::with('subject', 'class_time')
                                    ->select(['id', 'subject_id', 'class_time_id', 'weeks'])
                                    ->where('status', 1)
                                    ->where('weeks', 'friday')
                                    ->get();

                                ?>
                                    @foreach($tue as $t)
                                        <td>
                                            <h6 class="text-capitalize">{{ $t->subject->subject_name }}</h6>
                                            <span class="text-info">{{ $t->class_time->time_duration }}</span>
                                        </td>
                                    @endforeach
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
