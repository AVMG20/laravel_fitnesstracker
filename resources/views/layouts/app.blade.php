<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" sizes="16x16">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Vendor js -->
    <script src="{{asset('js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('js/app.min.js')}}"></script>

    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- third party css -->
    <link href="{{asset('libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="left-side-menu-dark">
@include('menu.top')
@include('menu.side')

<div id="wrapper">

    <div class="content-page">
        <div class="content">

            <div class="container-fluid">
                @include('messages.messages')
                @yield('content')
            </div>

        </div>
    </div>

</div>

@include('menu.footer')


<!-- third party js -->
<script defer src="{{asset('libs/datatables/jquery.dataTables.js')}}"></script>
<script defer src="{{asset('libs/datatables/dataTables.bootstrap4.js')}}"></script>
<script defer src="{{asset('libs/datatables/dataTables.responsive.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/responsive.bootstrap4.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/dataTables.buttons.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/buttons.bootstrap4.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/buttons.html5.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/buttons.flash.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/buttons.print.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/dataTables.keyTable.min.js')}}"></script>
<script defer src="{{asset('libs/datatables/dataTables.select.min.js')}}"></script>
<script defer src="{{asset('libs/pdfmake/pdfmake.min.js')}}"></script>
<script defer src="{{asset('libs/pdfmake/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<script src="{{asset('libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('libs/select2/select2.min.js')}}"></script>


<script>
    $('.btn-delete').click(function (e) {
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>
