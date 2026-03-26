<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>GamesLibrary</title>
</head>
<body class="min-h-screen flex flex-col">    @include('partials.header')
    <main class="flex-grow">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>