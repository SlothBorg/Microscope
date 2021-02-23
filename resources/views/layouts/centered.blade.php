<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Play Microscope Online</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="h-full antialiased bg-gray-200">
    <div class="flex items-center justify-center h-full">
        @yield('content')
    </div>
</body>
</html>

