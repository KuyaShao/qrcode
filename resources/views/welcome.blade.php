<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QrCodeTrace</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/image/logo.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/image/logo.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
<div id="app">
    @if(Auth::check())
        <main-app :user="{{Auth::user()}}"></main-app>
    @else
        <main-app></main-app>
    @endif
</div>
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>
