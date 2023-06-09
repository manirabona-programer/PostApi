<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Manirabona Patience" />

    @if (Auth::check())
        <meta name="user" content="{{ Auth::user() }}">
    @endif

    <meta name="description" content="Postapi is an API documentation Platform for developers to organize,  and document their APIs. and as a public API hub." />
    <meta name="rating" content="adult" />
    <meta name="keywords" content="patienceman, API documentation, documentation Platform, postapi, postman, API, hub, Public APIs, documentation, Platform, developers, organize, public API, to organize" />
    <meta name="rating" content="RTA-5042-1996-1400-1577-RTA" />
    <link rel="icon" type="image/x-icon" href="/img/logos/logo-black.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="color-scheme" content="light dark">

    <title> @yield('title') | postapi | patienceman </title>

    {{-- Extenral dynamics links --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Telugu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.1/css/all.min.css">

    {{-- Custom style links --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/neon.css">
    <link rel="stylesheet" href="/css/section.css">

    @yield('style')

    {{-- Dark theme switche --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="dark:bg-deep-green-800 overflow-x-hidden">
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Dark theme handler --}}
    <script>
        localStorage.theme = 'light';
        localStorage.setItem('color-theme', 'light');

        if (localStorage.getItem('color-theme') === 'dark') {
            localStorage.setItem('color-theme', 'light');
        }

        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        function toggleTheme() {
            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark') {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        toggleTheme();

        function toggleDarkMode() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

            window.location.reload();
        }
    </script>

    @yield('script')
</body>
</html>
