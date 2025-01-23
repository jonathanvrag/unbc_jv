<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User CRUD</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Bienvenido al CRUD de Usuarios</h1>
        <a href="/users" class="bg-blue-500 text-white px-4 py-2 rounded">Ir a Usuarios</a>
    </div>
    @livewireScripts
</body>
</html>
