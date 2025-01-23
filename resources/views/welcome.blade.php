<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNBC - Jonathan Vera</title>
    <link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">
    <livewire:login />
    @livewireScripts
</body>
</html>
