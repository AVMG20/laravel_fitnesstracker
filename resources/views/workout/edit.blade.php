@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Save workout</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="box">
                    <form action="{{route('workout.update' , $workout->id)}}" method="POST">
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label for="">Training</label>
                            <div class="input-group">
                                <select name="training" class="multi-select form-control">
                                    @foreach($trainings as $training)
                                        <option></option>
                                        <option @if($workout->training->id == $training->id) {{'selected'}} @endif value="{{$training->id}}">{{$training->name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <a href="{{route('training.create')}}" class="btn btn-info">Create exercise</a>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Volume</label>
                            <input name="volume" value="{{$workout->volume}}" placeholder="1200" min="0" max="99999" class="form-control" type="number">
                        </div>

                        <div class="form-group">
                            <label for="">Date</label>
                            <input name="date" value="{{$workout->created_at}}" class="form-control datetimepicker" type="text">
                        </div>

                        <div class="text-right">
                            <button  type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.multi-select').select2({
                placeholder: "Select a training"
            });
            $(".datetimepicker").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
        });
    </script>

@endsection
