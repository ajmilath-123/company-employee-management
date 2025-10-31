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
        <x-slot name="leftLinks">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Companies
                </a>
                <ul class="dropdown-menu" aria-labelledby="companiesDropdown">
                    <li><a class="dropdown-item" href="{{ route('companies.index') }}">List Companies</a></li>
                    <li><a class="dropdown-item" href="{{ route('companies.create') }}">Create Company</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="">Employees</a></li>
        </x-slot>
    </x-navbar>
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
