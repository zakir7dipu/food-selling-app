<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="/admin-assets/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/admin-assets/css/bootstrap.min.css">
    <!-- https://image-uploader.com/ -->
    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
    @yield('css')
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="/admin-assets/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
<div class="" id="home">
    @if(auth()->user())
    @include('layouts.admin-navbar')
    @endif
    @yield('content')
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2018</b> All rights reserved.

                Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
            </p>
        </div>
    </footer>
</div>

<script src="/admin-assets/js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="/admin-assets/js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="/admin-assets/js/Chart.min.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="/admin-assets/js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="/admin-assets/js/tooplate-scripts.js"></script>
<!-- https://image-uploader.com/ -->
<script src="{{ asset('js/image-uploader.min.js') }}" defer></script>
@yield('script')
</body>

</html>
