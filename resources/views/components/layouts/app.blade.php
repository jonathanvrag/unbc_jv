<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNBC - Jonathan Vera</title>
    <link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/x-icon">
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    {{ $slot }}
</body>

</html>
