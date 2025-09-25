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
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js"></script>



</head>

<body>
  @include('layouts.header')
  <main class="flex-1  ">
    @yield('content')
  </main>
  @include('layouts.footer')
</body>

</html>