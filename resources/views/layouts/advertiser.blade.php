<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ICEX Media')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <style>
        body {
            opacity: 0;
        }
    </style>
</head>

<body>

<div class="all-wrap" id="all-wrap">
    @include('layouts.parts.advertiser.header')

    @yield('content')
    @include('layouts.parts.advertiser.footer')
    <div class="up-arrow" id="up-arrow"></div>
</div>


<link rel="stylesheet" href="/css/main.css?1516859167">
@yield('styles')

<script src="/scripts/app.min.js?1516859167"></script>
@yield('scripts')

</body>
</html>