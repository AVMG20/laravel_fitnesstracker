@if(Auth::check())
    <div class="left-side-menu">


        <!--- Sidemenu -->
        <div id="sidebar-menu" class="active">

            <ul class="metismenu in" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('workout.index')}}">
                        <i class="fas fa-dumbbell"></i>
                        <span> Workouts </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('training.index')}}">
                        <i class="fas fa-walking"></i>
                        <span> Exercises </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('graph.index')}}">
                        <i class="fas fa-chart-line"></i>
                        <span> Graphs </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>


    </div>
@endif
