<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body style="font-family:sans-serif;">
    <div class="container mt-4">
    	@yield('header')
    	<div class="row">
    		@yield('main')
    		@yield('sidebar')
    	</div>
    </div>
</body>
</html>