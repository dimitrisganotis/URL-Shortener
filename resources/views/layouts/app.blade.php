<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ca6d867cb3.js" crossorigin="anonymous"></script>-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow-sm py-3">
            <div class="container justify-content-center">
                <h1 class="">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </h1>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="mt-auto">
            <div class="container border-top py-3 text-center">
                <p class="lead mb-0">{{ config('app.name', 'Laravel') }} &copy; {{ date('Y') }}</p>
                <p class="mb-1"><small>Developed by <a href="https://dimitrisganotis.gr/" style="color: #212529" target="_blank">Dimitris Ganotis</a></small></p>
                <div>
                    <a href="https://www.linkedin.com/in/dimitrisgan97/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="https://github.com/dimitrisganotis/usedLaptops/" target="_blank" title="GitHub" class="text-dark"><i class="fab fa-github-square fa-lg"></i></a>
                </div>
            </div>
        </footer>
    </div>

    @yield('javascript')
</body>
</html>
