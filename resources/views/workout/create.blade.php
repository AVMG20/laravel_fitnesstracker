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
                    <form action="{{route('workout.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Exercises</label>
                            <div class="input-group">
                                <select name="training" class="multi-select form-control">
                                    @foreach($trainings as $training)
                                        <option></option>
                                        <option value="{{$training->id}}">{{$training->name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <a data-toggle="tooltip" href="{{route('training.create')}}" title="Add new exercise"
                                       class="btn btn-blue waves-effect waves-light"><i class="fe-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Volume</label>
                            <div class="input-group">
                                <input name="volume" id="volume" value="{{old('volume')}}" placeholder="1200" min="0"
                                       max="99999" class="form-control" type="number">
                                <div data-toggle="tooltip" title="Calculator" class="input-group-append">
                                    <button  type="button"  data-toggle="modal"
                                            data-target="#calculator" class="btn btn-blue"><i
                                            class="fas fa-calculator"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Date</label>
                            <input name="date" value="{{Carbon\Carbon::now()}}" class="form-control datetimepicker"
                                   type="text">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="calculator">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Simple Calculator</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <small>use * instead of x on mobile!</small>
                    <input autofocus type="text" onkeyup="calculate()" onchange="calculate()" class="form-control"
                           name="calculator-input" id="calculator-input">
                    <small id="calculation-preview"></small>
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="calculate()" data-dismiss="modal"><i
                            class="fe-activity"></i> Calculate
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.multi-select').select2({
                placeholder: "Select a exercise"
            });
            $(".datetimepicker").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
        });

        $('#calculator').on('shown.bs.modal', function () {
            $('#calculator-input').focus();
        })

        function calculate() {
            try {
                let input = $('#calculator-input').val();

                input = replaceAll(input, 'x', '*');
                input = replaceAll(input, 'X', '*');
                input = replaceAll(input, ':', '/');

                let calculation = eval(input);
                $('#volume').val(calculation);
                $('#calculation-preview').html(calculation);

                $('#calculator-input').removeClass('border-danger');
                $('#calculator-input').addClass('border-success');
            } catch (err) {
                $('#calculator-input').removeClass('border-success');
                $('#calculator-input').addClass('border-danger');
            }
        }

        function replaceAll(str, find, replace) {
            return str.replace(new RegExp(find, 'g'), replace);
        }
    </script>

@endsection
