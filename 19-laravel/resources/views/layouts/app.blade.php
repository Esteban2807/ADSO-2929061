<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/daisyui5.css') }}" rel="stylesheet" type="text/css"/>
    <title>@yield('title')</title>
</head>
@auth
@php
(Auth::user()->role == 'Customer') ? $colors = 'blue,bluesky' : $colors = 'green,lime'
@endphp
@else
    @php
        $colors = 'black,transparent'
    @endphp
@endauth
<body class="bg-[linear-gradient(to_top,{{ $colors }})] bg-[url({{asset('images/backgroundd.jpg')}})] min-h-dvh bg-no-repeat bg-center bg-cover pt-14 bg-fixed">
    <main class="p-12 flex flex-col gap-2 justify-center items-center min-h-dvh">
        
            @yield('content')
    </main>
        <script src="{{asset('js/tailwindcss4.js')}}"></script>
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
        @yield('js')
</body>

</html>