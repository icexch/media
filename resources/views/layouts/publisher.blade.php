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
	@include('layouts.parts.publisher.header')
	@yield('content')
	@include('layouts.parts.publisher.footer')

	<div class="up-arrow" id="up-arrow"></div>
</div>


@include('layouts.parts.styles')
@yield('styles')

@include('layouts.parts.scripts')
@yield('scripts')

</body>
</html>