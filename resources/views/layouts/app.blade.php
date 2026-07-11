<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GlobalVista</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

<div class="flex h-screen overflow-hidden">

    @include('layouts.navigation')

    <main class="flex-1 overflow-y-auto">

        {{ $slot }}

    </main>

</div>

</body>

</html>