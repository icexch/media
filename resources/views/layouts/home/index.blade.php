<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ICEX Media</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <style>
        body {
            opacity: 0;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="/favicon.png">
</head>

<body>
    <div class="all-wrap" id="all-wrap">
        @include('layouts.home.header-home')

        @yield('content')

        @include('layouts.parts.footer')

        <div class="up-arrow" id="up-arrow"></div>
    </div>
    @include('layouts.parts.styles')
    @include('layouts.parts.scripts')
</body>
</html>