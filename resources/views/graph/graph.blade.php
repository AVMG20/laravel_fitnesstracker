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
        <div class="col-lg-12">
            <div class="card-box">
                <div class="box">

                    <canvas id="workoutChart" width="400" height="100vh"></canvas>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                            <i class="fas fa-dumbbell font-22 avatar-title text-danger"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup" id="maxVolumeCounter"></span></h3>
                            <p class="text-muted mb-1 text-truncate">Max achieved volume</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fas fa-arrows-alt-h font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup" id="avarageVolumeCounter"></span></h3>
                            <p class="text-muted mb-1 text-truncate">Avarage volume</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-lg-12 col-xl-6">
            <div class="card card-body">
                <h5 class="card-title">Calculate Reps and Sets to KG</h5>
                <div class="box">
                    <div class="row">
                        <div class="col-6">
                            <label for="maxReps">Reps:</label>
                        </div>
                        <div class="col-6">
                            <label for="maxSets">Sets:</label>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="number" onkeyup="maxCalc()" onchange="maxCalc()" value="12" id="maxReps"
                                   placeholder="reps" min="0" max="1000" class="form-control">
                        </div>
                        <div class="col-6">
                            <input type="number" onkeyup="maxCalc()" onchange="maxCalc()" value="3" id="maxSets"
                                   placeholder="sets" min="0" max="1000" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <b class="text-danger">Improve volume:</b>
                        </div>

                        <div class="col-6">
                            <b id="improveKG">55 kg</b>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <b class="text-warning">Max achieved volume:</b>
                        </div>

                        <div class="col-6">
                            <b id="maxKG">50 kg</b>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <b class="text-success">Avarage volume:</b>
                        </div>

                        <div class="col-6">
                            <b id="avgKG">38 kg</b>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!--suppress VueDuplicateTag -->
    <script src="{{asset('libs/chart-js/Chart.bundle.min.js')}}"></script>

    <!--suppress VueDuplicateTag -->
    <script>
        let dates = @json($workoutDates);
        let volumes = @json($workoutVolumes);
        let title = @json($training->name);

        let improveRate = 1.05;
        let maxVolume = 0
        let avgVolume = 0;


        if(volumes.length){
            //get max
            maxVolume = volumes.reduce(function (a, b) {
                return Math.max(a, b);
            });

            //get avarage
            let total = 0;
            for (var i = 0; i < volumes.length; i++) {
                total += volumes[i];
            }
            avgVolume = total / volumes.length;
        }


        //on ready
        $(document).ready(function () {
            $('#maxVolumeCounter').html(maxVolume);
            $('#avarageVolumeCounter').html(Math.round(avgVolume));
            maxCalc();
        });


        //calc sets
        function maxCalc() {
            let sets = $('#maxSets').val();
            let reps = $('#maxReps').val();
            let maxResult = maxVolume / sets / reps;
            let avgResult = avgVolume / sets / reps;
            let improveResult = (maxVolume * improveRate) / sets / reps;

            $('#improveKG').html(Math.round(improveResult) + ' kG');
            $('#maxKG').html(Math.round(maxResult) + ' kG');
            $('#avgKG').html(Math.round(avgResult) + ' kG');
        }


        //chart
        var ctx = document.getElementById('workoutChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: '# Workout',
                    data: volumes,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: title
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>

@endsection
