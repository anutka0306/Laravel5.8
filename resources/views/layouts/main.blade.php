<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Страница @show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

{{-- $menu --}}

@yield('menu')
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

