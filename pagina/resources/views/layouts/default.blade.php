<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@hasSection('title')
    <title>@yield('title') | GOODYEAR FOOTWEAR PERÚ</title>
@else
    <title>GOODYEAR FOOTWEAR PERÚ</title>
@endif
@hasSection('description')
    <meta name="description" content="@yield('description')">
@else
    <meta name="description" content="GOODYEAR FOOTWEAR PERÚ">
@endif
    <meta name="keywords" content="master g">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index, follow">
    <link rel="canonical" href="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Roboto:400,500,700,900&display=swap" rel="stylesheet">
    
    <script type="text/javascript">var APP_URL = {!! json_encode(url('/')) !!}</script>

</head>
<body>
    <div class="page-wrapper">
        @include('includes.header')
        @yield('slider')
        <main class="page-content">
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-notify@3.1.3/bootstrap-notify.min.js"></script>
    
    @yield('scripts')
</body>
</html>