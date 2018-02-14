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
    <style rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></style>
</head>

<body>

<div class="all-wrap" id="all-wrap">
    @if(auth()->user()->isAdvertiser())
        @include('layouts.parts.advertiser.header')
    @else
        @include('layouts.parts.publisher.header')
    @endif

    @yield('content')

    @if(auth()->user()->isAdvertiser())
        @include('layouts.parts.advertiser.footer')
    @else
            @include('layouts.parts.publisher.footer')
    @endif
    <div class="up-arrow" id="up-arrow"></div>
</div>
@include('layouts.parts.styles')
@include('layouts.parts.scripts')
</body>
</html>