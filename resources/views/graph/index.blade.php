@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="fas fa-chart-line"></i> Graphs</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="box">
                    <p>Create a graph based on your selected exercise</p>
                    <form action="{{route('createGraph')}}" method="GET">

                        <div class="form-group">
                            <label for="">Exercise</label>
                            <select name="training" class="multi-select form-control">
                                @foreach($trainings as $training)
                                    <option></option>
                                    <option value="{{$training->id}}">{{$training->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Days</label>
                            <input placeholder="30" name="days" value="30" class="form-control mb-3" min="1" max="9999"
                                   type="number">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fe-activity"></i> Create Graph
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('.multi-select').select2({
                placeholder: "Select a exercise"
            });
        });
    </script>

@endsection
