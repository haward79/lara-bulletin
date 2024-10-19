<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $page_title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/bootstrap.min.css', 'resources/css/app.css', 'resources/css/bulletin.css'])
    <style>@yield('css')</style>

    <!-- JavaScripts -->
    @vite(['resources/js/jquery.min.js'])
    <script type="module">@yield('js')</script>
</head>
