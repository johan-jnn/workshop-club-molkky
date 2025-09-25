<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    @vite([
        "resources/css/app.css",
        "resources/ts/app.ts",
    ])
</head>
<body>
    @include('layouts.header')
    <main class="flex-1 px-1 sm:px-4 md:px-8">
        @yield('content')
    </main>
    @include('layouts.footer')
</body>
</html>