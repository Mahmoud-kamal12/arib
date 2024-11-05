<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>ARIB - PHP Assessment</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    @yield('styles')

    <link rel='shortcut icon' type='image/x-icon' href='https://arib.com.sa/media/ne3jywqg/fav.png' />
</head>

<body>
<div class="loader"></div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">

        @include('dashboard.layouts.navbar')

        @include('dashboard.layouts.sidebar')

        <div class="main-content">
            @yield('content')
        </div>

        @include('dashboard.layouts.footer')

    </div>
</div>

<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/page/index.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

@yield('scripts')

</body>
</html>
