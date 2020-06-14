@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="fas fa-dumbbell"></i> Workouts</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="box">
                    <div class="text-right mb-3">
                        <a href="{{route('workout.create')}}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fe-plus"></i> New</a>
                    </div>
                    <table id="example" class="table">
                        <thead>
                        <tr>
                            <th>Exercise</th>
                            <th>Volume</th>
                            <th>Workout Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($workouts as $workout)
                                <tr>
                                    <td>{{$workout->training->name}}</td>
                                    <td>{{$workout->volume}}</td>
                                    <td data-toggle="tooltip" data-placement="left" data-order="{{$workout->workout_date}}" title="{{$workout->workout_date}}">{{\Carbon\Carbon::createFromTimeStamp(strtotime($workout->workout_date))->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('workout.edit' , $workout->id)}}" class="btn btn-info btn-xs"><i class="fe-edit"></i></a>
                                        <form method="POST" class="d-inline-block" action="{{route('workout.destroy' , $workout->id)}}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-delete btn-xs"><i class="fe-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <small>Hover date fields for exact dates</small>
        </div>
    </div>


    <script >
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

@endsection
