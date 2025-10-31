<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar />
    <main>{{ $slot }}</main>
</body>
</html>
