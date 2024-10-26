<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="KEYWORDS" content="some keywords">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    {{-- Bunny Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Cormorant Garamond:300,400,500,700" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Great Vibes:300,400,500,700" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Roboto:300,400,500,700" rel="stylesheet"/>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            margin: 100px 15% 75px 15%;
        }
    </style>

    <script>
        // It's best to inline this in `head` to avoid FOUC (flash of unstyled content) when changing pages or themes
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

</head>

<body class="antialiased">
<livewire:banner />

{{ $slot }}

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-blue-100 border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400"></span>
</footer>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>


