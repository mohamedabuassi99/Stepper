<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin') }}/img/apple-icon.png">

    <link href="/favicon.png" type="image/png" rel="shortcut icon" >


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    @stack('css-link')

    <!-- CSS Files -->
    <link href="{{ asset('assets/admin') }}/css/plugins/jquery.modal.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/admin') }}/css/material-dashboard.css" rel="stylesheet" />
    <link href="{{ asset('assets/admin') }}/css/material-dashboard-rtl.css" rel="stylesheet" />
    <link href="{{ asset('assets/admin') }}/css/overrides.css" rel="stylesheet" />
  </head>
  <body class="{{ $class ?? '' }}" >
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.page_templates.auth')
    @endauth
    @guest()
        @include('layouts.page_templates.guest')
    @endguest

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/core/bootstrap-material-design.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/plugins/jquery.modal.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('assets/admin') }}/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('assets/admin') }}/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('assets/admin') }}/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('assets/admin') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('assets/admin') }}/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('assets/admin') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{ asset('assets/admin') }}/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('assets/admin') }}/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('assets/admin') }}/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ asset('assets/admin') }}/js/plugins/fullcalendar.min.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('assets/admin') }}/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('assets/admin') }}/js/plugins/arrive.min.js"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('assets/admin') }}/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/admin') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <script src="{{ asset('assets/admin') }}/js/main.js" type="text/javascript"></script>
    <script src="{{ asset('assets/admin') }}/js/settings.js"></script>

    @stack('js')
  </body>
</html>
