<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $title }}
    </title>
    @vite('resources/css/app.css')
    @livewireStyles
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="dark:bg-black">
<div class="container mx-auto px-4 dark:text-zinc-300">
    {{ $slot }}
</div>
@livewireScripts
@vite('resources/js/app.js')
</body>
</html>
