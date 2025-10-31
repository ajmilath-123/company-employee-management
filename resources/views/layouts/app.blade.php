<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('links')
</head>
<body>
    <div id="app">
    <x-navbar>
        @auth
        <x-slot name="leftLinks">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('companies.index') }}" id="" aria-expanded="false">
                    Companies
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}" aria-expanded="false">
                    Employees
                </a>
            </li>
        </x-slot>
        @endauth
    </x-navbar>
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    @yield('script')
</body>
</html>
