<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
  <title>{{ config('app.name') }} | @yield('title')</title>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="/favicon.png" type="image/png" rel="shortcut icon" >

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

  <!-- Stylesheet -->
  <link href="{{ asset('assets/css/lib/jquery.modal.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/lib/intlTelInput.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/lib/toastr.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">

  @stack('after-styles')

</head>
<body>
<!-- <h1>hello</h1> -->
@include('homepage.includes.header')

	@yield('section')

	<!-- JavaScript -->
  <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/jquery.modal.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/intlTelInput/intlTelInput.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/toastr.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @stack('after-script')

</body>
</html>
