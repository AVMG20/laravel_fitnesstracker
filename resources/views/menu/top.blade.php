<div class="navbar-custom">
    @if(Auth::check())
        <ul class="list-unstyled topnav-menu float-right mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <img
                        src="@if(!empty(Auth::user()->image)) {{Auth::user()->image}} @else {{asset('images/users/user-3.jpg')}} @endif"
                        alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                                {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('home.index')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <a href="{{route('workout.create')}}" class="dropdown-item notify-item">
                        <i class="fe-save"></i>
                        <span>Quick save</span>
                    </a>


                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fe-power"></i> <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

            <li data-toggle="tooltip" title="Settings" class="dropdown notification-list">
                <a href="{{route('home.index')}}" class="nav-link waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>

        </ul>
    @endif

<!-- LOGO -->
    <div class="logo-box">
        <a href="{{route('home.index')}}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('images/logo-light.png')}}" alt="" height="18">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('images/logo-sm.png')}}" alt="" height="24">
                        </span>
        </a>
    </div>

    @if(Auth::check())
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>
        </ul>
    @endif

    @if(!Auth::check())
        <ul class="list-unstyled topnav-menu float-right mb-0 mr-5">
            <li>
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
        </ul>
    @endif

</div>
