<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Guest registration - ICEX Media</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <style>
        body {
            opacity: 0;
        }
    </style>
</head>

<body>

<div class="all-wrap" id="all-wrap">
    @include('layouts.parts.header')
    @yield('content')
    @include('layouts.parts.footer')
    <div class="up-arrow" id="up-arrow"></div>
</div>
<link rel="stylesheet" href="{{ mix('/css/vendor.css') }}">
<script src="{{ mix('/js/vendor.min.js') }}"></script>
</body>
</html>