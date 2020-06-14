@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="fe-user"></i> My Account</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="box">
                    <form enctype="multipart/form-data" action="{{route('home.update' , $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                                <div class="text-center mb-4">
                                    <img class="rounded-circle" height="150" src="@if(!empty($user->image)) {{$user->image}} @else {{asset('images/users/user-3.jpg')}} @endif" alt="userprofile">
                                </div>

                                <input type="file" name="image" id="" class="form-control-file">

                            </div>
                            <div class="col-md-8 col-lg-9">
                                <div class="row">

                                    <div class="col-12">
                                        <label for="">Username</label>
                                        <input class="form-control mb-3" name="name" type="text" required value="{{$user->name}}">
                                    </div>

                                    <div class="col-12">
                                        <label for="">Email</label>
                                        <input class="form-control mb-3" name="email" type="email" required value="{{$user->email}}">
                                    </div>

                                    <div class="col-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fe-check"></i> Save</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- start page settings -->
    <div class="row">
        <div class="col-lg-12 col-xl-6">
            <div class="card card-body">
                <h5 class="card-title"><i class="fas fa-chart-line"></i> Graph Settings <span class="badge badge-danger">WIP</span></h5>
                <form action="">
                    <div class="form-group">
                        <label for="">Improvement rate in % <small>(improve on your max volume)</small></label>
                        <input name="improveRate" value="5" max="1000" min="0" class="form-control" type="number">
                    </div>

                    <div class="form-group">
                        <label for="">Default selected reps</label>
                        <input name="defaultReps" value="12" max="1000" min="0" class="form-control" type="number">
                    </div>

                    <div class="form-group">
                        <label for="">Default selected sets</label>
                        <input name="defaultSets" value="5" max="1000" min="0" class="form-control" type="number">
                    </div>

                    <div class="form-group">
                        <label for="">Default selected days</label>
                        <input name="defaultDays" value="30" max="1000" min="0" class="form-control" type="number">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- end page settings -->

@endsection
