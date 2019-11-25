<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title> @yield('title') </title>
    <!-- Styles -->
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
</head>
<body>
    <div id="app">
        @include('includes.navbar')
        <main class="py-4 h-auto">
            @yield('content')
        </main>
    </div>
        
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
