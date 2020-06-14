@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="fas fa-walking"></i> Exercises</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="box">
                    <div class="text-right mb-3">
                        <a href="{{route('training.create')}}" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fe-plus"></i> New</a>
                    </div>
                    <table id="example" class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($trainings as $training)
                                <tr>
                                    <td>{{$training->name}}</td>
                                    <td data-toggle="tooltip" data-placement="left" data-order="{{$training->updated_at}}" title="{{$training->updated_at}}">{{\Carbon\Carbon::createFromTimeStamp(strtotime($training->updated_at))->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('training.edit' , $training->id)}}" class="btn btn-info btn-xs"><i class="fe-edit"></i></a>
                                        <form method="POST" class="d-inline-block" action="{{route('training.destroy' , $training->id)}}">
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
