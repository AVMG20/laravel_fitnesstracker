@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Create exercise</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="box">
                    <form action="{{route('training.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" value="{{old('name')}}" placeholder="Benchpress" class="form-control" type="text">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
