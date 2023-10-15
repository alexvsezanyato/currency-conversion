<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Currency converter') }}</title>

        <link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/skeleton.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/skeleton/main.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/white-theme/main.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/white-theme.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
