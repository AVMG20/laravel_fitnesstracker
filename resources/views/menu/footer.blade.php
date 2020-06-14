<!-- Footer Start -->
@if(Auth::check())
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2020 &copy; Fitness tracker by  <a href="https://arnovisker.nl">Arno Visker</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="{{route('home.index')}}">My Account</a>
                    <a href="javascript:void(0);">Help</a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endif
<!-- end Footer -->
